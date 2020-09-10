<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ubah data pelaporan dengan data yang benar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="formEditLaporan">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pengguna</label>
                                <select class="form-control form-user-input" name="id_pengguna" id="id_pengguna">
                                    <option selected>Pilih Pengguna...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kantor</label>
                                <select class="form-control form-user-input" name="id_kantor" id="id_kantor">
                                    <option selected>Pilih Kantor...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lapor</label>
                                <input type="date" class="form-control form-user-input" placeholder="masukkan tanggal lapor" name="tanggal" id="tanggal">
                            </div>
                            <div class="form-group">
                                <label>Barang Hilang</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan barang hilang" name="barang_hilang" id="barang_hilang">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan deskripsi barang" name="deskripsi_barang" id="deskripsi_barang">
                            </div>
                            <div class="form-group">
                                <label>Kronologi</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan kronologi" name="kronologi" id="kronologi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Lampiran Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label upload-area" for="exampleInputFile">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control form-user-input" name="status" id="status">
                                    <option selected value="laporan diterima" class="form-user-input">laporan diterima</option>
                                    <option value="diproses" class="form-user-input">diproses</option>
                                    <option value="selesai" class="form-user-input">selesai</option>
                                </select>
                            </div>
                        </div>
                        <!--card-body -->
                        <div class="card-footer">
                            <input class="form-user-input" type="hidden" name="id_laporan" id="id_laporan" value="">
                            <button class="btn btn-primary" type="submit">Ubah Data Laporan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#formEditLaporan').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    function tampilKantor(url) {
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data)

                $('#id_kantor').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    tampilKantor('http://localhost/Praktikum/findit/backend_findit/laporan/get_kantor');

    function tampilPengguna(url) {
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data)

                $('#id_pengguna').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    tampilPengguna('http://localhost/Praktikum/findit/backend_findit/laporan/get_pengguna');

    function sendDataPost() {

        var link = 'http://localhost/Praktikum/findit/backend_findit/laporan/update_action/';

        var dataForm = new FormData();
        var allInput = $('.form-user-input');

        $.each(allInput, function(i, val) {
            dataForm.append(val['name'], val['value']);
        });

        var file = $('#file')[0].files[0];
        dataForm.append('file', file);

        $.ajax(link, {
            type: 'POST',
            data: dataForm,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data, status, xhr) {
                // var data_str = JSON.parse(data);
                alert(data['pesan']);
                loadMenu('<?= base_url('laporan') ?>');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        });
    }

    function getDetail(id_laporan) {
        var link = 'http://localhost/Praktikum/findit/backend_findit/laporan/detail?id_laporan=' + id_laporan;

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                var data_obj = JSON.parse(data);

                if (data_obj['sukses'] == 'ya') {
                    var detail = data_obj['detail'];
                    $('#tanggal').val(detail['tanggal']);
                    $('#barang_hilang').val(detail['barang_hilang']);
                    $('#deskripsi_barang').val(detail['deskripsi_barang']);
                    $('#kronologi').val(detail['kronologi']);
                    $('#foto').val(detail['foto']);
                    $('#status').val(detail['status']);
                    $('#id_pengguna').val(detail['id_pengguna']);
                    $('#id_kantor').val(detail['id_kantor']);
                    $('#id_laporan').val(detail['id_laporan']);
                } else {
                    alert('Data Tidak Ditemukan');
                }
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }

    <?php
    if ($titel == 'Form Edit Data Pelaporan') {
        echo 'getDetail(' . $id_laporan . ');';
    }
    ?>

    $("#file").change(function() {
        var file = $("#file")[0].files[0];
        console.log(file);
        $(".upload-area").text(file.name);
    });
</script>