@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Banner</div>
            <div class="ps-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Banner<span
                            class="ms-2 badge bg-danger">{{ count($banners) }}</span></li>
                    <!--end::Item-->

                </ul>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">Add
                        Banner</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Banner Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key => $banner)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($banner->banner_image) }}" style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $banner->banner_name }}</td>
                                    <td>
                                        @if ($banner->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($banner->status == 1)
                                            <a href="{{ route('banner.inactive', $banner->id) }}" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down fs-3"></i></i></a>
                                        @else
                                            <a href="{{ route('banner.active', $banner->id) }}" title="Active"><i
                                                    class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif

                                        {{-- Edit Modal --}}
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $banner->id }}" title="edit"><i
                                                class="fa-regular fa-pen-to-square fs-3"></i></a>

                                        {{-- Star Edit Modal --}}
                                        <div class="modal fade" id="editModal{{ $banner->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit
                                                            Banner</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.banner') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $banner->id }}">
                                                        <input type="hidden" name="old_img"
                                                            value="{{ $banner->banner_image }}">

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Banner
                                                                            Name</label>
                                                                        <input type="text" name="banner_name"
                                                                            class="form-control form-control-sm @error('banner_name') is-invalid @enderror"
                                                                            placeholder="Banner Name" autocomplete="off"
                                                                            value="{{ $banner->banner_name }}">
                                                                        @error('banner_name')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Description</label>
                                                                        <textarea name="description" cols="2" placeholder="Write Something In Banner" rows="2"
                                                                            class="form-control form-control-sm">{{ $banner->description }}</textarea>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Image</label>
                                                                        <input type="file" autocomplete="off"
                                                                            id="image" name="banner_image"
                                                                            class="form-control form-control-sm mb-2 @error('banner_image') is-invalid @enderror">

                                                                        @error('banner_image')
                                                                            <span class="text-danger mb-2"> {{ $message }}
                                                                            </span>
                                                                        @enderror

                                                                        <img src="{{ asset($banner->banner_image) }}"
                                                                            style="width:73px;" id="showImage"
                                                                            alt="" class="mt-2">
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Save
                                                                changes</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- End Edit Modal --}}

                                        <a href="{{ route('delete.banner', $banner->id) }}" id="delete"
                                            title="delete"><i class="fa-solid fa-trash fs-3"></i></i>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Banner Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>








    {{-- Start Add Modal --}}

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Banner</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.banner') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Banner Name</label>
                                    <input type="text" name="banner_name"
                                        class="form-control form-control-sm @error('banner_name') is-invalid @enderror"
                                        placeholder="Banner Name" autocomplete="off">
                                    @error('banner_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="description" cols="2" placeholder="Write Something In Banner" rows="2"
                                        class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Image</label>
                                    <input type="file" autocomplete="off" id="image" name="banner_image"
                                        class="form-control form-control-sm mb-2 @error('banner_image') is-invalid @enderror">

                                    @error('banner_image')
                                        <span class="text-danger mb-2"> {{ $message }} </span>
                                    @enderror

                                    <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" id="showImage"
                                        alt="">
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- End Add Modal --}}

    {{-- Image Show  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
