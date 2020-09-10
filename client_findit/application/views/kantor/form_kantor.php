<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">masukkan data kantor dengan lengkap</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="formKantor">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Kantor</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nama kantor" name="nama_kantor" id="nama_kantor">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nomor telepon" name="no_telp" id="no_telp">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan alamat kantor" name="alamat" id="alamat">
                            </div>
                            <div class="form-group">
                                <label>Nama Pimpinan</label>
                                <input type="text" class="form-control form-user-input" placeholder="masukkan nama pimpinan" name="nama_pimpinan" id="nama_pimpinan">
                            </div>

                            <!-- <label>Id Anda akan terekam saat Anda menambah data kantor</label>
                            <div class="form-group">
                                <input type="text" name="id_admin" id="id_admin" value="<?= $this->session->userdata('id_admin') ?>">
                            </div> -->

                        </div>
                        <!--card-body -->
                        <div class="card-footer">
                            <input class="form-user-input" type="hidden" name="id_kantor" id="id_kantor" value="">
                            <button class="btn btn-primary" type="submit">Simpan Data Kantor</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#formKantor').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    function sendDataPost() {

        var link = 'http://localhost/Praktikum/findit/backend_findit/kantor/create_action/';

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
                loadMenu('<?= base_url('kantor') ?>');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        });
    }
</script>