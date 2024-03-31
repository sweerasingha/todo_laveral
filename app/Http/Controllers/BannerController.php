<?php

namespace App\Http\Controllers;

use domain\Facades\BannerFacade;
use Illuminate\Http\Request;

class BannerController extends ParentController
{
    public function index()
    {
        // $response['banners'] = $this->task->all();
        $response['banners'] = BannerFacade::all();
        // dd($response);
        return view('pages.banner.index')->with($response);
    }

    public function store(Request $request)
    {
        BannerFacade::store($request);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['task'] = BannerFacade::get($request['task_id']);
        return view('pages.todo.edit')->with($response);
    }

    public function update(Request $request, $task_id)
    {
        BannerFacade::update($request->all(), $task_id);
        return redirect()->back();
    }

    public function delete($id)
    {
        BannerFacade::delete($id);
        return redirect()->back();
    }

    public function status($id)
    {
        BannerFacade::status($id);
        return redirect()->back();
    }
}
