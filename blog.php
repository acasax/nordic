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
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
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
                        <h3>blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-12 mb-lg-12">
                    <div class="blog_left_sidebar">

                        <?php
                        $query = "SELECT * FROM `blog`";
                        $stmt = $db->prepare($query);
                        $stmt->execute();

                        $result = $stmt->fetchAll();
                        $data = array();
                        foreach ($result as $row) {
                            $img = "admin/php_assets/blog_functions/image/" . $row["image_name"];

                            echo '<article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="' . $img . '" alt="">
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?var=' . $row["id"] . '">
                                    <h2>"' .$row["title"].'"</h2>
                                </a>
                            </div>
                        </article>';
                        }

                        ?>

                        <!--<nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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

    <!-- link that opens popup -->
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

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>