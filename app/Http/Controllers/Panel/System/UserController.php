<?php

namespace App\Http\Controllers\Panel\System;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::query()->where('role','guest')->orderBy("created_at", "desc")->get();
        return view("panel.pages.system.users.userList",compact("users"));
    }
    public function institutionList(){

        $institutions = User::query()
            ->join('institutional_register', 'users.id', '=', 'institutional_register.user_id')
            ->join('company_type', 'users.company_type', '=', 'company_type.code')
            ->where('users.role', 'company')
            ->orderBy('users.created_at', 'desc')
            ->get([
                'users.*',
                'institutional_register.*',
                'company_type.name as company_type_name',

            ]);




        return view("panel.pages.system.users.institutionList",compact("institutions"));
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
}
