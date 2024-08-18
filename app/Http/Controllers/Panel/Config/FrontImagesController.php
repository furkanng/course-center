<?php

namespace App\Http\Controllers\Panel\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUpdateRequest;
use App\Models\FrontImage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FrontImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $images = FrontImage::all();
        return view('panel.pages.config.image.index', compact("images"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageUpdateRequest $request, string $id): RedirectResponse
    {
        $model = FrontImage::query()->findOrFail($id);
        $model->fill($request->all())->save();

        return redirect()->back()->with("success", "Güncelleme Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = FrontImage::query()->findOrFail($id);
        Storage::disk(config("filesystems.default"))->delete($model->getTable() . "/" . $model->getAttribute("image"));
        $model->update(["image" => null, "image_url" => null]);

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
