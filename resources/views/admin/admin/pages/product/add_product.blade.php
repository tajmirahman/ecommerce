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
                        <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />

                <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label fw-bold">Product Name</label>
                                        <input type="text" class="form-control" id="inputProductTitle"
                                            name="product_name" placeholder="Enter product Name" required>

                                        <div class="invalid-feedback">
                                            Please Enter Product
                                            Name.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label fw-bold">Product Tag</label>
                                        <input type="text" class="form-control" id="inputProductTitle" name="tags"
                                            placeholder="Enter product Tag">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label fw-bold">Short
                                            Description</label>
                                        <textarea class="form-control" id="inputProductDescription" name="short_desc" rows="3">{{ old('short_desc') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label fw-bold">Long
                                            Description</label>
                                        <textarea class="form-control" id="editor" name="overview" rows="3">{{ old('overview') }}</textarea>
                                    </div>



                                    <div class="mb-3">
                                        <label for="formFile" class="form-label fw-bold">Product Image</label>
                                        <input class="form-control" name="product_image" type="file" id="image">

                                        <img id="showImage" src="{{ asset('upload/no_image.jpg') }}"
                                            style="width: 73px; height:73px;" class="showImage mt-3" alt="">

                                    </div>

                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label fw-bold">Multiple Image</label>
                                        <input class="form-control" name="multi_image[]" type="file" id="image"
                                            multiple="">

                                        <img id="showImage" src="{{ asset('upload/no_image.jpg') }}"
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
                                                placeholder="00.00" required value="{{ old('selling_price') }}">

                                            <div class="invalid-feedback">
                                                Please Enter Selling Price.
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCompareatprice" class="form-label fw-bold">Discount
                                                Price</label>
                                            <input type="text" class="form-control" name="discount_price"
                                                id="inputCompareatprice" placeholder="00.00"
                                                value="{{ old('discount_price') }}">

                                            <div class="invalid-feedback">
                                                Please Enter Discount Price.
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputCompareatprice" class="form-label fw-bold">Product
                                                Code</label>
                                            <input type="text" class="form-control" name="sku_code"
                                                id="inputCompareatprice" value="{{ old('sku_code') }}">

                                            <div class="invalid-feedback">
                                                Please Enter Product Code.
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label fw-bold">Color</label>
                                            <select class="form-select" name="color_id[]">

                                                @if (count($colors) > 0)
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}">
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
                                                <option class="form-select" value="available">
                                                    Available
                                                </option>
                                                <option class="form-select" value="limited">
                                                    Limited</option>
                                                <option class="form-select" value="unlimited">
                                                    UnLimited</option>
                                                <option class="form-select" value="stock_out">
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
                                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputVendor" class="form-label fw-bold">Category</label>
                                            <select class="form-select" name="category_id" id="inputVendor" required>
                                                <option></option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label fw-bold">Sub Category</label>
                                            <select class="form-select" name="subcategory_id" id="inputCollection">
                                                <option></option>

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCollection" class="form-label fw-bold">Child Category</label>
                                            <select class="form-select" name="childcategory_id" id="inputCollection">
                                                <option></option>

                                            </select>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="featured" value="1"
                                                        id="flexCheckChecked" >
                                                    <label class="form-check-label fw-bold" for="flexCheckChecked">New
                                                        Product</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="special_offer" value="1"
                                                        id="flexCheckChecked" >
                                                    <label class="form-check-label fw-bold"
                                                        for="flexCheckChecked">Speciall Offer</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="special_deals" value="1"
                                                        id="flexCheckChecked" >
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
