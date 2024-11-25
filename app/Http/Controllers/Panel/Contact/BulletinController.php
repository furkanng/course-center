<?php

namespace App\Http\Controllers\Panel\Contact;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = Bulletin::all();
        return view('panel.pages.contact.bulletin.index', compact(['users']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = Bulletin::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "Silme işlemi başarılı");
    }
}
