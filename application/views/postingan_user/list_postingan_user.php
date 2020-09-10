<div>
    <div class="post-detail" id="isi">

    </div>
</div>

<script type="text/javascript">
    function loadKonten(url) {
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data)

                $('#isi').html(objData.konten);

            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error: ' + errorMsg);
            }
        })
    }

    loadKonten('http://localhost/Praktikum/findit/backend_findit/postingan_user/list_postingan');
</script>