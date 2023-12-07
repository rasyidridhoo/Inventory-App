@extends('layouts.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3 mb-3">Edit Data Barang</h1>
            <div class="card mb-4">
                <div class="card-header">
                
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/barang/{{$barang->id}}/update">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="KODEBRG" class="col-md-3 col-form-label">Kode Barang</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="KODEBRG" name="KODEBRG" autocomplete="off" required value="{{$barang->KODEBRG}}">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="NAMABRG" class="col-md-3 col-form-label">Nama Barang</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="NAMABRG" name="NAMABRG" autocomplete="off" required value="{{$barang->NAMABRG}}">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="SATUAN" class="col-md-3 col-form-label">Satuan</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="SATUAN" name="SATUAN" autocomplete="off" required value="{{$barang->SATUAN}}">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="HARGABELI" class="col-md-3 col-form-label">Harga Beli</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" id="HARGABELI" name="HARGABELI" autocomplete="off" required value="{{$barang->HARGABELI}}">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                @if ($errors->any())
                                <div class="alert alert-danger mt-3 mb-2" id="error-message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-dark">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            </div>

                            <div class="modal-footer mt-5">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                            </div>
                        </form>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
    $(document).ready(function() {
        @if ($errors->any())
            setTimeout(function() {
                $('#error-message').fadeOut('slow');
            }, 3000);
        @endif
    });
</script>

@endsection