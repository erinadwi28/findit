<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="#" onclick="loadMenu('<?= base_url('admin/form_create') ?>')"><button class="btn btn-primary"><i class="fas fa-plus-circle nav-icon"></i> Tambah Data Admin</button></a>
                <br>
                <br>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Nama Pengguna</th>
                            <th>Waktu Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_admin">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- DataTables -->
<script src="<?= base_url('assets/admin/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
    function loadKonten(url) {
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data)

                $('#tabel_admin').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    loadKonten('http://localhost/Praktikum/findit/backend_findit/admin/list_admin');

    function reload_event() {
        $('.linkEditAdmin').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            loadMenu('<?= base_url('admin/form_edit/') ?>' + hashClean);
        });

        $('.linkHapusAdmin').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            hapusData(hashClean);
        });

        $("#example1").DataTable();
    }

    function hapusData(id_admin) {
        var url = 'http://localhost/Praktikum/findit/backend_findit/admin/soft_delete_data?id_admin=' + id_admin;
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data);
                alert(objData['pesan']);
                loadKonten('http://localhost/Praktikum/findit/backend_findit/admin/list_admin');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        })
    }
</script>