<form role="form" id="formPostingan">
    <div class="card-body">
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control form-user-input" name="deskripsi" id="deskripsi" rows="10" placeholder="masukkan deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label>Lampiran Foto</label>
            <div class="col-md-12">
                <input type="file" name="file" id="file">
                <!-- Drag and Drop Container -->
                <div class="upload-area" id="uploadfile">
                    <h4>Drag and Drop file here <br /> or <br /> Click to select file</h4>
                </div>
            </div>
        </div>
        <div class="form-group">
            <!-- <label>Id Pengguna</label> -->
            <input type="hidden" value="<?= $this->session->userdata('id_pengguna'); ?>" class="form-control form-user-input" name="id_pengguna" id="id_pengguna">
        </div>
    </div>
    <!--card-body -->
    <div class="card-footer">
        <input class="form-user-input" type="hidden" name="id_postingan" id="id_postingan" value="">
        <button class="btn btn-primary" type="submit">Unggah</button>
    </div>
</form>

<script type="text/javascript">
    $('#formPostingan').on('submit', function(e) {
        e.preventDefault();
        sendDataPost();
    });

    function sendDataPost() {

        var link = 'http://localhost/Praktikum/findit/backend_findit/postingan_user/create_action/';

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
                //var data_str = JSON.parse(data);
                alert(data['pesan']);
                loadMenu('<?= base_url('postingan_user') ?>');
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        });
    }

    // user men-drop file ke halaman HTML browser tidak membuka link file atau image tersebut
    $("html").on("drop", function(e) {
        e.preventDefault();
        e.stopPropagation();
    });

    // user men-drag file kedalam halaman HTML, kita bisa merubah keterangan form menjadi “Drag Here”
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".upload-area > h4").text("Drag here");
    });

    // user men-drag file kedalam Kontainer Form, kita bisa merubah keterangan form menjadi “Drop”
    $('.upload-area').on('dragenter', function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area > h4").text("Drop !!");
    });

    $('.upload-area').on('dragover', function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(".upload-area > h4").text("Drop !!");
    });

    $(".upload-area").click(function() {
        $("#file").click();
    });

    $(".upload-area").on("drop", function(e) {
        e.preventDefault();
        e.stopPropagation();
        var file = e.originalEvent.dataTransfer.files;
        $("#file")[0].files = file;
        console.log(file);
        $(".upload-area > h4").text("File yang dipilih : " + file[0].name);
    });

    $("#file").change(function() {
        var file = $("#file")[0].files[0];
        console.log(file);
        $(".upload-area > h4").text("File yang dipilih : " + file.name);
    });
</script>