<?php

namespace App\Http\Controllers\Front;

use App\Enums\UserRole;
use App\Enums\UserStatus;
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


        $user = User::where('email', $credentials['email'])->first();

        if ($user) {

            if ($user->role != 'guest' && $user->status != 0) {
                if (Auth::attempt($credentials)) {
                    return redirect()->route('panel.home');
                } else {
                    return redirect()->back()->with('error', 'Giriş başarısız.');
                }
            } else {

                return redirect()->back()->with('error', 'Giriş izni yok.');
            }
        } else {

            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
    }


    public function registerPost(RegisterRequest $request): RedirectResponse
    {
        $user = new User();

        $role = $request->get("role");

        switch ($role) {
            case UserRole::COMPANY->value:
                $user->fill(array_merge($request->all(),
                    [
                        "user_type" => $request->user_type_company,
                        "status" => 0,
                        'kvkk_approve' => $request->has('kvkk_approve') ? 1 : 0
                    ]
                ))->save();

                InstitutionalRegister::query()->create([
                    "user_id" => $user->id,
                    "status" => UserStatus::PENDING,
                    "company_name" => $user->company_name,
                    "company_type" => $user->company_type
                ]);

                return redirect()->back()->with("companyRegister", "Kayıt Başarılı");

            case UserRole::GUEST->value:

                $user->fill(array_merge($request->all(),
                    [
                        "user_type" => $request->user_type_guest,
                        "status" => 1,
                        'kvkk_approve' => $request->has('kvkk_approve') ? 1 : 0
                    ]
                ))->save();

                return redirect()->route('home')->with("success", "Kayıt Başarılı");
        }

        return redirect()->back()->with("error", "Kayıt Başarısız")->withInput();
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Çıkış Başarılı.');
    }

}
