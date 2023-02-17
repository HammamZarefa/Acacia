<?php

namespace App\Http\Controllers\Admin;

use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $general = GeneralSetting::first();
        $page_title = 'General Settings';
        return view('admin.setting.general_setting', compact('page_title', 'general'));
    }

    public function update(Request $request)
    {
        $validation_rule = [
            'base_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
            'secondary_color' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
        ];

        $validator = Validator::make($request->all(), $validation_rule, []);
        $validator->validate();

        $general_setting = GeneralSetting::first();
        $request->merge(['ev' => isset($request->ev) ? 1 : 0]);
        $request->merge(['en' => isset($request->en) ? 1 : 0]);
        $request->merge(['sv' => isset($request->sv) ? 1 : 0]);
        $request->merge(['sn' => isset($request->sn) ? 1 : 0]);
        $request->merge(['force_ssl' => isset($request->force_ssl) ? 1 : 0]);
        $request->merge(['secure_password' => isset($request->secure_password) ? 1 : 0]);
        $request->merge(['registration' => isset($request->registration) ? 1 : 0]);

        $general_setting->update($request->only(['sitename', 'cur_text', 'cur_sym', 'ev', 'en', 'sv', 'sn', 'force_ssl', 'secure_password', 'registration', 'base_color', 'secondary_color']));
        $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);
    }


    public function logoIcon()
    {
        $page_title = 'Logo & Icon';
        return view('admin.setting.logo_icon', compact('page_title'));
    }

    public function logoIconUpdate(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:png',
        ]);
        if ($request->hasFile('logo')) {
            try {
                $path = imagePath()['logoIcon']['path'];
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                Image::make($request->logo)->save($path . '/logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Logo could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $path = imagePath()['logoIcon']['path'];
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', imagePath()['favicon']['size']);
                Image::make($request->favicon)->resize($size[0], $size[1])->save($path . '/favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Favicon could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        $notify[] = ['success', 'Logo Icons has been updated.'];
        return back()->withNotify($notify);
    }

    //API settings
    public function apiSettings()
    {
        $general = GeneralSetting::first();
        $page_title = 'API Settings';
        return view('admin.setting.api_setting', compact('page_title', 'general'));
    }

    public function apiSettingsUpdate(Request $request)
    {
        $request->validate([
            'api_url' => 'required|string|max:100',
            'api_key' => 'required|string|max:100'
        ]);

        $general = GeneralSetting::first();
        $general->api_url = $request->api_url;
        $general->api_key = $request->api_key;
        $general->save();

        $notify[] = ['success', 'API settings updated.'];
        return back()->withNotify($notify);
    }

    public function apiTest()
    {
        $general = GeneralSetting::first();

        $response = Http::post($general->api_url, [
            'key' => $general->api_key,
            'action' => "services",
        ]);

        if (!$response->json()){
            $notify[] = ['error', $response->body()];
            return back()->withNotify($notify);
        }

        if (array_key_exists('error', $response->json())){
            $notify[] = ['error', $response->json()['error']];
            return back()->withNotify($notify);
        }

        $notify[] = ['success', 'API tasted. You can save these credentials.'];
        return back()->withNotify($notify);
    }
}
