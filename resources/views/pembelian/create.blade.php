@extends('layouts.app')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-3 mb-3">Tambah Data Pembelian</h1>
            <div class="card mb-4">
                <div class="card-header">
                
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('pembelian.store')}}">
                            @csrf
                            {{-- <div class="form-group row">
                                <label for="NOTRANSAKSI" class="col-md-3 col-form-label">No Transaksi</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="NOTRANSAKSI" name="NOTRANSAKSI" autocomplete="off" required>
                                </div>
                            </div> --}}

                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label">Nama Supplier</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="KODESPL" id="KODESPL" required>
                                        <option value="" disabled selected hidden>Nama Supplier</option>
                                        @foreach($supplierlist as $item)
                                            <option value="{{$item->KODESPL}}">{{$item->NAMASPL}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label">Nama Barang</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="KODEBRG" id="KODEBRG" required>
                                        <option value="" disabled selected hidden>Nama Barang</option>
                                        @foreach($baranglist as $item)
                                            <option value="{{$item->KODEBRG}}" data-hargabeli="{{$item->HARGABELI}}">{{$item->NAMABRG}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label">Harga Beli</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="HARGABELI" id="HARGABELI" required readonly>
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label">Tanggal Beli</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="TGLBELI" id="TGLBELI" required >
                                </div>
                            </div>
                            

                            <div class="form-group row mt-3">
                                <label for="QTY" class="col-md-3 col-form-label">QTY</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" id="QTY" name="QTY" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="DISKON" class="col-md-3 col-form-label">Diskon</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" id="DISKON" name="DISKON" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="DISKONRP" class="col-md-3 col-form-label">Diskon (Rp)</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" id="DISKONRP" name="DISKONRP" autocomplete="off" required>
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <label for="TOTALRP" class="col-md-3 col-form-label">Total (Rp)</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" id="TOTALRP" name="TOTALRP" autocomplete="off" required>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Memperbarui nilai Harga Beli saat dropdown KODEBRG berubah
    $(document).ready(function() {
        $('#KODEBRG').change(function() {
            var selectedOption = $(this).find('option:selected');
            var hargaBeli = selectedOption.attr('data-hargabeli');
            
            $('#HARGABELI').val(hargaBeli);
            calculateTotal(); // Panggil fungsi perhitungan total saat dropdown berubah
        });
        
        // Panggil fungsi perhitungan total saat QTY atau Diskon berubah
        $('#QTY, #DISKON').on('input', function() {
            calculateTotal();
        });
        
        // Fungsi perhitungan total
        function calculateTotal() {
            var hargaBeli = parseFloat($('#HARGABELI').val());
            var qty = parseFloat($('#QTY').val());
            var diskonPersen = parseFloat($('#DISKON').val());
            
            // Hitung total sebelum diskon
            var totalSebelumDiskon = hargaBeli * qty;
            
            // Hitung nilai diskon dalam rupiah
            var diskonRupiah = (diskonPersen / 100) * totalSebelumDiskon;
            
            // Kurangi diskon dari total sebelum diskon
            var totalSetelahDiskon = totalSebelumDiskon - diskonRupiah;
            
            // Tampilkan total setelah diskon pada input TOTALRP
            $('#TOTALRP').val(totalSetelahDiskon);
            
            // Tampilkan nilai diskon dalam rupiah pada input DISKONRP
            $('#DISKONRP').val(diskonRupiah);
        }
    });
</script>



@endsection