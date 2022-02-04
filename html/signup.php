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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky" id="navbar">
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
                            <a href="http://pcsales.io/browse.php" class="nav-link" id="scrollElement">Browse</a>
                    </li>
                </ul>
                <a href="http://pcsales.io/signup.php" class="btn btn-info btn-sm navbar-btn my-lg-0 my-2">Sign Up</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero section Start -->
    <section class="hero-4 position-relative align-items-center justify-content-center d-flex" style="background-image: url(images/hero-4-bg1.jpg);" id="home">
        <div class="hero-4-overlay"></div>
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-7 col-md-5">
                    <div class="hero-4-content mt-md-5">
                        <h1 class="hero-4-title fw-bold">Get Updates</h1>
                        <h2 class="fw-normal mb-4">Receive emails when parts go on sale</h2>
                        <span class="title-line position-relative"></span>
                        <p class="text-muted mb-4 mt-5">
                            Choose which types of items you'd like emails for. 
                            <form name = "frmEmail" action ="signupland.php" method ="get">
                                <table width = "500" border = "0" style="font-size: 20px">
                                    <tr>
                                        <td>
                                            <input type="hidden" name="chkCPU" value="0" />
                                            <input type="hidden" name="chkGPU" value="0" />
                                            <input type="hidden" name="chkPSU" value="0" />
                                            <label><input type="checkbox" name="chkCPU" value="1"> CPUs</label><br>      
                                            <label><input type="checkbox" name="chkGPU" value="1"> Graphics Cards</label><br>      
                                            <label><input type="checkbox" name="chkPSU" value="1"> Power Supplies</label><br> 
                                        </td>
                                        <td>
                                            <input type="hidden" name="chkMOBO" value="0" />
                                            <input type="hidden" name="chkHDD" value="0" />
                                            <input type="hidden" name="chkRAM" value="0" />
                                            <label><input type="checkbox" name="chkMOBO" value="1"> Motherboards</label><br>      
                                            <label><input type="checkbox" name="chkHDD" value="1"> Hard Drives</label><br>      
                                            <label><input type="checkbox" name="chkRAM" value="1"> RAM</label><br>  
                                        </td>
                                        <td>
                                            <input type="hidden" name="chkSSD" value="0" />
                                            <input type="hidden" name="chkNVME" value="0" />
                                            <input type="hidden" name="chkMonitor" value="0" />
                                            <label><input type="checkbox" name="chkSSD" value="1"> Solid States</label><br>      
                                            <label><input type="checkbox" name="chkNVME" value="1"> NVMEs</label><br>      
                                            <label><input type="checkbox" name="chkMonitor" value="1"> Monitors</label><br>  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="chkSpeaker" value="0" />
                                            <input type="hidden" name="chkCooling" value="0" />
                                            <input type="hidden" name="chkFurniture" value="0" />
                                            <label><input type="checkbox" name="chkSpeaker" value="1"> Speakers</label><br>      
                                            <label><input type="checkbox" name="chkCooling" value="1"> Cooling</label><br>      
                                            <label><input type="checkbox" name="chkFurniture" value="1"> Furniture</label><br> 
                                        </td>
                                        <td>
                                            <input type="hidden" name="chkMouse" value="0" />
                                            <input type="hidden" name="chkKeyboard" value="0" />
                                            <input type="hidden" name="chkCables" value="0" />
                                            <label><input type="checkbox" name="chkMouse" value="1"> Mice</label><br>      
                                            <label><input type="checkbox" name="chkKeyboard" value="1"> Keyboards</label><br>      
                                            <label><input type="checkbox" name="chkCables" value="1"> Cables</label><br>  
                                        </td>
                                        <td>
                                            <input type="hidden" name="chkLaptop" value="0" />
                                            <input type="hidden" name="chkHeadphones" value="0" />
                                            <input type="hidden" name="chkNetworking" value="0" />
                                            <label><input type="checkbox" name="chkLaptop" value="1"> Laptops</label><br>      
                                            <label><input type="checkbox" name="chkHeadphones" value="1"> Headphones</label><br>      
                                            <label><input type="checkbox" name="chkNetworking" value="1"> Networking</label><br>  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="chkStorage" value="0" />
                                            <input type="hidden" name="chkCase" value="0" />
                                            <input type="hidden" name="chkBundle" value="0" />
                                            <label><input type="checkbox" name="chkStorage" value="1"> Storage</label><br>      
                                            <label><input type="checkbox" name="chkCase" value="1"> Cases</label><br>      
                                            <label><input type="checkbox" name="chkBundle" value="1"> Bundles</label><br> 
                                        </td>
                                        <td>
                                            <input type="hidden" name="chkWebcam" value="0" />
                                            <input type="hidden" name="chkMic" value="0" />
                                            <input type="hidden" name="chkConsole" value="0" />
                                            <label><input type="checkbox" name="chkWebcam" value="1"> Webcams</label><br>      
                                            <label><input type="checkbox" name="chkMic" value="1"> Microphones</label><br>      
                                            <label><input type="checkbox" name="chkConsole" value="1"> Consoles</label><br>  
                                        </td>
                                        <td>
                                            <input type="hidden" name="chkChair" value="0" />
                                            <input type="hidden" name="chkControllers" value="0" />
                                            <input type="hidden" name="chkOther" value="0" />
                                            <label><input type="checkbox" name="chkChair" value="1"> Chairs</label><br>      
                                            <label><input type="checkbox" name="chkControllers" value="1"> Controllers</label><br>      
                                            <label><input type="checkbox" name="chkOther" value="1"> Other</label><br>  
                                        </td>
                                    </tr>
                                </table>
                            
                                <br>

                                <input required type="email" name ="txtEmail" class="form-control mb-3 py-4" placeholder="Enter your email" />
                                <input type="submit" class="btn btn-info"> 
                            </form>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Hero section End -->

    

    <!-- Javascript -->   
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- unicons -->
    <script src="https://unicons.iconscout.com/release/v2.1.11/script/monochrome/bundle.js"></script>

    <!-- testi-slider -->
    <script src="js/tiny-slider.js"></script>


    <!-- app js -->
    <script src="js/app.js"></script>
</body>

</html>