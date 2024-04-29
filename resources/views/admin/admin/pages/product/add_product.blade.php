@extends('admin.admin.admin_dashboard')
@section('admin')
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
            <div class="ms-auto">
                <div class="btn-group">
                    <a type="button" class="btn btn-primary">Add Product</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="inputProductTitle" name="product_name"
                                        placeholder="Enter product Name" required>

                                    <div class="invalid-feedback">
                                        Please Enter Product
                                        Name.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Tag</label>
                                    <input type="text" class="form-control" id="inputProductTitle" name="tags"
                                        placeholder="Enter product Tag">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="inputProductDescription" name="short_desc" rows="3">{{ old('short_desc') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Long Description</label>
                                    <textarea class="form-control" id="inputProductDescription" name="overview" rows="3">{{ old('overview') }}</textarea>
                                </div>



                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Product Images</label>
                                    <input id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        multiple>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" id="inputPrice"
                                            placeholder="00.00" required value="{{ old('selling_price') }}">

                                        <div class="invalid-feedback">
                                            Please Enter Selling Price.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Discount Price</label>
                                        <input type="number" class="form-control" name="discount_price"
                                            id="inputCompareatprice" placeholder="00.00"
                                            value="{{ old('discount_price') }}">

                                        <div class="invalid-feedback">
                                            Please Enter Discount Price.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Product Code</label>
                                        <input type="text" class="form-control" name="sku_code" id="inputCompareatprice"
                                            value="{{ old('sku_code') }}">

                                        <div class="invalid-feedback">
                                            Please Enter Product Code.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">Color</label>
                                        <select class="form-select" name="color_id[]">

                                            @if (count($colors) > 0)
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">
                                                        {{ $color->color_name }}
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
                                        <label for="inputProductType" class="form-label">Stock Status</label>
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
                                        <label for="inputVendor" class="form-label">Brand Name</label>
                                        <select class="form-select" name="brand_id" id="inputVendor">
                                            <option></option>

                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">Category</label>
                                        <select class="form-select" name="category_id" id="inputVendor" required>
                                            <option></option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Collection</label>
                                        <select class="form-select" id="inputCollection">
                                            <option></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Product Tags</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Product Tags">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>

    </div>
@endsection
