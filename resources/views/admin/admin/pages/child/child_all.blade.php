@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Child Category</div>
            <div class="ps-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Child Category<span
                            class="ms-2 badge bg-danger">{{ count($childs) }}</span></li>
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
                    <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn"
                        style="background: #537e8c; color:white">Add
                        Child</a>
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
                                <th>Child Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($childs as $key => $child)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/childcategory/' . $child->childcategory_image) }}"
                                            style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $child->childcategory_name }}</td>
                                    <td>
                                        @if ($child->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($child->status == 1)
                                            <a href="{{ route('inactive.subcategory', $child->id) }}" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down fs-3"></i></i></i></a>
                                        @else
                                            <a href="{{ route('active.subcategory', $child->id) }}" title="Active"><i
                                                    class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif

                                        {{-- Edit Modal --}}
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $child->id }}" class="ms-1"
                                            title="Edit"><i class="fa-regular fa-pen-to-square fs-3"></i></a>

                                        {{-- Star Edit Modal --}}


                                        {{-- End Edit Modal --}}



                                        <a href="{{ route('delete.subcategory', $child->id) }}" id="delete"
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
                                <th>Child Name</th>
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
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Child Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.child') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">


                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">Category Name</label>
                                <select name="category_id" autocomplete="off" class="form-select form-select-sm"
                                    id="">
                                    <option disabled value="">Choose Category</option>

                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">SubCategory Name</label>

                                <select name="subcategory_id" autocomplete="off" class="form-select form-select-sm">


                                    <option ></option>


                                </select>

                                @error('subcategory_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">Child Category Name</label>
                                <input type="text" name="childcategory_name" placeholder="Child Category Name"
                                    autocomplete="off"
                                    class="form-control form-control-sm @error('childcategory_name') is-invalid @enderror">

                                @error('childcategory_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Description</label>
                                <textarea name="description" cols="2" placeholder="Write Something In Child Category" rows="2"
                                    class="form-control form-control-sm"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" autocomplete="off" id="image" name="childcategory_image"
                                    class="form-control form-control-sm mb-2 @error('childcategory_image') is-invalid @enderror">

                                @error('childcategory_image')
                                    <span class="text-danger mb-2"> {{ $message }} </span>
                                @enderror

                                <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" id="showImage"
                                    alt="">
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


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });


    </script>


@endsection
