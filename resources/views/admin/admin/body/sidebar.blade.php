<div class="sidebar-wrapper" data-simplebar="true" style="background-color: rgb(230, 237, 242)">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">E-commerce</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>

            <ul>
                <li> <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>Banner</a>
                </li>
            </ul>

            <ul>
                <li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>Brand</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>Category</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{ route('all.color') }}"><i class="bx bx-right-arrow-alt"></i>Color</a>
                </li>
            </ul>

        </li>


        <li class="menu-label">UI Elements</li>
        <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Widgets</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
