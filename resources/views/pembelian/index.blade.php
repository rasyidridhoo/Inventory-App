@extends('layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3 mb-3">Data Pembelian</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <a href="/pembelian/create"><button type="button" class="btn btn-primary">Tambah Data</button></a>                   
                        </div>       
                    </div>                 
                </div>
                
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Kode Supplier</th>
                                <th>Tanggal Beli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelian as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->NOTRANSAKSI}}</td>
                                    <td>{{$item->KODESPL}}</td>
                                    <td>{{$item->TGLBELI}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="/pembelian/{{$item->NOTRANSAKSI}}/show" class="btn btn-secondary">Detail</a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="/pembelian/{{$item->NOTRANSAKSI}}/edit" class="btn btn-success">Edit</a>
                                            </div>
                                            <div class="col-auto">
                                                <form action="/pembelian/{{$item -> NOTRANSAKSI}}/delete" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input value="Delete" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
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
</div>

<script>
    @if(session('success'))
        alert("{{ session('success') }}");
    @elseif(session('error'))
        alert("{{ session('error') }}");
    @endif

</script>

@endsection