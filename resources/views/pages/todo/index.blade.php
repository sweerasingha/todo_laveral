@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Todo List</h1>
            </div>
            <div class="col-lg-12 mt-4">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" name="title" type="text" placeholder="Default input" aria-label="default input example" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-4">
                <div>
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        @if ($task->done)
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-danger">Incompleted</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="taskEditModal({{ $task->id }})"><i class="fa-solid fa-check"></i></a>

                                        <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                        <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="taskEdit" tabindex="-1" role="dialog" aria-labelledby="taskEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskEditLabel">Main Task Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="taskEditContent">

        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 5rem;
            color: rgb(10, 205, 124);
        }
    </style>
@endpush

@push('js')
    <script>
        function taskEditModal(task_id){
            var data = {
                task_id: task_id,
            };
            $.ajax({
                url: "{{ route('todo.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response){
                    console.log(response);
                    $('#taskEdit').modal('show');
                    $('#taskEditContent').html(response);
                }
            });
        }
    </script>
@endpush
