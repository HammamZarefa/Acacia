<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Language;
use App\Rules\FileTypeValidate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Image;
use Stichoza\GoogleTranslate\GoogleTranslate;


class LanguageController extends Controller
{

    public function langManage($lang = false)
    {
        $page_title = 'Language Manager';
        $empty_message = 'No language has been added.';
        $languages = Language::orderByDesc('is_default')->get();
        $path = imagePath()['language']['path'];
        $size = imagePath()['language']['size'];
        return view('admin.language.lang', compact('page_title', 'empty_message', 'languages', 'path', 'size'));
    }

    public function langStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:languages'
        ]);


        $data = file_get_contents(resource_path('lang/') . 'en.json');
        $json_file = strtolower($request->code) . '.json';
        $path = resource_path('lang/') . $json_file;

        File::put($path, $data);


        $language = new  Language();
        if ($request->is_default) {
            $lang = $language->where('is_default', 1)->first();
            if ($lang) {
                $lang->is_default = 0;
                $lang->save();
            }
        }
        $language->name = $request->name;
        $language->code = strtolower($request->code);
        $language->is_default = $request->is_default ? 1 : 0;
        $language->save();

        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);
    }

    public function langUpdatepp(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $la = new Language();
        $la = Language::findOrFail($id);


        if ($request->is_default) {
            $lang = $la->where('is_default', 1)->first();
            if ($lang) {
                $lang->is_default = 0;
                $lang->save();
            }
        }


        $la->name = $request->name;
        $la->is_default = $request->is_default ? 1 : 0;
        $la->save();

        $notify[] = ['success', 'Update Successfully'];
        return back()->withNotify($notify);
    }

    public function langDel($id)
    {
        $la = Language::find($id);
        removeFile(imagePath()['language']['path'] . '/' . $la->icon);
        removeFile(resource_path('lang/') . $la->code . '.json');
        $la->delete();
        $notify[] = ['success', 'Delete Successfully'];
        return back()->withNotify($notify);
    }

    public function langEdit($id)
    {
        $la = Language::find($id);
        $page_title = "Update " . $la->name . " Keywords";
        $json = file_get_contents(resource_path('lang/') . $la->code . '.json');
        $list_lang = Language::all();


        if (empty($json)) {
            $notify[] = ['error', 'File Not Found.'];
            return back()->with($notify);
        }
        $json = json_decode($json);

        return view('admin.language.edit_lang', compact('page_title', 'json', 'la', 'list_lang'));
    }

    public function langUpdate(Request $request, $id)
    {
        $lang = Language::find($id);
        $content = json_encode($request->keys);

        if ($content === 'null') {
            $notify[] = ['error', 'At Least One Field Should Be Fill-up'];
            return back()->withNotify($notify);
        }
        file_put_contents(resource_path('lang/') . $lang->code . '.json', $content);
        $notify[] = ['success', 'Update Successfully'];
        return back()->withNotify($notify);
    }

    public function langImport(Request $request)
    {
        $mylang = Language::find($request->myLangid);
        $lang = Language::find($request->id);
        $json = file_get_contents(resource_path('lang/') . $lang->code . '.json');

        $json_arr = json_decode($json, true);

        file_put_contents(resource_path('lang/') . $mylang->code . '.json', json_encode($json_arr));

        return 'success';
    }


    public function storeLanguageJson(Request $request, $id)
    {
        $la = Language::find($id);
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);

        $items = file_get_contents(resource_path('lang/') . $la->code . '.json');

        $reqKey = trim($request->key);

        if (array_key_exists($reqKey, json_decode($items, true))) {
            $notify[] = ['error', "`$reqKey` Already Exist"];
            return back()->withNotify($notify);
        } else {
            $newArr[$reqKey] = trim($request->value);
            $itemsss = json_decode($items, true);
            $result = array_merge($itemsss, $newArr);
            file_put_contents(resource_path('lang/') . $la->code . '.json', json_encode($result));
            $notify[] = ['success', "`" . trim($request->key) . "` has been added"];
            return back()->withNotify($notify);
        }

    }

    public function deleteLanguageJson(Request $request, $id)
    {
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);

        $reqkey = $request->key;
        $reqValue = $request->value;
        $lang = Language::find($id);
        $data = file_get_contents(resource_path('lang/') . $lang->code . '.json');

        $json_arr = json_decode($data, true);
        unset($json_arr[$reqkey]);

        file_put_contents(resource_path('lang/') . $lang->code . '.json', json_encode($json_arr));
        $notify[] = ['success', "`" . trim($request->key) . "` has been removed"];
        return back()->withNotify($notify);
    }

    public function updateLanguageJson(Request $request, $id)
    {
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);

        $reqkey = trim($request->key);
        $reqValue = $request->value;
        $lang = Language::find($id);

        $data = file_get_contents(resource_path('lang/') . $lang->code . '.json');

        $json_arr = json_decode($data, true);

        $json_arr[$reqkey] = $reqValue;

        file_put_contents(resource_path('lang/') . $lang->code . '.json', json_encode($json_arr));

        $notify[] = ['success', "Update successfully"];
        return back()->withNotify($notify);
    }

    public function searchForStrings()
    {
        // finalise the regular expression, matching the whole line
            $pattern = "/@lang\('(.+?)'\)/m";
            $files = File::allFiles(resource_path('views/templates/acacia'));
            $strings=[];
            foreach ($files as $file) {
                $contents=File::get($file->getPathname());
// search, and store all matching occurences in $matches
                if (preg_match_all($pattern, $contents, $matches)) {
                    implode("\n", $matches[1]);
                }
                $strings[]=$matches[1];
            }
            $strings = Arr::flatten($strings);
            $langfile = file_get_contents(resource_path('lang/'). 'keywords.json');
            foreach ($strings as $string) {
                $reqKey = trim($string);
                if (!array_key_exists($reqKey, json_decode($langfile, true))) {
                    $newArr[$reqKey] = trim($string);
                    $itemsss = json_decode($langfile, true);
                    $result = array_merge($itemsss, $newArr);
                    file_put_contents(resource_path('lang/') . 'keywords.json', json_encode($result));
                }
        }
        $jsonfiles = File::allFiles(resource_path('lang/'));
            foreach ($jsonfiles as $file)
            {
                if ($file->getExtension()=='json') {
                    if ($file->getFilename() != 'keywords.json')
                    {
                        $langjson = file_get_contents($file);
                        foreach ($strings as $string) {
                            $reqKey = trim($string);
                            if (!array_key_exists($reqKey, json_decode($langjson, true))) {
                                $newArr[$reqKey] = trim($string);
                                if ($file->getFilename()!='en.json')
                                    $newArr[$reqKey] = GoogleTranslate::trans( $newArr[$reqKey], preg_replace("/\\.[^.]*$/", "", $file->getFilename()), 'en');
                                $itemsss = json_decode($langjson, true);

                                $result = array_merge($itemsss, $newArr);
                                file_put_contents(resource_path('lang/') . $file->getFilename(), json_encode($result));
                            }
                        }
                    }


                }
            }
            return "Updated all strings successfully";
    }
}
