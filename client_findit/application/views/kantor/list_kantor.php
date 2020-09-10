<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="#" onclick="loadMenu('<?= base_url('kantor/form_create') ?>')"><button class="btn btn-primary"><i class="fas fa-plus-circle nav-icon"></i> Tambah Data Kantor</button></a>
                <br>
                <br>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kantor</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Nama Pimpinan</th>
                            <th>Waktu Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_kantor">

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

                $('#tabel_kantor').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    loadKonten('http://localhost/Praktikum/findit/backend_findit/kantor/list_kantor');

    function reload_event() {
        $('.linkEditKantor').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            loadMenu('<?= base_url('kantor/form_edit/') ?>' + hashClean);
        });

        $('.linkHapusKantor').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            hapusData(hashClean);
        });

        $("#example1").DataTable();
    }

    function hapusData(id_kantor) {
        var url = 'http://localhost/Praktikum/findit/backend_findit/kantor/soft_delete_data?id_kantor=' + id_kantor;
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data);
                alert(objData['pesan']);
                loadKonten('http://localhost/Praktikum/findit/backend_findit/kantor/list_kantor');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        })
    }
</script>