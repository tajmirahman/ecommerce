@extends('admin.admin.admin_dashboard')
@section('admin')
    {{-- show Image Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <div class="page-content" style="background: rgb(226, 235, 235)">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->


        {{-- top Navber --}}
        @include('admin.admin.pages.profile.top_navber')
        {{-- top Navber --}}



        {{-- update admin profile --}}

        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-12">
                        <div class="card">

                            <form action="{{ route('password.change') }}" method="POST">

                                @csrf

                                <div class="card-body">
                                    <h4 class="mt-1 mb-4" style="text-align: center">Admin Password Change</h4>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Old Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                            class="form-control form-control-sm form-control-solid @error('old_password') is-invalid @enderror"
                                            type="password" placeholder="" name="old_password" autocomplete="off" />

                                        @error('old_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                            class="form-control form-control-sm form-control-solid @error('new_password') is-invalid @enderror"
                                            type="password" placeholder="" name="new_password" autocomplete="off" />

                                        @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                            class="form-control form-control-sm form-control-solid @error('new_password_cofirmation') is-invalid @enderror"
                                            type="password" placeholder="" name="new_password_cofirmation" autocomplete="off" />

                                        @error('new_password_cofirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

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
