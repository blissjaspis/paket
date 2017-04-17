@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
    <li class="active">Create</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create Laporan
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('paket.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="buku">Kota</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kota">
                            <option value="NTT">NTT</option>
                            <option value="Bali">Bali</option>
                            <option value="Aceh">Aceh</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-10 col-sm-offset-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Buku</th>
                                <th>Jumlah Buku</th>
                            </tr>
                        </thead>
                        <tbody id="wrapper">
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="kode[]" value="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="nama_buku[]" value="">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="jumlah_buku[]" value="">
                                </td>
                            </tr>
                        </tbody>
                        <button type="button" id="tambah" name="button" class="btn btn-default">Tambah</button>
                    </table>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="buku">Tanggal Dikirim:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tanggal_dikirim">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="buku">Foto Resi</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="foto_resi">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="buku">Foto Barang</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="foto_barang">
                    </div>
                </div>

                <hr>

                <button type="submit" class="pull-right btn btn-default">Simpan</button>

            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper         = $("#wrapper");
        var add_button      = $("#tambah");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append('<tr><td><input type="text" class="form-control" name="kode[]"></td><td><input type="text" class="form-control" name="nama_buku[]"></td><td><input type="text" class="form-control" name="jumlah_buku[]"></td><td><a href="#" class="delete">Delete</a></td></tr>'); //add input box
            } else {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click",".delete", function(e){
            e.preventDefault();
            var ayah = $(this).parent('td');
            ayah.parent('tr').remove(); x--;
        })
    });
</script>
@endsection
