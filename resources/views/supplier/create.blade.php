@extends('layouts.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3 mb-3">Tambah Data Supplier</h1>
            <div class="card mb-4">
                <div class="card-header">
                
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('supplier.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="KODESPL" class="col-md-3 col-form-label">Kode Supplier</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="KODESPL" name="KODESPL" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="NAMASPL" class="col-md-3 col-form-label">Nama Supplier</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="NAMASPL" name="NAMASPL" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-9">
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