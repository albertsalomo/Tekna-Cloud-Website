<?php 
    include ('testadmin/dbConfig.php');               
    
    $sql = "SELECT * FROM buku";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Javascript -->
    <script src="bootstrap/js/bootstrap.js"></script>


    <title>Tekna Website</title>
<body>
 <!-- header start -->
 <header class="header">
    <div class="container">

        <div class="row v-center">
            <div class="header-item item-left">
                <div class="logo">
                    <a href="#"><img src="images/tekna-logo-03.png"></a>
                </div>
            </div>
            <!-- menu start here -->
            <div class="header-item item-center">
                <div class="menu-overlay">
                </div>
                <nav class="menu">
                    <div class="mobile-menu-head">
                        <div class="go-back"><i class="fa fa-angle-left"></i></div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="menu-main">
                        <li>
                            <a href="http://portal.teknacloud.id" type="button" class="btn btn-info" role="button">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- menu end here -->
            <div class="header-item item-right">
                <!-- mobile menu trigger -->
                <div class="mobile-menu-trigger">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<!-- banner start -->
<?php
    $sql_banner = $sql." WHERE id=26 ";                 
    $result = $conn->query($sql_banner);

    while($row = $result->fetch_assoc()) {
?>
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="banner-section-image">
                    <img src="testadmin/images/<?= $row['image']; ?>"/>
                </div>
            </div>
            <div class="col-lg-7 desc">
                <div class="row">
                    <div class="banner-section-description">
                        <?php 
                            echo $row['judul'];
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-section-sub-description">
                        <?php 
                            echo $row['tahun'];
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-section-button">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
}
$conn->close();
?>
<!-- banner end -->

<div class="line-section">
    <div class="container">
        <div class="row">
            <hr>
        </div>
    </div>
</div>

<section class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h3>What is TeknaCloud ?</h3>
                <p>
                    Tekna Cloud is an Privat Company owned Infrastructure as a Service (IaaS) provider with a clear mission to provide the most performant, secure, and reliable cloud infrastructure in the world. 
                    We operate one of the world's most diverse networks with a presence in 24 datacentres across 10 countries and are the preferred choice for enterprises and government agencies looking to host mission critical applications
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-1"></section>
<div class="container"><img src="images/BODY1.png"></div>
</section>


<section class="section-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Why Tekna ?</h1>
            </div>
        </div>
        <div class="row section-4-item-card">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-check"></i>
                        <h5 class="card-title">Performance, Security, Reliability and Affordable</h5>
                    </div>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-coins"></i>
                        <h5 class="card-title">Relationships Built on top of Meaningful SLA's and Support 24/7
                        </h5>
                    </div>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-award" style="padding-left: 14px; padding-right: 14px"></i>
                        <h5 class="card-title">Data sovereignty & Transparent Billing Model
                        </h5>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<section class="section-1"></section>
</section>


<footer class="footer">
    <div class="container">
        <div class="row">
                <div class="content-title">
                    <h4>PT TEKNA DIGITAL INFORMATIKA </h4>
                    <p>Alamat: Patra Jasa Office Tower Lt 17 Room 1703
                        Jl. Jend. Gatot Subroto Kav 32- 34 Rt 001 Rw 003 Kel. Kuningan Timur
                        Kec. Setia Budi Jakarta  12950</p>
                    <p>Telp: +62-21-52900252</p>
                    <p>Fax : +62-21 52900253</p>
                    <p>WhatsApp: +62-85220022884</p>
                    <p>email: support@teknacloud.id</p>
                </div>
        </div>
    </div>
</footer>

<div class="copyright">
    Copyright © 2022 Tekna Cloud | All Rights Reserved
</div>

<script src="assets/js/script.js"></script>
</body>
</html>