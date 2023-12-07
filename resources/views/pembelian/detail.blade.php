@extends('layouts.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3 mb-3">Detail Pembelian</h1>
            
            <div class="card mb-4">
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered" width="70%" cellspacing="0">
                        <thead></thead>
                        <tbody>
                            
                            @if($pembelian->hbeli->NOTRANSAKSI == $pembelian->NOTRANSAKSI)
                                <tr>
                                    <th>No Transaksi</th>
                                    <td>{{$pembelian->hbeli->NOTRANSAKSI }}</td>
                                </tr>    
                                <tr>
                                    <th>Kode Barang</th>
                                    <td>{{$pembelian->KODEBRG}}</td>
                                </tr>
                                <tr>
                                    <th>Harga Beli</th>
                                    <td>{{$pembelian->HARGABELI}}</td>
                                </tr>
                                <tr>
                                    <th>QTY</th>
                                    <td>{{$pembelian->QTY}}</td>
                                </tr>
                                <tr>
                                    <th>Diskon (%)</th>
                                    <td>{{$pembelian->DISKON}}</td>
                                </tr>

                                <tr>
                                    <th>Diskon (Rp)</th>
                                    <td>{{$pembelian->DISKONRP}}</td>
                                </tr>
                                <tr>
                                    <th>Total (Rp)</th>
                                    <td>{{$pembelian->TOTALRP}}</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                    <div class="col-auto mt-3" style="text-align: end">
                        <a href="/pembelian" class="btn btn-danger">Kembali</a>
                    </div>
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