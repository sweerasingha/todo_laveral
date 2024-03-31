@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">My Banners List</h1>
            </div>
            <div class="col-lg-12 mt-4">
                <form role="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" name="title" type="text" placeholder="Default input" aria-label="default input example" required>
                            </div>
                            <div class="form-group" mt-4>
                                <input class="form-control" name="images" type="file" placeholder="Default input" aria-label="default input example" accept="image/jpg, image/jpeg, image/png">
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
                                <th scope="col">Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($banners as $key => $banner)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $banner->title }}</td>
                                    <td>
                                        @if ($banner->status==0)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary" onclick="bannerEditModal({{ $banner->id }})"><i class="fa-solid fa-check"></i></a>

                                        <a href="{{ route('banner.delete', $banner->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                        <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                                    </td>
                                    <td>
                                        <img src="{{ asset($banner->image_id) }}" alt="{{ $banner->title }}" style="width: 70px; height: 70px">
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
  <div class="modal fade" id="bannerEdit" tabindex="-1" role="dialog" aria-labelledby="bannerEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bannerEditLabel">Main banner Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="bannerEditContent">

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
        function bannerEditModal(banner_id){
            var data = {
                banner_id: banner_id,
            };
            $.ajax({
                url: "{{ route('banner.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response){
                    console.log(response);
                    $('#bannerEdit').modal('show');
                    $('#bannerEditContent').html(response);
                }
            });
        }
    </script>
@endpush
