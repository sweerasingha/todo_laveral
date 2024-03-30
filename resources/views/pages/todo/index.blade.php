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
                                <input class="form-control" name="title" type="text" placeholder="Default input" aria-label="default input example">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">
                <div>
                    <table class="table">
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
                                        <a href="{{ route('todo.edit', $task->id) }}" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i></a>
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
