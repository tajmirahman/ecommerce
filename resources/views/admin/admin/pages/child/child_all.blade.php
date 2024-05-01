@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <a href="" class="btn" style="background: #2fb9e3;">
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
                                            <a href="{{ route('child.inactive',$child->id) }}" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down fs-3"></i></i></i></a>
                                        @else
                                            <a href="{{ route('child.active',$child->id) }}" title="Active"><i
                                                    class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif

                                        {{-- Edit Modal --}}
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $child->id }}" class="ms-1"
                                            title="Edit"><i class="fa-regular fa-pen-to-square fs-3"></i></a>

                                        {{-- Star Edit Modal --}}
    <div class="modal fade" id="editModal{{ $child->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #2fb9e3;height: 50px;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit Child Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('update.child') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $child->id }}">

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">Category Name</label>

                                <select name="category_id" autocomplete="off" class="form-select form-select-sm" id="">

                                    <option value="">Choose Category</option>

                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}"{{ $child->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach

                                </select>


                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">SubCategory Name</label>

                                <select name="subcategory_id" autocomplete="off" class="form-select form-select-sm">
                                    @foreach ($subcategorys as $subcat)

                                    <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>

                                    @endforeach
                                </select>

                                @error('subcategory_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">ChildCategory Name</label>
                                <input type="text" name="childcategory_name" placeholder="ChildCategory Name"
                                    autocomplete="off"
                                    class="form-control form-control-sm @error('childcategory_name') is-invalid @enderror" value="{{ $child->childcategory_name }}">

                                @error('childcategory_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Description</label>
                                <textarea name="description" placeholder="Write Some In ChildCategory" autocomplete="off" class="form-control" cols="2"
                                    rows="2">{{ $child->description }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" name="childcategory_image"
                                    id="image" class="form-control form-control-sm imageSrc @error('childcategory_image') is-invalid @enderror">

                                @error('childcategory_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <img id="showImage" src="{{ asset('storage/childcategory/' . $child->childcategory_image) }}" style="width: 73px; height:73px;" class="showImage mt-3" alt="">
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

                                        {{-- End Edit Modal --}}



                                        <a href="{{ route('delete.child', $child->id) }}" id="delete"
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

                                <select name="category_id" autocomplete="off" class="form-select form-select-sm" id="">

                                    <option value="">Choose Category</option>

                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>


                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">SubCategory Name</label>

                                <select name="subcategory_id" autocomplete="off" class="form-select form-select-sm">
                                    <option></option>
                                </select>

                                @error('subcategory_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">ChildCategory Name</label>
                                <input type="text" name="childcategory_name" placeholder="ChildCategory Name"
                                    autocomplete="off"
                                    class="form-control form-control-sm @error('childcategory_name') is-invalid @enderror">

                                @error('childcategory_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Description</label>
                                <textarea name="description" placeholder="Write Some In ChildCategory" autocomplete="off" class="form-control" cols="2"
                                    rows="2"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" name="childcategory_image"
                                   id="image" class="form-control form-control-sm imageSrc @error('childcategory_image') is-invalid @enderror">

                                @error('childcategory_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <img id="showImage" src="{{ asset('upload/no_image.jpg') }}" style="width: 73px; height:73px;" class="showImage mt-3" alt="">
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



    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('<option selected disabled>Choose SubCategory</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value.subcategory_name + '</option>'
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').html('<option selected disabled>Choose SubCategory</option>');
                }
            });
        });
    </script>


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
