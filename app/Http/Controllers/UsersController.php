<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        // Query ke table users
        $users = DB::table('users')->orderBy('id', 'desc')->paginate(10);

        // Paparkan template
        return view('users/senarai', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('users/borang_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'username' => 'required|alpha_num',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);

        // Dapatkan semua data
        $data = $request->only([
            'username', 
            'name', 
            'email', 
            'address', 
            'phone', 
            'role' ,
            'status'
        ]);

        // Encrypt Password dan masukkan ke array $data
        $data['password'] = bcrypt( $request->input('password') );

        // Simpan data ke table users
        DB::table('users')->insert($data);

        // Redirect user ke halaman senarai users
        return redirect()->route('senaraiUsers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users/borang_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
