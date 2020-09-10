<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ubah data pengguna dengan data yang benar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="formEditPengguna">
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nomor induk kependudukan" name="nik" id="nik">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nama lengkap" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan tempat lahir" name="tempat_lahir" id="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control form-user-input" placeholder="masukkan tanggal lahir" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control form-user-input" name="jenis_kelamin" id="jenis_kelamin">
                                    <option selected>Pilih Jenis Kelamin...</option>
                                    <option value="Laki-Laki" class="form-user-input">Laki-Laki</option>
                                    <option value="Perempuan" class="form-user-input">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan agama" name="agama" id="agama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan alamat" name="alamat" id="alamat">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan pekerjaan" name="pekerjaan" id="pekerjaan">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control form-user-input" placeholder="example@gmail.com" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control form-user-input" disabled placeholder="masukkan nama pengguna" name="nama_pengguna" id="nama_pengguna">
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" class="form-control form-user-input" disabled placeholder="masukkan kata sandi" name="kata_sandi" id="kata_sandi">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan angka saja" name="no_telp" id="no_telp">
                            </div>
                        </div>
                        <!--card-body -->
                        <div class="card-footer">
                            <input class="form-user-input" type="hidden" name="id_pengguna" id="id_pengguna" value="">
                            <button class="btn btn-primary" type="submit">Ubah Data Pengguna</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#formEditPengguna').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    function sendDataPost() {

        var link = 'http://localhost/Praktikum/findit/backend_findit/pengguna/update_action/';

        var dataForm = {};
        var allInput = $('.form-user-input');

        $.each(allInput, function(i, val) {
            dataForm[val['name']] = val['value'];
        });

        $.ajax(link, {
            type: 'POST',
            data: dataForm,
            success: function(data, status, xhr) {
                var data_str = JSON.parse(data);
                alert(data_str['pesan']);
                loadMenu('<?= base_url('pengguna') ?>');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        });
    }

    function getDetail(id_pengguna) {
        var link = 'http://localhost/Praktikum/findit/backend_findit/pengguna/detail?id_pengguna=' + id_pengguna;

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                var data_obj = JSON.parse(data);

                if (data_obj['sukses'] == 'ya') {
                    var detail = data_obj['detail'];
                    $('#nik').val(detail['nik']);
                    $('#nama').val(detail['nama']);
                    $('#tempat_lahir').val(detail['tempat_lahir']);
                    $('#tanggal_lahir').val(detail['tanggal_lahir']);
                    $('#jenis_kelamin').val(detail['jenis_kelamin']);
                    $('#agama').val(detail['agama']);
                    $('#alamat').val(detail['alamat']);
                    $('#pekerjaan').val(detail['pekerjaan']);
                    $('#email').val(detail['email']);
                    $('#nama_pengguna').val(detail['nama_pengguna']);
                    $('#kata_sandi').val(detail['kata_sandi']);
                    $('#no_telp').val(detail['no_telp']);
                    $('#id_pengguna').val(detail['id_pengguna']);
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
    if ($titel == 'Form Edit Data Pengguna') {
        echo 'getDetail(' . $id_pengguna . ');';
    }
    ?>
</script>