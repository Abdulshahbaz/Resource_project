<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Task::paginate(10);
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
       $user = new Task;
       $user->title = $request->input('title');
       $user->description = $request->input('description');
       $user->due_date = $request->input('due_date');
       $user->status = $request->input('status');
       $user->save();

       return redirect('task')->with('success','Task Add SuccessFully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userdata = Task::find($id);
       return view('show',['userdata'=>$userdata]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $updatedata = Task::find($id);
        return view('edit',['updatedata'=>$updatedata]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
      $user = Task::find($id);
      $user->title = $request->input('title');
      $user->description = $request->input('description');
      $user->due_date = $request->input('due_date');
      $user->status = $request->input('status');
     
      $user->update();

      return redirect('task')->with('success','Task Update SuccessFully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $userdelete = Task::find($id);
        if(!is_null($userdelete))
        {
            $userdelete->delete();
            
        }

        return redirect()->back()->with('success','Task Deleted SuccessFully!');
    }
}
