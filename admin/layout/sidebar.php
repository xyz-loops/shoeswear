        <!-- Sidebar -->
        <ul class="navbar-nav bg-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-3" href="/shoeswear/admin/index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-shoe-prints"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SHOESWEAR</div>
            </a>

            <!-- Divider -->
            <hr class="my-2">
            <hr class="sidebar-divider my-0">
            </hr>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/shoeswear/admin/index.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Produk Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="/shoeswear/admin/produk.php">
                    <i class="fas fa-store-alt	"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="/shoeswear/admin/transaksi.php">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pengguna Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="/shoeswear/admin/pengguna.php">
                    <i class="fas fa-user-alt"></i>
                    <span>Pengguna</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= url?> user/masuk.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

        </ul>
        <!-- End of Sidebar -->