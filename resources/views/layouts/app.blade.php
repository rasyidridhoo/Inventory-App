<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inventaris App</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="{{route('main.index')}}">Inventaris App</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link {{request()->is('main*')? 'active' : ''}}"  href="{{route('main.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                Main
                            </a>

                            <a class="nav-link {{request()->is('barang*')? 'active' : ''}}"  href="{{route('barang.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                                Barang
                            </a>

                            <a class="nav-link {{request()->is('supplier*')? 'active' : ''}}"  href="{{route('supplier.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Supplier
                            </a>

                            <a class="nav-link {{request()->is('pembelian*')? 'active' : ''}}"  href="{{route('pembelian.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Pembelian
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
            
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{asset('js/datatables.js')}}"></script>
    </body>
</html>
