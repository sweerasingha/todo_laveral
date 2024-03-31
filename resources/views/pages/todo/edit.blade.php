
<form action="{{ route('todo.update', $task->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="title" type="text" value="{{ $task->title }}" placeholder="Default input" aria-label="default input example" required>
            </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>

