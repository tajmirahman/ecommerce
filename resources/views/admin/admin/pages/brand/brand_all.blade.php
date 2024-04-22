@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Brand</div>
            <div class="ps-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Brand<span
                            class="ms-2 badge bg-danger">{{ count($brands) }}</span></li>
                    <!--end::Item-->

                </ul>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary">Add
                        Brand</a>
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
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $brand)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/brand/'.$brand->brand_image) }}" style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <a href="{{ route('inactive.brand',$brand->id) }}" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down fs-3"></i></i></a>
                                        @else
                                            <a href="{{ route('active.brand',$brand->id) }}" title="Active"><i
                                                    class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif

                                        {{-- Edit Modal --}}
                                        <a href="" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $brand->id }}" class="ms-1" title="Edit"><i
                                        class="fa-regular fa-pen-to-square fs-3"></i></a>

                                        {{-- Star Edit Modal --}}
                                        <div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Brand</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.brand') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $brand->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-12">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Brand
                                                                            Name</label>
                                                                        <input type="text" name="brand_name"
                                                                            class="form-control form-control-sm @error('brand_name') is-invalid @enderror"
                                                                            placeholder="Brand Name"
                                                                            value="{{ $brand->brand_name }}"
                                                                            autocomplete="off">
                                                                        @error('brand_name')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Description</label>
                                                                        <textarea class="form-control form-control-sm" placeholder="Brand Description" name="description">{{ $brand->description }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-3">

                                                                    <label for="" class="mb-2">Image</label>

                                                                    <input type="file" autocomplete="off"
                                                                        name="brand_image"
                                                                        class="form-control form-control-sm mb-2 @error('brand_image') is-invalid @enderror">

                                                                    @error('brand_image')
                                                                        <div class="text-danger mb-2"> {{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                                                                        style="width:73px" alt="">
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Brand</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- End Edit Modal --}}

                                        <a href="{{ route('delete.brand', $brand->id) }}" id="delete"
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
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Brand Name</label>
                                    <input type="text" name="brand_name"
                                        class="form-control form-control-sm @error('brand_name') is-invalid @enderror"
                                        placeholder="Brand Name" autocomplete="off">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="description" cols="2" placeholder="Write Something In Brand" rows="2"
                                        class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Image</label>
                                    <input type="file" autocomplete="off" id="image" name="brand_image"
                                        class="form-control form-control-sm mb-2 @error('brand_image') is-invalid @enderror">

                                    @error('brand_image')
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
