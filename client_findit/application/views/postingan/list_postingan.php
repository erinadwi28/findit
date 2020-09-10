<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Pengguna</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Waktu Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_postingan">

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

                $('#tabel_postingan').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    loadKonten('http://localhost/Praktikum/findit/backend_findit/postingan/list_postingan');

    function reload_event() {
        $('.linkHapusPostingan').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            hapusData(hashClean);
        });

        $("#example1").DataTable();
    }

    function hapusData(id_postingan) {
        var url = 'http://localhost/Praktikum/findit/backend_findit/postingan/soft_delete_data?id_postingan=' + id_postingan;
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data);
                alert(objData['pesan']);
                loadKonten('http://localhost/Praktikum/findit/backend_findit/postingan/list_postingan');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        })
    }
</script>