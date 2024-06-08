<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $sliders = Setting::query()->where("group_key", "slider_settings")->get();
        $categories = Setting::query()->where("group_key", "category_settings")->get();
        $researches = Setting::query()->where("group_key", "research_settings")->get();

        return view("panel.pages.frontend.dashboard", compact(["sliders", "categories", "researches"]));
    }

    public function store(Request $request)
    {
        $requestData = $request->except('_token');

        foreach ($requestData as $key => $value) {
            $model = Setting::where("key", $key)->first();

            if ($model->type == "file" && $request->hasFile($key)) {

                if ($model->value && Storage::exists($model->value)) {
                    Storage::delete($model->value);
                }

                $file = $request->file($key);
                $filename = rand(1, 99999) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/uploads', $filename);
                $model->update(['value' => $path]);
            } else {
                $model->update(['value' => $value]);
            }
        }

        return redirect()->back()->with('message', 'Başarıyla kaydedildi.');
    }
}
