<?php
include('testadmin/dbConfig.php');

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
                                <!-- <a href="login.php" type="button" class="btn btn-info" role="button">Login</a> -->
                                <!-- <a href="logout.php" type="button" class="btn btn-info" role="button">Logout</a> -->
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
    $sql_banner = $sql . " WHERE id=26 ";
    $result = $conn->query($sql_banner);

    while ($row = $result->fetch_assoc()) {
    ?>
        <section class="banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="banner-section-image">
                            <img src="testadmin/images/<?= $row['image']; ?>" />
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

        <!-- Carousel -->
        <section class="carousel-section">
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/temp.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/temp2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/temp3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </section>

        <?php
        $sql_section1 = $sql . " WHERE id=35";
        $result = $conn->query($sql_section1);

        while ($row = $result->fetch_assoc()) {
        ?>
            <section class="what-desc-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>
                                <?php
                                echo $row['title'];
                                ?>
                            </h2>
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

            <br>
            <br>

            <div class="image-infrastructure-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <img class="img-fluid" src="images/htd.png" >
                        </div>
                    </div>
                </div>

            </div>


            <section class="why-desc-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Why Tekna?</h2>
                        </div>
                    </div>
                    <div class="row why-desc-section-item-card">

                        <?php
                        $sql_why1 = $sql . " WHERE id=36";
                        $result = $conn->query($sql_why1);

                        while ($row = $result->fetch_assoc()) {
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
                            $sql_why2 = $sql . " WHERE id=37";
                            $result = $conn->query($sql_why2);

                            while ($row = $result->fetch_assoc()) {
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
                                $sql_why3 = $sql . " WHERE id=38";
                                $result = $conn->query($sql_why3);

                                while ($row = $result->fetch_assoc()) {
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

            <section class="product-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-description">
                                <div class="card" style="width: 100%; height: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Check our product !</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <a href="#">
                                            Check now >
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="index.php">
                                        <div class="img-container">
                                            <img class="iamge_img" src="images/temp3.jpg" width="100%" alt="...">
                                            <div class="image_overlay">
                                                <div class="image_title">
                                                    Product 1
                                                </div>
                                                <p class="image_descriptiion">
                                                    Description
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="index.php">
                                        <div class="img-container">
                                            <img class="iamge_img" src="images/temp3.jpg" width="100%" alt="...">
                                            <div class="image_overlay">
                                                <div class="image_title">
                                                    Product 2
                                                </div>
                                                <p class="image_descriptiion">
                                                    Description
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="index.php">
                                        <div class="img-container">
                                            <img class="iamge_img" src="images/temp3.jpg" width="100%" alt="...">
                                            <div class="image_overlay">
                                                <div class="image_title">
                                                    Product 3
                                                </div>
                                                <p class="image_descriptiion">
                                                    Description
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="index.php">
                                        <div class="img-container">
                                            <img class="iamge_img" src="images/temp3.jpg" width="100%" alt="...">
                                            <div class="image_overlay">
                                                <div class="image_title">
                                                    Product 4
                                                </div>
                                                <p class="image_descriptiion">
                                                    Description
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="reviewer-rating-section">
                <div class="container">
                    <div class="row">
                        <h2>Our Testimonial</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card" style="width: 100%;">
                                <img src="images/1144760.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">John Doe</h5>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 100%;">
                                <img src="images/1144760.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">John Doe</h5>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 100%;">
                                <img src="images/1144760.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">John Doe</h5>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-us-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>
                                Contact Us
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <br>
                                <button type="submit" class="custom-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <br>

            <!-- Footer-->
            <?php
            $sql_footer = $sql . " WHERE id=31";
            $result = $conn->query($sql_footer);

            while ($row = $result->fetch_assoc()) {
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
                $sql_cr1 = $sql . " WHERE id=39";
                $result = $conn->query($sql_cr1);

                while ($row = $result->fetch_assoc()) {
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