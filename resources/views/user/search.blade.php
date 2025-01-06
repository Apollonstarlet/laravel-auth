<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pokemon Card Grading</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .w-px-215 {
            width: 215px !important;
        } 
        .h-px-302 {
            height: 302px !important;
        } 
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0">PCG</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="cert" class="nav-item nav-link active">Search</a>
                    <a href="addpage" class="nav-item nav-link">Add Card</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary mb-5 hero-header">
            <div class="container" style="padding-top: 0.7rem !important; padding-bottom: 0.7rem !important;">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Pokemon Card Grading</h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">The US's Specialist Card Grading Service</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input id="cert" class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: 2457">
                            <button type="button" id="search" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div id="loading" class="container" style="text-align: center; display: none;">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div id="result" class="container" style="display: none;">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img src="{{asset('assets/img/pokemon.png')}}" alt="card_img" class="w-px-215 h-px-302" id="card_img" />
                </div>
                <div class="col-lg-9 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-4">
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5 id="cardname">Shining Gyarados #65</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>SERIAL</h5>
                                    <p id="serial">2457</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>YEAR</h5>
                                    <p id="year">2001</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>LANGUAGE</h5>
                                    <p id="lan">English</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>VARIANT</h5>
                                    <p id="variant">Rara</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>FRONT</h5>
                                    <p id="front">9</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>SIDES/CORNERS</h5>
                                    <p id="sides">8</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>BACK</h5>
                                    <p id="back">9</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5>CENTRING</h5>
                                    <p id="centring">8</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.9s">
                            <div class="service-item rounded pt-2">
                                <div class="p-3">
                                    <h5 id="overall">OVERALL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="service" class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-5">PINNACLE GRADING</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>Submit a Card</h5>
                            <p>Submit your sports cards and collectibles today! Learn how our process works and download our submission form.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                            <h5>Collectors Blog</h5>
                            <p>Visit our Collector's Blog for the latest hobby news & detailed information on how to spot counterfeit items.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            <h5>Grading Scale</h5>
                            <p>Preserve your collection with the world-leading authentication service with great eye appeal and protection.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; 2025, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="/">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
        "use strict";
            var main, currenturl = window.location.href,
                url_array = currenturl.split('/'),
                url = url_array[0] + '//' + url_array[2];

            $("input#cert").on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    search();
                }
            });
            $("button#search").click(function(){
                search();
            });
            function search() {
                var cert = $("input#cert").val();
                $('div#loading').css("display", "");
                $('div#service').css("display", "none");
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
                $.ajax({ url:url+"/search", data:{ serial: cert }, type:'post',
                success: function(result){
                    console.log(result['card']);
                    if(result['isset'] == "yes"){
                        $('div#loading').css("display", "none");
                        $("div#result").css("display", "");
                        $("img#card_img").attr("src", result['card'][0]['img']);
                        $('h5#cardname').html(result['card'][0]['cardname']);
                        $('p#serial').html(result['card'][0]['serial']);
                        $('p#year').html(result['card'][0]['yea']);
                        $('p#lan').html(result['card'][0]['lan']);
                        $('p#variant').html(result['card'][0]['variant']);
                        $('p#front').html(result['card'][0]['front']);
                        $('p#sides').html(result['card'][0]['sidescorners']);
                        $('p#back').html(result['card'][0]['back']);
                        $('p#centring').html(result['card'][0]['centring']);
                        $('h5#overall').html("OVERALL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ result['card'][0]['overall']);
                    } else{
                        var text = "<h5>No Data! Please try again with Other value.</h5><div style='height: 12vh;'></div>";
                        $("div#result").css("display", "none");
                        $('div#service').css("display", "none");
                        $('div#loading').html(text);
                    } 
                },
                error: function(result){
                    console.log(result);
                }
                });
            }
        });
    </script>
</body>

</html>