<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::paginate(10);
        return view('list',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
             'title' => 'required',
             'description' => 'required',
             'due_date' => 'required|date|after_or_equal:today',
             'status' => 'required',
        ]);
       $user = new User;
       $user->title = $request->input('title');
       $user->description = $request->input('description');
       $user->due_date = $request->input('due_date');
       $user->status = $request->input('status');
       //  dd($user);
       $user->save();

       return redirect('users')->with('success','Add SuccessFully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userdata = User::find($id);
       return view('show',compact('userdata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userdata = User::find($id);
        return view('edit',compact('userdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $user = User::find($id);
      $user->title = $request->input('title');
      $user->description = $request->input('description');
      $user->due_date = $request->input('due_date');
      $user->status = $request->input('status');
    //  dd($user);
      $user->update();

      return redirect('users')->with('success','Update SuccessFully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('deleted');
        $userdelete = User::find($id);
        if(!is_null($userdelete))
        {
            $userdelete->delete();
            
        }

        return redirect()->back()->with('success','Data SuccessFully Deleted');
    }
}
