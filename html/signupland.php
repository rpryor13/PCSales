<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Signup for great deals on PC parts!</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Themesdesign" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky" id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                    <img src="images/logo-light.png" alt="" class="logo-light" height="20" />
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
                            <a href="http://pcsales.io/browse.php" class="nav-link" id="scrollElement">Browse</a>
                    </li>
                </ul>
                <a href="http://pcsales.io/signup.html" class="btn btn-info btn-sm navbar-btn my-lg-0 my-2">Sign Up</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<?php

function relax() {
    ;
}

$strEmail = $_GET['txtEmail'];
$chkCPU = $_GET['chkCPU'];
$chkGPU = $_GET['chkGPU'];
$chkPSU = $_GET['chkPSU'];
$chkMOBO = $_GET['chkMOBO'];
$chkHDD = $_GET['chkHDD'];
$chkRAM = $_GET['chkRAM'];
$chkSSD = $_GET['chkSSD'];
$chkNVME = $_GET['chkNVME'];
$chkMonitor = $_GET['chkMonitor'];
$chkSpeaker = $_GET['chkSpeaker'];
$chkCooling = $_GET['chkCooling'];
$chkFurniture = $_GET['chkFurniture'];
$chkMouse = $_GET['chkMouse'];
$chkKeyboard = $_GET['chkKeyboard'];
$chkCables = $_GET['chkCables'];
$chkLaptop = $_GET['chkLaptop'];
$chkHeadphones = $_GET['chkHeadphones'];
$chkNetworking = $_GET['chkNetworking'];
$chkStorage = $_GET['chkStorage'];
$chkCase = $_GET['chkCase'];
$chkBundle = $_GET['chkBundle'];
$chkWebcam = $_GET['chkWebcam'];
$chkMic = $_GET['chkMic'];
$chkConsole = $_GET['chkConsole'];
$chkChair = $_GET['chkChair'];
$chkControllers = $_GET['chkControllers'];
$chkOther = $_GET['chkOther'];

?>

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
                            <h1 class="hero-1-title display-4 text-white mb-4">Thank you for signing up for our email notifications.</h1>

                            <p class="mb-4">You should receive an email at <?php echo $strEmail; ?> shortly to confirm your signup.</p>

                            <div class="pt-2">
                                <a href="http://pcsales.io/index.html" class="btn btn-light mr-2">Return to Home</a>
                            </div>

                            <div class="home-img mt-5">
                                <img src="images/home-img.png" alt="" class="img-fluid mx-auto d-block" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
$servername = "database-1.ce7u2riqktl4.us-east-2.rds.amazonaws.com";
$username = "rpryor13";
$password = "Polopolo#3";
$dbname = "default";


$dtmdatetime = date('Y-m-d H:i:s');

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$PKID = NULL;
$strSelect = "SELECT idcontacts FROM contacts WHERE strEmail = '$strEmail'";

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
        relax();
      } else {
        relax();
      }
}


$strInsert = "INSERT INTO contacts (dtmDatetime, strEmail, intCPU, intGPU, intPSU, intMOBO, intRAM, intSSD, intNVME, intMonitor, intSpeaker, intCooling, intFurniture, intMouse, intKeyboard, intCables, intLaptop, intHeadphones, intNetworking, intStorage, intCase, intBundle, intWebcam, intMic, intConsole, intChair, intControllers, intOther, intStatus)
                VALUES ('$dtmdatetime', '$strEmail', $chkCPU, $chkGPU, $chkPSU, $chkMOBO, $chkRAM, $chkSSD, $chkNVME, $chkMonitor, $chkSpeaker, $chkCooling, $chkFurniture, $chkMouse, $chkKeyboard, $chkCables, $chkLaptop, $chkHeadphones, $chkNetworking, $chkStorage, $chkCase, $chkBundle, $chkWebcam, $chkMic, $chkConsole, $chkChair, $chkControllers, $chkOther, 0)";




if (mysqli_query($conn, $strInsert)) {
    relax(); 
} else {
    relax();
}

?>
