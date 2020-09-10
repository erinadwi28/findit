<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">masukkan data pelaporan dengan lengkap</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="formLaporan">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pengguna</label>
                                <select id="id_pengguna" class="form-control form-user-input" name="id_pengguna" id="id_pengguna">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kantor</label>
                                <select id="id_kantor" class="form-control form-user-input" name="id_kantor" id="id_kantor">
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
                                <textarea class="form-control form-user-input" name="deskripsi_barang" id="deskripsi_barang" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kronologi</label>
                                <textarea class="form-control form-user-input" name="kronologi" id="kronologi" cols="30" rows="10"></textarea>
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
                                <!-- <label>Status</label> -->
                                <input type="hidden" class="form-control form-user-input" placeholder="" name="status" id="status" value="laporan diterima">
                            </div>
                        </div>
                        <!--card-body -->
                        <div class="card-footer">
                            <input class="form-user-input" type="hidden" name="id_laporan" id="id_laporan" value="">
                            <button class="btn btn-primary" type="submit">Simpan Data Laporan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#formLaporan').on('submit', function(e) {
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

        var link = 'http://localhost/Praktikum/findit/backend_findit/laporan/create_action/';

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

    $("#file").change(function() {
        var file = $("#file")[0].files[0];
        console.log(file);
        $(".upload-area").text(file.name);
    });
</script>