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
                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.product') }}"  class="btn btn-primary">Add Product</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->

  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/brand/' . $product->product_image) }}" style="width: 40px;"
                                            alt="">
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <a href="" title="Inactive"><i
                                                    class="fa-solid fa-thumbs-down fs-3"></i></i></a>
                                        @else
                                            <a href="" title="Active"><i
                                                    class="fa-solid fa-thumbs-up fs-3"></i></i></a>
                                        @endif


                                        <a href="{{ route('delete.brand', $product->id) }}" id="delete" title="delete"><i
                                                class="fa-solid fa-trash fs-3"></i></i>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>

</div>



@endsection
