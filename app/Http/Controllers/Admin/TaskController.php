<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Task::latest()->get();
        return view('admin.tasks.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {


        $task = Task::create($request->all());



        return redirect()->route('admin.tasks.index')
                        ->with('success','Task has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with(relations: 'images')->findOrFail($id);
        return view('admin.tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::with('images')->findOrFail($id);

        return view('admin.tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);


        if(auth()->user()->id != $task->user_id)
        {

            return redirect()->route('admin.tasks.index')
            ->with('error','Sorry! You cant edit only your tasks');

        }


        $task->update($request->all());


        return redirect()->route('admin.tasks.index')
                        ->with('success','Task has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {


        Task::findOrFail($request->id)->delete();

        return redirect()->route('admin.tasks.index')->with('success','Task has been removed successfully');
    }
}
