<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\to_do;

class to_doController extends Controller
{
    public function __construct()
    {
        $this->middleware('usersAuth');
        $id = Auth::id();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::id();
        $data = to_do::where('user_id', $user_id)->get();
        return view('display', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('to_do');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validation
        $user_id = Auth::id();

        $data = $this->validate($request, [
            "title"          => 'required|min:3',
            "description"    => 'required',
            "start_date"     => 'required|date|after:today',
            "end_date"       => 'required|date|after:today'
        ]);

        $data = array("user_id" => $user_id) + $data;

        // Insert Data
        $op = to_do::create($data);

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
        # Fetch to do ...

        $to_do = to_do::where('id', $id)->get();
        return view('edit', ['data' => $to_do]);
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
        $data =  $this->validate($request, [
            "title"          => 'required|min:3',
            "description"    => 'required',
            "start_date"     => 'required|date|after:today',
            "end_date"       => 'required|date|after:today'
          ]);


        $op =  to_do::where('id', $id)->update($data);

        if ($op) {
            $message = "Raw updated";
        } else {
            $message = "Error Try Again!!";
        }

        session()->flash('Message', $message);

        return redirect(url('/to_do'));
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
        $op = to_do::where('id', $id)->delete();

        if ($op) {
            $message = " Raw Removed";
        } else {
            $message = "Error Try Again !!!";
        }

        session()->flash('Message', $message);
       
        return back();
    }
}
