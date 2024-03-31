<?php

namespace domain\Services;

use App\Models\Todo;

class TodoService
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function all()
    {
        return $this->task->all();
    }

    public function store($data)
    {
        $this->task->create($data);
    }

    public function get($id)
    {
        return $this->task->find($id);
    }

    public function update(array $data, $task_id)
    {
        $task = $this->task->find($task_id);
        $task->update($this->edit($task, $data));
    }

    protected function edit(Todo $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }

    public function delete($id)
    {
        $this->task->find($id)->delete();
    }

    public function done($id)
    {
        $task = $this->task->find($id);
        $task->done = 1;
        $task->save();
    }
}
