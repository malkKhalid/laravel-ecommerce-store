<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function checkout() {


        // $amount = User::find(Auth::id())->carts()->sum(DB::raw('quantity * price'));
        $amount = Auth::user()->carts()->sum(DB::raw('quantity *price'));
        // $products_cart = Cart::orderByDesc('id')->get();

        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8ac7a4c79394bdc801939736f17e063d" .
                    "&amount=$amount" .
                    "&currency=EUR" .
                    "&paymentType=DB" .
                    "&integrity=true";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGFjN2E0Yzc5Mzk0YmRjODAxOTM5NzM2ZjFhNzA2NDF8Ulh5az9pd2ZNdXprRVpRYjdFcWs='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        // dd($responseData);
        $id = $responseData['id'];
        return view('site.checkout', compact('id'));

    }
    public function payment(Request $request) {
        $resourcePath = $request->resourcePath;

        $url = env('PaymentUrl').$resourcePath;
        $url .= "?entityId=8ac7a4c79394bdc801939736f17e063d";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGFjN2E0Yzc5Mzk0YmRjODAxOTM5NzM2ZjFhNzA2NDF8Ulh5az9pd2ZNdXprRVpRYjdFcWs='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);

        // return $responseData;
        $responseData = json_decode($responseData, true);
        // dd($responseData);

        $code = $responseData['result']['code'];
        if($code == '000.100.110') {
            $id = $responseData['id'];
            $amount = $responseData['amount'];

            DB::beginTransaction();
            try{
                //create a new order
                $order = Order::create([
                    'total'=>$amount,
                    'user_id'=>Auth::id()
                ]);

                foreach (Auth::user()->carts as $item ) {
                    //add cart items to order items
                    OrderItem::create([
                        'price'=>$item->price,
                        'quantity'=>$item->quantity,
                        'product_id'=>$item->product_id,
                        'user_id'=>$item->user_id,
                        'order_id'=>$order->id
                    ]);

                    //decreas the item quantity
                    // $item->product()->update(['quantity' => $item->product->quantity - $item->quantity]);
                    $item->product()->decrement('quantity', $item->quantity);

                    // remove cart items
                    $item->delete();

                }
                // create payment record
                Payment::create([

                    'total' => $amount,
                    'user_id' => Auth::id(),
                    'transaction_id'=>$id,
                    ]);

                DB::commit();

            }catch(Exception $e) {
                DB::rollBack();
                throw new Exception($e->getMessage());
            }

            // return view('site.payment_success');
            return redirect()->route('site.payment_success');

        }else{
            // return view('site.payment_fail');
            return redirect()->route('site.payment_fail');
        }


    }


    public function cart() {
        $products_cart = Cart::orderByDesc('id')->get();
        return view('site.cart',compact('products_cart'));
    }


    public function add_to_cart(Request $request) {
        $quantity =$request->input('product-quantity');
        $product= Product::find($request->product_id);

        $cart = Cart::where('user_id', Auth::id() )->where('product_id',$request->product_id)->first();

        if ($cart) {
            $cart->update(['quantity'=> $cart->quantity + $quantity ]);
        } else {
            Cart::create([
                'product_id'=>$request->product_id,
                'quantity'=>$quantity,
                'user_id'=>$request->user_id,
                'price'=>$product->sale_price ? $product->sale_price : $product->price,

            ]);
        }

        return redirect()->back()->with('msg','Product added to cart successfully');
    }


    public function remove_cart(string $id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
}
