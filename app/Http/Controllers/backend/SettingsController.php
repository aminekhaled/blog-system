<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index() {
        
        $settings = Setting::get()->first();

        return view('backend.settings.index', compact('settings'));
    }

    public function update(Request $request) {
        

        if($request->hasFile('logo_image')) {
            $image = $request->file('logo_image');
            $logoImageName = time().'.'.$image->getClientOriginalExtension();
            File::put(public_path('img') . '/' . $logoImageName, File::get($image));
        }
        
        if($request->hasFile('hero_image')) {
            $image = $request->file('hero_image');
            $heroImageName = time().'.'.$image->getClientOriginalExtension();
            File::put(public_path('img/banner') . '/' . $heroImageName, File::get($image));
        }

        $setting = Setting::get()->first();

        $setting->logo_image = isset($logoImageName) ? $logoImageName : $setting->logo_image;
        $setting->hero_image = isset($heroImageName) ? $heroImageName : $setting->hero_image ;
        $setting->hero_title = $request->hero_title != '' ? $request->hero_title : $setting->hero_title;
        $setting->hero_text = $request->hero_text != '' ? $request->hero_text : $setting->hero_text;
        $setting->save();

        return redirect()->route('settings.index')->with('success', 'Website Settings Updated Successfully');

    }
    

}


