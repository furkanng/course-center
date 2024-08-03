<?php

namespace App\Http\Controllers\Panel\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::query()->orderBy("order", "asc")->get();
        return view("panel.pages.system.course.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("panel.pages.system.course.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreRequest $request): RedirectResponse
    {
        $model = new Course();
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
            "menu_status" => $request->has("menu_status"),
            "category_status" => $request->has("category_status"),
        ]))->save();

        return redirect()->route("panel.system.course.index")->with('success', 'Kayıt İşlemi Başarılı');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $course = Course::query()->findOrFail($id);
        return view("panel.pages.system.course.edit", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseStoreRequest $request, string $id): RedirectResponse
    {
        $model = Course::query()->findOrFail($id);
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
            "menu_status" => $request->has("menu_status"),
            "category_status" => $request->has("category_status"),
        ]))->save();

        return redirect()->back()->with('success', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = Course::query()->findOrFail($id);
        $model->delete();

        session()->flash('delete_success', true);
        return redirect()->route("panel.system.course.index")->with('success', 'Silme İşlemi Başarılı');
    }
}
