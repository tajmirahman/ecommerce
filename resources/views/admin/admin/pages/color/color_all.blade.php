@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Color</div>
            <div class="ps-3">
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Color<span
                            class="ms-2 badge bg-danger">{{ count($colors) }}</span></li>
                    <!--end::Item-->

                </ul>
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

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Color Name</th>
                                            <th>Code</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($colors as $key => $color)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $color->name }}</td>
                                                <td>{{ $color->color_code }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/brand/' . $color->color_code) }}"
                                                        style="width: 40px;" alt="">
                                                </td>

                                                <td>
                                                    {{-- Edit Modal --}}
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $color->id }}" class="ms-1"
                                                        title="Edit"><i class="fa-regular fa-pen-to-square fs-3"></i></a>

                                                    {{-- Star Edit Modal --}}
    <div class="modal fade" id="editModal{{ $color->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header"
                    style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white"
                        id="exampleModalLabel">
                        Update Color</h1>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                        <div class="card">

                            <div class="card-body">

                                <h4>Add Color</h4>

                                <form action="{{ route('update.color') }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $color->id }}">

                                    <div class="form-group mb-3 mt-3 col-6">
                                        <label for="">Color Name</label>
                                        <input type="text" required name="name" placeholder="Color Name" value="{{ $color->name }}"
                                            autocomplete="off" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Color Code</label><br>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <div>
                                                    <input type="color" pattern="#[0-9a-fA-F]{6}" class="colorCode" value="{{ $color->color_code }}"
                                                        name="color_code" id="colorCode" placeholder="Enter Color Code"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text rounded-0 colorCodePreview"
                                                        id="colorCodePreview">#000000</span>
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
        </div>
    </div>

                                                    {{-- End Edit Modal --}}

                                                    <a href="{{ route('delete.color', $color->id) }}" id="delete"
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
                <div class="col-lg-4">
                    <div class="card">

                        <div class="card-body">

                            <h4>Add Color</h4>

                            <form action="{{ route('store.color') }}" method="POST">

                                @csrf

                                <div class="form-group mb-3 mt-3">
                                    <label for="">Color Name</label>
                                    <input type="text" required name="name" placeholder="Color Name"
                                        autocomplete="off" class="form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                    <label for="">Color Code</label><br>
                                    <div class="row mt-2">
                                        <div class="col-4">
                                            <div class="col-4">
                                                <input type="color" pattern="#[0-9a-fA-F]{6}" class="colorCode"
                                                    name="color_code" id="colorCode" placeholder="Enter Color Code"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="input-group-append">
                                                <span class="input-group-text rounded-0 colorCodePreview"
                                                    id="colorCodePreview">#000000</span>
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
            </div>
        </div>

    </div>



    {{-- Color Code  --}}
    <script>
        $(document).ready(function() {
            // Attach an input event listener to the color input
            $('.colorCode').on('input', function() {
                // Get the entered color code
                var colorCode = $(this).val();

                // Update the content of the preview element
                $('.colorCodePreview').text(colorCode);
            });
        });
    </script>
@endsection
