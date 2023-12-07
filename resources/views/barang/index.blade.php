@extends('layouts.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3 mb-3">Data Barang</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <a href="/barang/create"><button type="button" class="btn btn-primary">Tambah Data</button></a>                   
                        </div>       
                    </div>                 
                </div>
                
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->KODEBRG}}</td>
                                    <td>{{$item->NAMABRG}}</td>
                                    <td>{{$item->SATUAN}}</td>
                                    <td>{{$item->HARGABELI}}</td>
                                    {{-- <td>{{ $barang->stock->QTYBELI ?? '0' }}</td> --}}
                                
                                    <td>
                                        <div class="row">
                                            <div class="col-auto">
                                                <a href="/barang/{{$item->id}}/edit" class="btn btn-success">Edit</a>
                                            </div>
                                            <div class="col-auto">
                                                <form action="/barang/{{$item -> id}}/delete" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input value="Delete" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data? Barang : {{$item -> NAMABRG}}')">
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