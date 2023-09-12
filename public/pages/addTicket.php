<div class="container p-5">
<div class="form-group">
    <label for="exampleInputEmail1">Kategori</label>
    <input id="category" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kategori">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Açıklama</label>
    <input id="explanation" type="text" class="form-control" id="exampleInputPassword1" placeholder="Açıklama">
  </div>
  <button class="btn btn-primary addticket">Ekle</button>
</div>
</div>
<script>

    $(".addticket").click(function(){   
      addTicket($('#category').val(), $('#explanation').val()); 
    });
       
    $('#dialog').dialog('close')
</script>