<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php')?>
    <title>Login</title>
</head>
<body>
  
<div class ='container mt-5 '>

<img class='img-fluid mx-auto' style ="width: 100px" src='https://static.vecteezy.com/system/resources/previews/012/027/723/non_2x/admit-one-ticket-icon-black-and-white-isolated-wite-free-vector.jpg'></img>
<label>Giriş Yap</label>

  <!-- Email input -->
  <div class="form-outline mb-4 mt-3">
    <input type="email" id="emailAddres" class="form-control" />
    <label class="form-label" for="form2Example1">Email Adresi</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" />
    <label class="form-label" for="form2Example2">Şifre</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    
  <!-- Submit button -->
  <button onclick="signIn()" type="button" class="btn btn-primary btn-block mb-4">Giriş Yap</button>

  <button type="button" class="btn btn-primary btn-block mb-4 register">Kayıt Ol</button>


</div>   
<script>
    function signIn(){
        var email = document.getElementById('emailAddres').value;
        var password = document.getElementById('password').value; 
        login(email,password);
    }  

    
    $(".register").click(function() {
        
        window.location.href = window.location.origin + '/ticketProject/public/register';

    });

    
    
</script>   
</body>
</html>
