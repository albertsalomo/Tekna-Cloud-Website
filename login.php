<?php 

include 'testadmin/dbConfig.php';

error_reporting(0);
session_start();

if(isset($_SESSION['email'])){
    header("Location:index.php");
}

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_login = "SELECT * FROM tb_user WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn, $sql_login);
    $check = mysqli_num_rows($res);

    if($check > 0){
        $data = mysqli_fetch_assoc($res);
        $_SESSION['email'] = $data['email'];
        header("Location:index.php");
    } else {
        echo "<script>alert('Login Failed')</script>";
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TEKNA Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
    <section class="abovefold overflow-hidden">
        <div class="container position-relative">
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Ornament.png"
                alt="bg-header" class="img-fluid img-header d-none d-md-block">
        </div>
        
        <div class="container header">
            <div class="row">
                <div class="col-lg-6 px-md-0 my-auto position-relative">
                    <div class="headline">
                        TEKNA<br><span class="cl-light-blue">Cloud</span>
                    </div>
                    <div class="sub-headline">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, dicta.
                    </div>
                    <div class="row four-point">
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                                alt="vector" class="me-3"> Licensed & Regulated
                        </div>
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                                alt="vector" class="me-3"> Hassle-free
                        </div>
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                                alt="vector" class="me-3"> 100% Transparent
                        </div>
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png"
                                alt="vector" class="me-3"> Across 180+ Countries
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-md-0">
                    <form action="" method="POST">
                        <div class="card">
                            <h3 class="text-center mb-4">Login</h3>
                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <span class="input-title">Email</span>
                                    <input type="text" name="email" class="form-control mt-2" placeholder="Email@example.org" value="<?php echo $email ?>">
                                </label>
                            </div>
                            <div class="input-group mb-4">
                                <label for="input" class="w-100">
                                    <span class="input-title">Password</span>
                                    <input type="password" name="password" class="form-control mt-2" placeholder="Your Password" value="<?php echo $_POST['password']; ?>">
                                </label>
                            </div>
                            <button class="btn btn-card" name="submit">Login</button>
                            <a href="register.php" class="text-center">Make An Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>