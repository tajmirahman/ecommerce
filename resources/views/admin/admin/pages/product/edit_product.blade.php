@extends('admin.admin.admin_dashboard')
@section('admin')

    {{-- jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr />

                <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $editProduct->id }}">
                    <input type="hidden" name="old_img" value="{{ $editProduct->product_image }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label fw-bold">Product Name</label>
                                        <input type="text" class="form-control" id="inputProductTitle"
                                            name="product_name" placeholder="Enter product Name" required
                                            value="{{ $editProduct->product_name }}">

                                        <div class="invalid-feedback">
                                            Please Enter Product
                                            Name.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label fw-bold">Product Tag</label>

                                        <input type="text" class="form-control" id="inputProductTitle" name="tags"
                                            placeholder="Enter product Tag" value="{{ $editProduct->tags }}">

                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label fw-bold">Short
                                            Description</label>
                                        <textarea class="form-control" id="inputProductDescription" name="short_desc" rows="3">{{ old('short_desc') }}{{ $editProduct->short_desc }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label fw-bold">Long
                                            Description</label>
                                        <textarea class="form-control" id="editor" name="overview" rows="3">{{ old('overview') }}{{ $editProduct->overview }}</textarea>
                                    </div>



                                    <div class="mb-3">
                                        <label for="formFile" class="form-label fw-bold">Product Image</label>
                                        <input class="form-control" name="product_image" type="file" id="image">

                                        <img id="showImage" src="{{ asset($editProduct->product_image) }}"
                                            style="width: 73px; height:73px;" class="showImage mt-3" alt="">

                                    </div>


                                </div>
                            </div>



                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label fw-bold">Selling Price</label>
                                            <input type="text" class="form-control" name="selling_price" id="inputPrice"
                                                placeholder="00.00" required value="{{ $editProduct->selling_price }}">

                                            <div class="invalid-feedback">
                                                Please Enter Selling Price.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCompareatprice" class="form-label fw-bold">Discount
                                                Price</label>
                                            <input type="text" class="form-control" name="discount_price"
                                                id="inputCompareatprice" placeholder="00.00"
                                                value="{{ $editProduct->discount_price }}">

                                            <div class="invalid-feedback">
                                                Please Enter Discount Price.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputCompareatprice" class="form-label fw-bold">Product
                                                Code</label>
                                            <input type="text" class="form-control" name="sku_code"
                                                id="inputCompareatprice" value="{{ $editProduct->sku_code }}">

                                            <div class="invalid-feedback">
                                                Please Enter Product Code.
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label fw-bold">Color</label>
                                            <select class="form-select" name="color_id[]">

                                                @if (count($colors) > 0)
                                                    @foreach ($colors as $color)
                                                        <option
                                                            value="{{ $color->id }}"{{ $editProduct->color_id == $color->id ? 'selected' : '' }}>
                                                            {{ $color->name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>
                                            <div class="invalid-feedback">
                                                Please Enter Product
                                                Colors.
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label fw-bold">Stock Status</label>
                                            <select class="form-select" name="stock" id="inputProductType">
                                                <option></option>
                                                <option class="form-select" value="available"
                                                    {{ $editProduct->stock == 'available' ? 'selected' : '' }}>
                                                    Available
                                                </option>
                                                <option class="form-select" value="limited"
                                                    {{ $editProduct->stock == 'limited' ? 'selected' : '' }}>
                                                    Limited</option>
                                                <option class="form-select" value="unlimited"
                                                    {{ $editProduct->stock == 'unlimited' ? 'selected' : '' }}>
                                                    UnLimited</option>
                                                <option class="form-select" value="stock_out"
                                                    {{ $editProduct->stock == 'stock_out' ? 'selected' : '' }}>
                                                    Out of
                                                    Stock</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please Enter Stock
                                                Status.</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label fw-bold">Brand Name</label>
                                            <select class="form-select" name="brand_id" id="inputVendor">
                                                <option></option>

                                                @foreach ($brands as $brand)
                                                    <option
                                                        value="{{ $brand->id }}"{{ $editProduct->brand_id == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label fw-bold">Category</label>
                                            <select class="form-select" name="category_id" id="inputVendor" required>
                                                <option></option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $editProduct->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label fw-bold">Sub Category</label>
                                            <select class="form-select" name="subcategory_id" id="inputCollection">
                                                @foreach ($subCategorys as $subCategory)
                                                    <option value="{{ $subCategory->id }}"
                                                        {{ $editProduct->subcategory_id == $subCategory->id ? 'selected' : '' }}>
                                                        {{ $subCategory->subcategory_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label fw-bold">Child Category</label>
                                            <select class="form-select" name="childcategory_id" id="inputCollection">

                                                @foreach ($childcategorys as $childcategory)
                                                    <option value="{{ $childcategory->id }}"
                                                        {{ $editProduct->childcategory_id == $childcategory->id ? 'selected' : '' }}>
                                                        {{ $childcategory->childcategory_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="featured"
                                                        value="1" id="flexCheckChecked"
                                                        {{ $editProduct->featured == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-bold" for="flexCheckChecked">New
                                                        Product</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="special_offer"
                                                        value="1" id="flexCheckChecked"
                                                        {{ $editProduct->special_offer == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-bold"
                                                        for="flexCheckChecked">Speciall Offer</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="special_deals"
                                                        value="1" id="flexCheckChecked"
                                                        {{ $editProduct->special_deals == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-bold"
                                                        for="flexCheckChecked">Speciall Deals</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>

    </div>


    {{-- Multi Image Part --}}

    <div class="row p-4">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

                    <h5 class="mb-3">Edit Multi Image</h5>

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="imageid" value="{{ $editProduct->id }}">

                        <div class="row">

                            <div class="col-8">
                                <input type="file" required autocomplete="off" class="form-sm" name="multi_img">
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-sm p-2">Submit</button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Image</th>
                                <th scope="col">File</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <form action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                @foreach ($multiImages as $key => $img)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($img->multi_image) }}" style="width: 50px; height: 50p;;"
                                                alt=""></td>

                                        <td>
                                            <input type="file" class="btn-sm" name="multi_img[{{ $img->id }}]"
                                                autocomplete="off">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm">submit</button>

                                            <a href="" id="delete" title="delete"><i
                                                    class="fa-solid fa-trash fs-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>










    {{-- Category to subcategory --}}

    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/district/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html(
                                '<option selected disabled>Choose SubCategory</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>'
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').html(
                        '<option selected disabled>Choose SubCategory</option>');
                }
            });
        });
    </script>


    {{-- Subcategory to childcategory --}}

    <script>
        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/state/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="childcategory_id"]').html(
                                '<option selected disabled>Choose ChildCategory</option>');
                            $.each(data, function(key, value) {
                                $('select[name="childcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .childcategory_name + '</option>'
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('select[name="childcategory_id"]').html(
                        '<option selected disabled>Choose ChildCategory</option>');
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

    {{-- CK Editor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    {{-- CK Editor --}}



@endsection
