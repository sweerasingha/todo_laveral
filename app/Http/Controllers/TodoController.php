<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function index()
    {
        $response['tasks'] = $this->task->all();
        // dd($response);
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request)
    {
        $this->task->create($request->all());
        // return redirect()->route('todo');
        return redirect()->back();
    }

    public function edit($id)
    {
        $response['task'] = $this->task->find($id);
        return view('pages.todo.edit')->with($response);
    }

    public function delete($id)
    {
        $this->task->find($id)->delete();
        return redirect()->back();
    }

    public function done($id)
    {
        $task = $this->task->find($id);
        $task->done = 1;
        $task->save();
        return redirect()->back();
    }
}
