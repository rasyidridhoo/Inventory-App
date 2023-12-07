@extends('layouts.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 mb-3">Main Menu</h1>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <h3>{{$totalBarang}}</h3>
                                <h5>Barang</h5>
                            </div>
                            <div class="card-body" style="text-align: end;">
                                <a href="{{route('barang.index')}}" class="btn btn-sm btn-flash-border-success" style="color: rgb(255, 255, 255)"><i class="fa-solid fa-arrow-right fa-xl"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-3">
                            <div class="card-body">
                                <h3>{{$totalSupplier}}</h3>
                                <h5>Supplier</h5>
                            </div>
                            <div class="card-body" style="text-align: end;">
                                <a href="{{route('supplier.index')}}" class="btn btn-sm btn-flash-border-success" style="color: rgb(255, 255, 255)"><i class="fa-solid fa-arrow-right fa-xl"></i></a>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 ">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h3>{{$totalPembelian}}</h3>
                                <h5>Pembelian</h5>
                            </div>
                            <div class="card-body" style="text-align: end;">
                                <a href="{{route('pembelian.index')}}" class="btn btn-sm btn-flash-border-success" style="color: rgb(255, 255, 255)"><i class="fa-solid fa-arrow-right fa-xl"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>Stock Barang</h4>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($stockBarang as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->barang->KODEBRG}}</td>
                                <td>{{$item->barang->NAMABRG}}</td>
                                <td>{{$item->QTYBELI}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                
            </div>
        </div>
    </footer>
</div>
@endsection