<div class="container p-5">

    <table id="example" class="display" style="width:100%">
        <tbody id="data-table-body">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Açıklama</th>
                    <th>Durum</th>
                    <th>Kategori</th>
                    <th>Düzenle</th>
                </tr>
            </thead>
        </tbody>
    </table>
</div>


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="js/api.js"></script>
<script>
    $(document).ready(function() {

        table = $('#example').dataTable({
            "ajaxSource": "api/listicket",
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "explanation"
                },
                {
                    "data": "status"
                },
                {
                    "data": "category"
                },
                {
                    "data": "id",
                    "render": function(data, type, row, meta) {
                        return '<button type="button" class="sil-button" data-id="' + data + '">Sil</button> <button type="button" class="guncelle-button" data-id="' + data + '">Güncelle</button>';
                    }
                }
            ]
        });

        $(document).on("click", ".sil-button", function() {
            var id = $(this).data("id");
            removeTicket(id);
        });

        $(document).on("click", ".guncelle-button", function() {
            var id = $(this).data("id");
            // 1. Bir div elementi oluşturun
            var divElement = document.createElement("div");
            divElement.id = "dialog";
            divElement.title = "Güncelle";

            // 2. Div elementine içerik ekleyin
            divElement.innerHTML = `
                <div class="form-group">
                    <label for="exampleInputPassword1">Açıklama</label>
                    <input id="explanation" type="text" class="form-control" id="explanation" placeholder="Açıklama">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <input id="category" type="text" class="form-control" id="category"  placeholder="Kategori">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Durum</label>
                    <input id="status" type="text" class="form-control" id="status" placeholder="Durum">
                </div>
                <button class="btn btn-primary submitupdate">Değiştir</button>
            `;

            // 3. Oluşturulan div elementini sayfaya ekleyin
            document.body.appendChild(divElement);

            $(function() {
                $("#dialog").dialog();
            });


            $(document).on("click", ".submitupdate", function() {
              updateTicket(id ,$('#explanation').val(),$('#category').val(),$('#status').val());
              $("#dialog").dialog('close');
             });
           
        });

        
    });
</script>