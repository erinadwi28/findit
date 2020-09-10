<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">masukkan data admin dengan lengkap</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="formAdmin">
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
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nama pengguna" name="nama_pengguna" id="nama_pengguna">
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" class="form-control form-user-input" placeholder="masukkan kata sandi" name="kata_sandi" id="kata_sandi">
                            </div>
                        </div>
                        <!--card-body -->
                        <div class="card-footer">
                            <input class="form-user-input" type="hidden" name="id_admin" id="id_admin" value="">
                            <button class="btn btn-primary" type="submit">Simpan Data Admin</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#formAdmin').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    function sendDataPost() {

        var link = 'http://localhost/Praktikum/findit/backend_findit/admin/create_action/';

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
</script>