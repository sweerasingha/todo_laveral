<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\TodoFacade;
use App\Models\Todo;

class TodoController extends ParentController
{

    public function index()
    {
        // $response['tasks'] = $this->task->all();
        $response['tasks'] = TodoFacade::all();
        // dd($response);
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
        TodoFacade::store($request->all());
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['task'] = TodoFacade::get($request['task_id']);
        return view('pages.todo.edit')->with($response);
    }

    public function update(Request $request, $task_id)
    {
        TodoFacade::update($request->all(), $task_id);
        return redirect()->back();
    }

    public function delete($id)
    {
        TodoFacade::delete($id);
        return redirect()->back();
    }

    public function done($id)
    {
        TodoFacade::done($id);
        return redirect()->back();
    }
}
