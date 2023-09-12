<head>
    <?php include('header.php')?>
    <title>Kayıt Ol</title>
</head>
<html>
  <body>
    <div class="container mt-5">
    
    <img class='img-fluid mx-auto' style ="width: 100px" src='https://static.vecteezy.com/system/resources/previews/012/027/723/non_2x/admit-one-ticket-icon-black-and-white-isolated-wite-free-vector.jpg'></img>
    <label>Kayıt Ol</label>

        <div class="form-group">
            <label for="exampleInputEmail1">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Kullanıcı Adı">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email Adresi</label>
            <input type="email" class="form-control" id="emailAddres" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Şifre</label>
            <input type="password" class="form-control" id="password" placeholder="Şifre">
        </div>
        <div class="d-flex">
            <button class="goback m-1 btn btn-primary">Geri Dön</button>
            <button class="register m-1 d-block btn btn-primary">Kayıt Ol</button>
        <div>
    
    </div>        

  </body>

  <script>
    
    $(".goback").click(function() {
        window.location.href = window.location.origin + '/ticketProject/public/login';

    });
    
   
    $(".register").click(function() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('emailAddres').value;
        var password = document.getElementById('password').value; 
        register(name,email,password);
    });

    
  </script>
</html>
