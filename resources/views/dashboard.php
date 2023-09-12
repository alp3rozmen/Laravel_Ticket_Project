<?php 
session_start();
if (isset($_SESSION['username']) == "") {
  return redirect()->to('/login')->send();
}
?>
<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('header.php')?>
    <title>Dashboard</title>
 
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
 
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Ticket System</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['username']?></a>
                    </div>
                </div>

           
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-ticket-alt"></i>
                                <p>
                                    Ticketler
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item sidebar-menu-item" data-page="tickets">
                                    <a href="#" class="nav-link " data-page="tickets">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ticketlerim</p>
                                    </a>
                                </li>
                                <li class="nav-item sidebar-menu-item" data-page="addTicket">
                                    <a href="#" class="nav-link" data-page="tickets">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Ticket Ekle</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link exit">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Çıkış Yap
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper" id="content-wrapper">



        </div>

       

        <!-- <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer> -->
    </div>




<script>
    // content-change.js
$(document).ready(function() {
    // Sayfa yüklendiğinde varsayılan içerik yüklenir
    loadDefaultContent();

    // Sidebar menü öğelerine tıklanınca içerik değişir
    $(".sidebar-menu-item").click(function() {    
        var page = $(this).data("page");
       
        $(".sidebar-menu-item").children("a").removeClass("active");
        $(this).children("a").addClass("active");
       
        loadPageContent(page);

    });

    
});

function loadDefaultContent() {
    // Varsayılan içerik yüklenir
    $("#content-wrapper").html("");
}

function loadPageContent(page) {
    // Sayfa içeriği yüklenir
  
    $.ajax({
        url: "pages/" + page + ".php", // Sayfa içeriği URL'si
        success: function(data) {
            $("#content-wrapper").html(data);
        },
        error: function() {
            $("#content-wrapper").html("<p>Sayfa yüklenirken bir hata oluştu.</p>");
        }
    });


}

    $(".exit").click(function() {
        
        window.location.href = window.location.origin + '/ticketProject/public/logout';

    });
    
</script>

</body>

</html>