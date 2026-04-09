<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;


class SettingController extends Controller
{
    public function index()
{
    $settings = Setting::first();

    if (!$settings) {
        $settings = Setting::create([
            'store_name' => 'Malk Store',
            'language' => 'en',

        ]);
    }

    return view('admin.settings', compact('settings'));
}

    public function update(Request $request)
    {
        $settings = Setting::first();

        $request->validate([
            'store_name'=>'required',
            'language'=>'required',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // dd($request->all());
        //uploads file
        $img_name = $settings->background_image;
        if($request->has('background_image')){
            // dd('done');
            //delet old image
            File::delete(public_path('siteassets/images/home/'.$img_name));
            $img_name = rand().time().$request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->move(public_path('siteassets/images/home/'),$img_name);
        }

        if (!$settings) {
            $settings = Setting::create([
                'store_name' => $request->store_name,
                'language' => $request->language,
                'background_image' => $img_name,

            ]);
        } else {
            $settings->update([
                'store_name'=> $request->store_name ,
                'language'=> $request->language ,
                'background_image'=>$img_name,
            ]);
        }


        if($request->language == 'en'){
            return redirect()->route('admin.settings')->with('success', 'Settings updated successfully!');

        }elseif($request->language == 'ar'){
            return redirect()->route('admin.settings')->with('success', 'تم التعديل');

        }


    }

}
