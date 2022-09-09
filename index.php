<?php 
    include ('testadmin/dbConfig.php');               
    
    $sql = "SELECT * FROM tb_content";
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
                            echo $row['title'];
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-section-sub-description">
                        <?php 
                            echo $row['content'];
                        }
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
<!-- banner end -->

<div class="line-section">
    <div class="container">
        <div class="row">
            <hr>
        </div>
    </div>
</div>

<?php
    $sql_section1 = $sql." WHERE id=35";                 
    $result = $conn->query($sql_section1);

    while($row = $result->fetch_assoc()) {
?>
<section class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h3>
                    <?php 
                        echo $row['title'];
                    ?>
                </h3>
                <p>
                    <?php
                        echo $row['content'];
                    }
                    ?>
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
                <h1>Why Tekna?</h1>
            </div>
        </div>
        <div class="row section-4-item-card">
            
            <?php
                $sql_why1 = $sql." WHERE id=36";                 
                $result = $conn->query($sql_why1);

                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-check"></i>
                        <h5 class="card-title">
                            <?php 
                                echo $row['content'];
                                }
                            ?>
                        </h5>
                    </div>
                    </div>
            </div>

            <?php
                $sql_why2 = $sql." WHERE id=37";                 
                $result = $conn->query($sql_why2);

                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-coins"></i>
                        <h5 class="card-title">
                        <?php 
                            echo $row['content'];
                            }   
                        ?>
                        </h5>
                    </div>
                    </div>
            </div>

            <?php
                $sql_why3 = $sql." WHERE id=38";                 
                $result = $conn->query($sql_why3);

                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-award" style="padding-left: 14px; padding-right: 14px"></i>
                        <h5 class="card-title">
                            <?php 
                                echo $row['content'];
                                }
                            ?>
                        </h5>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<section class="section-1"></section>
</section>

<?php
    $sql_footer = $sql." WHERE id=31";                 
    $result = $conn->query($sql_footer);

    while($row = $result->fetch_assoc()) {
?>
<footer class="footer">
    <div class="container">
        <div class="row">
                <div class="content-title">
                    <h4>
                        <?php 
                            echo $row['title'];        
                        ?>
                    </h4>
                    <p>
                        <?php 
                        echo $row['content'];
                        ?>
                    </p>
                </div>
        </div>
    </div>
</footer>

<?php
    $sql_cr1 = $sql." WHERE id=39";                 
    $result = $conn->query($sql_cr1);

    while($row = $result->fetch_assoc()) {
?>
<div class="copyright">
    <?php 
        echo $row['content'];
    }
    ?>
</div>

<script src="assets/js/script.js"></script>
<?php 
}
$conn->close();
?>
</body>
</html>