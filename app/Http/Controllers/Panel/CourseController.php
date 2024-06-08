<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view("panel.pages.manager.course.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel.pages.manager.course.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required"
        ]);
        $model = new Course();
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status") ? 1 : 0,
            "menu_status" => $request->has("menu_status") ? 1 : 0,
            "category_status" => $request->has("category_status") ? 1 : 0,
        ]))->save();

        return redirect()->route("panel.manager.course.index")->with('message', 'Kayıt İşlemi Başarılı');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view("panel.pages.manager.course.edit", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required"
        ]);
        $model = Course::findOrFail($id);
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status") ? 1 : 0,
            "menu_status" => $request->has("menu_status") ? 1 : 0,
            "category_status" => $request->has("category_status") ? 1 : 0,
        ]))->save();

        return redirect()->route("panel.manager.course.index")->with('message', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Course::findOrFail($id);
        $model->delete();

        return redirect()->route("panel.manager.course.index")->with('message', 'Silme İşlemi Başarılı');
    }
}
