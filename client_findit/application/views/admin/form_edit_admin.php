<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ubah data admin dengan data yang benar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="formEditAdmin">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nama lengkap" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control form-user-input" name="jeniskelamin" id="jeniskelamin">
                                    <option selected>Pilih Jenis Kelamin...</option>
                                    <option value="Laki-Laki" class="form-user-input">Laki-Laki</option>
                                    <option value="Perempuan" class="form-user-input">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan angka saja" name="no_telp" id="no_telp">
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
                        </div>
                        <!--card-body -->
                        <div class="card-footer">
                            <input class="form-user-input" type="hidden" name="id_admin" id="id_admin" value="">
                            <button class="btn btn-primary" type="submit">Ubah Data Admin</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#formEditAdmin').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    function sendDataPost() {

        var link = 'http://localhost/Praktikum/findit/backend_findit/admin/update_action/';

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
                loadMenu('<?= base_url('admin') ?>');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        });
    }

    function getDetail(id_admin) {
        var link = 'http://localhost/Praktikum/findit/backend_findit/admin/detail?id_admin=' + id_admin;

        $.ajax(link, {
            type: 'GET',
            success: function(data, status, xhr) {
                var data_obj = JSON.parse(data);

                if (data_obj['sukses'] == 'ya') {
                    var detail = data_obj['detail'];
                    $('#nama').val(detail['nama']);
                    $('#id_admin').val(detail['id_admin']);
                    $('#jeniskelamin').val(detail['jeniskelamin']);
                    $('#no_telp').val(detail['no_telp']);
                    $('#email').val(detail['email']);
                    $('#nama_pengguna').val(detail['nama_pengguna']);
                    $('#kata_sandi').val(detail['kata_sandi']);
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
    if ($titel == 'Form Edit Data Admin') {
        echo 'getDetail(' . $id_admin . ');';
    }
    ?>
</script>