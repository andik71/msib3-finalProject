<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>

        </li><!-- End Dashboard Nav -->
        <li class="nav-heading">Master Data</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/product') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Product</span></i>
            </a>
        </li><!-- End Product Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/category') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Categories</span></i>
            </a>
        </li><!-- End Categories Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/store') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Store</span></i>
            </a>
        </li><!-- End Store Page Nav -->

        <li class="nav-heading">Orders</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/orders') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Orders</span></i>
            </a>
        </li><!-- End Store Page Nav -->

        <li class="nav-heading">Transactions</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/transaction') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>Transaction</span></i>
            </a>
        </li><!-- End Store Page Nav -->

        <li class="nav-heading">User Setting</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="" onclick="errBox()">
                <i class="bi bi-person"></i>
                <span>Manage User</span>
            </a>
        </li><!-- End Profile Page Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="" onclick="errBox()">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="" onclick="errBox()">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav --> --}}

    </ul>

</aside>


<script>
    function errBox() {
        alert("Fitur belum tersedia");
    }
</script>
