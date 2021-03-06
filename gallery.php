<!doctype html>
<html class="no-js" lang="zxx">
<?php include "admin/connection.php" ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nordic Bar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <h1 style="color: azure;">NORDIC</h1>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu  d-none d-lg-block text-center">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">home</a></li>
                                        <li><a class="active" href="gallery.php">gallery</a></li>
                                        <li><a href="blog.php">blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Gallery</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <div class="container" style="margin: 50px auto">
        <div class="row">

            <div class="row">

                <?php
                    $query = "SELECT * FROM `gallery`";
                    $stmt = $db->prepare($query);
                    $stmt->execute();

                    $result = $stmt->fetchAll();
                    $data = array();
                    foreach ($result as $row) {
                        $img = "admin/php_assets/gallery_function/image/" . $row["name"];
                        echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="'.$row["title"].'" data-image="'.$img.'" data-target="#image-gallery">
                                    <img class="img-thumbnail" src="'.$img.'" alt="Another alt text">
                                </a>
                              </div>';
                    }

                ?>

            </div>

            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================ contact section end ================= -->

    <!-- footer start -->
    <footer class="footer ">
        <div class="footer_top ">
            <div class="container ">
                <div class="row align-items-center ">
                    <div class="col-lg-2 col-md-3 ">
                        <div class="footer_logo wow fadeInRight " data-wow-duration="1s " data-wow-delay=".3s ">
                            <a href="index.html ">
                                <h3 style="color: azure;">NORDIC</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9 ">
                        <div class="menu_links ">
                            <ul>
                                <li><a class="wow fadeInDown " data-wow-duration="1s " data-wow-delay=".2s " href="index.html">Home</a></li>
                                <li><a class="wow fadeInDown " data-wow-duration="1s " data-wow-delay="1s " href="blog.php ">Blog</a></li>
                                <li><a class="wow fadeInDown " data-wow-duration="1s " data-wow-delay="1s " href="gallery.php">Gallery</a></li>
                                <li><a class="wow fadeInDown " data-wow-duration="1s " data-wow-delay="1.1s " href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 ">
                        <div class="socail_links ">
                            <ul>
                                <li>
                                    <a class="wow fadeInUp " data-wow-duration="1s " data-wow-delay=".3s " href="# "> <i class="fa fa-facebook "></i> </a>
                                </li>
                                <li>
                                    <a class="wow fadeInUp " data-wow-duration="1s " data-wow-delay=".4s " href="# "> <i class="fa fa-twitter "></i> </a>
                                </li>
                                <li>
                                    <a class="wow fadeInUp " data-wow-duration="1s " data-wow-delay=".5s " href="# "> <i class="fa fa-instagram "></i> </a>
                                </li>
                                <li>
                                    <a class="wow fadeInUp " data-wow-duration="1s " data-wow-delay=".6s " href="# "> <i class="fa fa-google-plus "></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text ">
            <div class="container ">
                <div class="footer_border "></div>
                <div class="row ">
                    <div class="col-xl-12 ">
                        <p class="copy_right text-center wow fadeInUp " data-wow-duration="1s " data-wow-delay="1.3s ">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o " aria-hidden="true "></i> by <a href="https://resivoje.com " target="_blank ">Resivoje</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/gallery.js"></script>
    <!--contact js-->
    <script src="js/contact.js">
    </script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>