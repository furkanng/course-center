<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Company;
use App\Models\InstitutionalRegister;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function loginPost(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('panel.home');
        } else {
            return redirect()->back()->with('error', 'Giriş başarısız.');
        }
    }



    public function registerPost(RegisterRequest $request): RedirectResponse
    {

        $model = User::query()->create(array_merge($request->all(), ['status' => 0,'kvkk_approve' => $request->has('kvkk_approve') ? 1 : 0]));



        if($model->role == "company"){
            InstitutionalRegister::query()->create([
                'user_id'=>$model->id,
                'status'=>'pending',
                'company_name'=>$model->company_name,
                'company_type'=>$model->company_type
            ]);

        }

        if ($model) {
            //$credentials = $request->only('email', 'password');
            //Auth::attempt($credentials);
            //return redirect()->route('panel.home')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
            return redirect()->back()->with('registerSuccess',true);
        } else {
            return redirect()->back()->with('error', 'Kullanıcı oluşturulurken bir hata oluştu.')->withInput();
        }
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Çıkış Başarılı.');
    }

}
