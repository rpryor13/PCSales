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
                            <a href="http://pcsales.io/browse.php" class="nav-link" id="scrollElement">Browse</a>
                        </li>
                    </ul>
                    <a href="http://pcsales.io/signup.php" class="btn btn-info btn-sm navbar-btn my-lg-0 my-2">Sign Up</a>
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
                            <h1 class="hero-1-title display-4 text-white mb-4">Enter your email to be removed from the mailing list.</h1>
                            <form name = "frmRemove" action ="removeland.php" method ="get">
                                <input type="email" name ="txtEmail" class="form-control mb-3 py-4" placeholder="Enter your email" />
                                <input type="submit" class="btn btn-info"> 
                            </form>  
                            <br>
                            <br>
                            <p class="mb-4">If you'd like to modify your current subscription, simply head back to the sign up page and resubmit your info. We will automatically update your database with your new choices and remove your old ones!</p>
                            <div class="home-img mt-5">
                                <img src="images/home-img.png" alt="" class="img-fluid mx-auto d-block" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
