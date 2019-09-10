<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{ route('admin.index') }}" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('images/admin_image/profile.jpg') }}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Joy</p>
                    <p class="designation">Admin user</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Product-Pages">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Products</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="Product-Pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.product') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.product.create') }}">Add Product</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Category-Pages">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Category-Pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Brand-Pages">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Brand</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Brand-Pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.brands') }}">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.brand.create') }}">Add Brand</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Division-Pages">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Division</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Division-Pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.divisions') }}">Divisions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.division.create') }}">Add Division</a>
                    </li>
                </ul>
            </div>
        </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#District-Pages">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage District</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="District-Pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.districts') }}">Districts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <form action="{{ route('admin.logout') }}" class="form-inline" method="post">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-danger">
                </form>
            </a>
        </li>
    </ul>
</nav>