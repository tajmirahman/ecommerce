@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Slider</div>
            <div class="ps-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Slider<span
                            class="ms-2 badge bg-danger">{{ count($sliders) }}</span></li>
                    <!--end::Item-->

                </ul>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">Add
                        Slider</a>
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
                                <th>Slider Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $key => $slider)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/slider/' . $slider->slider_image) }}" style="width: 40px;"
                                            alt="">
                                    </td>
                                    <td>{{ $slider->slider_name }}</td>
                                    <td>
                                        @if ($slider->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($slider->status == 1)
                                            <a href="{{ route('inactive.slider', $slider->id) }}" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down fs-3"></i></i></a>
                                        @else
                                            <a href="{{ route('active.slider', $slider->id) }}" title="Active"><i
                                                    class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif

                                        {{-- Edit Modal --}}
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $slider->id }}" class="ms-1" title="Edit"><i
                                                class="fa-regular fa-pen-to-square fs-3"></i></a>

                                        {{-- Star Edit Modal --}}
        <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                            Update Brand</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $slider->id }}">

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-12">

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Slider Name</label>
                                        <input type="text" name="slider_name"
                                            class="form-control form-control-sm @error('slider_name') is-invalid @enderror"
                                            placeholder="Slider Name" autocomplete="off" value="{{ $slider->slider_name }}">
                                        @error('slider_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Description</label>
                                        <textarea name="description" cols="2" placeholder="Write Something In Slider" rows="2"
                                            class="form-control form-control-sm">{{ $slider->description }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="mb-2">Image</label>
                                        <input type="file" autocomplete="off" id="image" name="slider_image"
                                            class="form-control form-control-sm mb-2 @error('slider_image') is-invalid @enderror">

                                        @error('slider_image')
                                            <span class="text-danger mb-2"> {{ $message }} </span>
                                        @enderror

                                        <img src="{{ asset('storage/slider/' .$slider->slider_image) }}" style="width:73px" id="showImage"
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

                                        {{-- End Edit Modal --}}

                                        <a href="{{ route('delete.slider', $slider->id) }}" id="delete" title="delete"><i
                                                class="fa-solid fa-trash fs-3"></i></i>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Slider Name</th>
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
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Slider Name</label>
                                    <input type="text" name="slider_name"
                                        class="form-control form-control-sm @error('slider_name') is-invalid @enderror"
                                        placeholder="Slider Name" autocomplete="off">
                                    @error('slider_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="description" cols="2" placeholder="Write Something In Slider" rows="2"
                                        class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Image</label>
                                    <input type="file" autocomplete="off" id="image" name="slider_image"
                                        class="form-control form-control-sm mb-2 @error('slider_image') is-invalid @enderror">

                                    @error('slider_image')
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
