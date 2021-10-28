<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('usersAuth', ['except' => ['create', 'store', 'loginView', 'doLogin']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('display');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $data = $this->validate($request, [
            "name"     => 'required|min:3',
            "email"    => 'required|email',
            "password" => 'required|min:6',
        ]);

        // Hash Password
        $data['password'] = bcrypt($data['password']);

        // Insert Data
        $op = users::create($data);

        // Check operation
        if ($op) {
            $message = 'Data inserted.';
        } else {
            $message = 'Error try again!';
        }

        // Set message to session
        session()->flash('message', $message);
        return redirect()->back();
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
        //
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



    public function loginView()
    {
        return view('login');
    }


    public function doLogin(Request $request)
    {


        // Validation inputs
        $data = $this->validate($request, [
        "email" => "required|email",
        "password" => "required|min:6"
       ]);

        // Authentication
        if (auth()->attempt($data)) {
            return redirect(url('/to_do'));
        } else {
            return redirect()->back();
        }
    }



    public function logOut()
    {
        auth()->logout();

        return redirect(url('users/loginView'));
    }
}
