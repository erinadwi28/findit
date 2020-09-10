<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="#" onclick="loadMenu('<?= base_url('laporan/form_create') ?>')"><button class="btn btn-primary"><i class="fas fa-plus-circle nav-icon"></i> Tambah Data Pelaporan</button></a>
                <br>
                <br>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Pengguna</th>
                            <th>Tanggal Lapor</th>
                            <th>Kantor Tujuan</th>
                            <th>Barang Hilang</th>
                            <th>Deskripsi</th>
                            <th>Kronologi</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Waktu Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_laporan">

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

                $('#tabel_laporan').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    loadKonten('http://localhost/Praktikum/findit/backend_findit/laporan/list_laporan');

    function reload_event() {
        $('.linkEditLaporan').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            loadMenu('<?= base_url('laporan/form_edit/') ?>' + hashClean);
        });

        $('.linkHapusLaporan').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            hapusData(hashClean);
        });

        $("#example1").DataTable();
    }

    function hapusData(id_laporan) {
        var url = 'http://localhost/Praktikum/findit/backend_findit/laporan/soft_delete_data?id_laporan=' + id_laporan;
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data);
                alert(objData['pesan']);
                loadKonten('http://localhost/Praktikum/findit/backend_findit/laporan/list_laporan');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        })
    }
</script>