<?php

namespace domain\Services;

use App\Models\Banner;
use Infrastructure\Facade\ImagesFacade;

class BannerService
{
    protected $task;

    public function __construct()
    {
        $this->task = new Banner();
    }

    public function all()
    {
        return $this->task->all();
    }

    public function store(\Illuminate\Http\Request $request)
{
    if ($request->hasFile('images')) {
        $file = $request->file('images');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/banner/';
        $file->move($path, $filename);

        $this->task->create([
            'title' => $request['title'],
            'image_id' => $path . $filename,
        ]);
    }
}


    public function get($id)
    {
        return $this->task->find($id);
    }

    public function update(array $data, $banner_id)
    {
        $task = $this->task->find($banner_id);
        $task->update($this->edit($task, $data));
    }

    protected function edit(Banner $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }

    public function delete($id)
    {
        $this->task->find($id)->delete();
    }

    public function status($id)
    {
        $task = $this->task->find($id);
        $task->status = !$task->status;
        $task->save();
    }
}
