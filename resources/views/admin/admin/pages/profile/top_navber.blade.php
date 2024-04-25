<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                alt="Admin" class="rounded-circle p-1 bg-primary"
                                style="width: 100px; height:100px">

                            <div class="mt-3">
                                <h4>Name: {{ $profileData->name }}</h4>
                                <p class="text-secondary mb-1">Email: {{ $profileData->email }}</p>
                                <p class="text-secondary mb-1">Phone: {{ $profileData->phone }}</p>


                            </div>
                        </div>
                    </div>

                    @php
                        $routes = Route::current()->getName();
                    @endphp

                    <div class="">
                        <!--begin::Navs-->
                        <ul
                            class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ $routes == 'admin.profile' ? 'active' : '' }} " href="{{ route('admin.profile') }}">Overview</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="">Settings</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5"{{ $routes == 'admin.password.page' ? 'active' : '' }} href="{{ route('admin.password.page') }}">Security</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="">SMTP</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="">SEO</a>
                            </li>
                            <!--end::Nav item-->

                        </ul>
                        <!--begin::Navs-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
