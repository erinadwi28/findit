<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="#" onclick="loadMenu('<?= base_url('pengguna/form_create') ?>')"><button class="btn btn-primary"><i class="fas fa-plus-circle nav-icon"></i> Tambah Data Pengguna</button></a>
                <br>
                <br>
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>Email</th>
                            <th>Nama Pengguna</th>
                            <th>No Telepon</th>
                            <th>Waktu Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel_pengguna">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function loadKonten(url) {
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data)

                $('#tabel_pengguna').html(objData.konten);

                reload_event();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        });
    }
    loadKonten('http://localhost/Praktikum/findit/backend_findit/pengguna/list_pengguna');

    function reload_event() {
        $('.linkEditPengguna').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            loadMenu('<?= base_url('pengguna/form_edit/') ?>' + hashClean);
        });

        $('.linkHapusPengguna').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            hapusData(hashClean);
        });

        $("#example1").DataTable();
    }

    function hapusData(id_pengguna) {
        var url = 'http://localhost/Praktikum/findit/backend_findit/pengguna/soft_delete_data?id_pengguna=' + id_pengguna;
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data);
                alert(objData['pesan']);
                loadKonten('http://localhost/Praktikum/findit/backend_findit/pengguna/list_pengguna');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        })
    }
</script>