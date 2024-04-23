@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
            <div class="ps-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Category<span
                            class="ms-2 badge bg-danger">{{ count($categories) }}</span></li>
                    <!--end::Item-->

                </ul>
            </div>
            <div class="ms-auto mr-1">
                <div class="btn-group">
                    <a href="{{ route('all.category') }}" class="btn" style="background: #2fb9e3;">
                        Category</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('all.subcategory') }}" class="btn" style="background: #2fb9e3;">
                       Sub Category</a>
                </div>
                <div class="btn-group">
                    <a href="{{ route('all.child') }}" class="btn" style="background: #2fb9e3;">
                        Child Category</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 pt-3">

            <div class="ps-3">

            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn" style="background: #537e8c; color:white">Add
                        Category</a>
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
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/category/' . $category->category_image) }}"
                                            style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($category->status == 1)
                                            <a href="{{ route('inactive.category',$category->id) }}" title="Inactive"><i
                                                class="fa-solid fa-thumbs-down fs-3"></i></i></i></a>
                                        @else
                                            <a href="{{ route('active.category',$category->id) }}" title="Active"><i
                                                class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif

                                        {{-- Edit Modal --}}
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $category->id }}" class="ms-1" title="Edit"><i
                                                class="fa-regular fa-pen-to-square fs-3"></i></a>

                                        {{-- Star Edit Modal --}}
                                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #2fb9e3;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Category</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.category') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $category->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-12">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Category
                                                                            Name</label>
                                                                        <input type="text" name="category_name"
                                                                            class="form-control form-control-sm @error('category_name') is-invalid @enderror"
                                                                            placeholder="Category Name"
                                                                            value="{{ $category->category_name }}"
                                                                            autocomplete="off">
                                                                        @error('category_name')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Description</label>
                                                                        <textarea class="form-control form-control-sm" placeholder="Brand Description" name="description">{{ $category->description }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-3">

                                                                    <label for="" class="mb-2">Image</label>

                                                                    <input type="file" autocomplete="off"
                                                                        name="category_image"
                                                                        class="form-control form-control-sm mb-2 @error('category_image') is-invalid @enderror">

                                                                    @error('category_image')
                                                                        <div class="text-danger mb-2"> {{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/category/' . $category->category_image) }}"
                                                                        style="width:73px" alt="">
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-sm"
                                                                style="background: #2fb9e3;">Update
                                                                Category</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- End Edit Modal --}}



                                        <a href="{{ route('delete.category',$category->id) }}" id="delete" title="delete"><i
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
                                <th>Category Name</th>
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

                <div class="modal-header" style="background: #2fb9e3;height: 50px;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Category Name</label>
                                    <input type="text" name="category_name"
                                        class="form-control form-control-sm @error('category_name') is-invalid @enderror"
                                        placeholder="Category Name" autocomplete="off">
                                    @error('category_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="description" cols="2" placeholder="Write Something In Category" rows="2"
                                        class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Image</label>
                                    <input type="file" autocomplete="off" id="image" name="category_image"
                                        class="form-control form-control-sm mb-2 @error('category_image') is-invalid @enderror">

                                    @error('category_image')
                                        <span class="text-danger mb-2"> {{ $message }} </span>
                                    @enderror

                                    <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" id="showImage"
                                        alt="">
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm" style="background: #2fb9e3;">Save changes</button>
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
