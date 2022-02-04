<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>PCsales Homepage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Track sales for pc parts and office equipment" />
        <meta name="keywords" content="PC, sale, sales, GPU" />
        <meta name="author" content="rpryor13@gmail.com" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="images/LOGOSMALL.ico" />

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

        <!-- Material Icon -->
        <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

        <!-- tinyslider -->
        <link rel="stylesheet" href="css/tiny-slider.css">

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="58">
        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
            <div class="container">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index.html">
                    <img src="images/logo-dark.png" alt="" class="logo-light" height="20" />
                    <img src="images/logo-dark.png" alt="" class="logo-dark" height="20" />
                </a>

                <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto navbar-center mt-lg-0 mt-2" id="navbar-navlist">
                        <li class="nav-item">
                            <a href="http://pcsales.io/index.html" class="nav-link" id="scrollElement">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://pcsales.io/browse.php" class="nav-link" id="scrollElement">Browse</a>
                        </li>
                    </ul>
                    <a href="https://pcsales.io/signup.php" class="btn btn-info btn-sm navbar-btn my-lg-0 my-2">Sign Up</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero section Start -->
        <section class="hero-1 bg-primary" id="home">
            <!-- bg-overlay-img -->
            <div class="bg-overlay overflow-hidden bg-transparent">
                <div class="hero-1-bg"></div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="hero-wrapper text-white-50 text-center">
                            <h5 class="text-white-50 home-small-title">PCsales</h5>
                            <h1 class="hero-1-title display-4 text-white mb-4">Your email has been removed from our list!</h1>

                            <div class="pt-2">
                                <a href="https://pcsales.io/index.html" class="btn btn-light mr-2">Click here to head back to our Homepage</a>
                            
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="home-img mt-5">
                                <img src="images/home-img.png" alt="" class="img-fluid mx-auto d-block" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

<?php 
$strEmail = $_GET['txtEmail'];

$servername = "DATABASE HERE";
$username = "USERNAME HERE";
$password = "PASSWORD HERE";
$dbname = "default";


$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$PKID = NULL;
$strSelect = "SELECT idcontacts FROM contacts WHERE strEmail = '$strEmail'";
echo $strSelect;
$result = $conn->query($strSelect);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $PKID = $row["idcontacts"];
    }}

if($PKID === NULL ){
    relax();
}
else{
    $strDelete = "DELETE FROM contacts WHERE idcontacts = $PKID";

    if ($conn->query($strDelete) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
}


?>



</html>


