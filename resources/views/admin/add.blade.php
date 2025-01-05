<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template">
<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>{{env('APP_NAME')}} | Add Card</title>

  <meta name="description" content="PCG" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/fonts/materialdesignicons.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

  <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css')}}"/>

  <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

  <style type="text/css">
    .w-px-215 {
        width: 215px !important;
    } 
    .h-px-302 {
        height: 302px !important;
    } 
  </style>
  <!-- Helpers -->
  <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
</head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
    <!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ asset('/') }}" class="app-brand-link">
    <span class="app-brand-logo demo">
      <span style="color: var(--bs-primary)">
        <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
            fill="currentColor" />
          <path
            d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
            fill="url(#paint0_linear_2989_100980)"
            fill-opacity="0.4" />
          <path
            d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
            fill="currentColor" />
          <path
            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
            fill="currentColor" />
          <path
            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
            fill="url(#paint1_linear_2989_100980)"
            fill-opacity="0.4" />
          <path
            d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
            fill="currentColor" />
          <defs>
            <linearGradient
              id="paint0_linear_2989_100980"
              x1="5.36642"
              y1="0.849138"
              x2="10.532"
              y2="24.104"
              gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-opacity="1" />
              <stop offset="1" stop-opacity="0" />
            </linearGradient>
            <linearGradient
              id="paint1_linear_2989_100980"
              x1="5.19475"
              y1="0.849139"
              x2="10.3357"
              y2="24.1155"
              gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-opacity="1" />
              <stop offset="1" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </span>
    </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">PCG</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
          fill="currentColor"
          fill-opacity="0.6" />
        <path
          d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
          fill="currentColor"
          fill-opacity="0.38" />
      </svg>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item active">
      <a href="add" class="menu-link">
        <i class="menu-icon tf-icons mdi mdi-view-grid-outline"></i>
        <div>Add Card</div>
      </a>
    </li>  
  </ul>
</aside>
<!-- / Menu -->

  <!-- Layout container -->
  <div class="layout-page">
	<!-- Navbar -->
	  <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="/">
                <i class="mdi mdi-menu mdi-24px"></i>
              </a>
            </div>

          </nav>

        <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper">
        
        <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
        <!-- Pokemon Card -->
        <div class="card-body pt-2 mt-1">
            <form class="browser-default-validation" action="{{ route('add') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <div class="row mt-2 gy-4">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{asset('assets/img/pokemon.png')}}" alt="card_img" class="d-block w-px-215 h-px-302 rounded" id="card_img" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                        <a id="select-avatar" class="d-none d-sm-block">Upload new photo</a>
                        <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" style="display: none;" accept="image/png, image/jpeg" name="image" onchange="loadFile(event)" />
                        </label>
                        <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="cardname" name="cardname" autofocus required />
                        <label for="cardname">Card Name</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="serial" id="serial" required />
                        <label for="serial">Serial</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="yea" id="year" required />
                        <label for="year">Year</label>
                    </div>
                </div>
		<div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <select name="lan" id="language" class="select2 form-select" required >
                                <option value="">Select Language</option>
                                <option value="English">English</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Korean">Korean</option>
                         </select>
                         <label for="language">Language</label>
                     </div>
                 </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="variant" id="variant" required />
                        <label for="variant">Variant</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="front" id="front" required />
                        <label for="front">Front</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="sidecorners" id="sidecorners" required />
                        <label for="sidecorners">Sidecorners</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="back" id="back" required />
                        <label for="back">Back</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="centring" id="centring" required />
                        <label for="centring">Centring</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="overall" id="overall" required />
                        <label for="overall">Overall</label>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Add Card</button>
            </div>
            </form>
        </div>
        <!-- /Account -->
        </div>
    </div>
    </div>
</div>
<!-- / Content -->

        <!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
      
    </div>
  </div>
</footer>
<!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

  <!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>

<script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

<script src="{{asset('assets/vendor/js/menu.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/js/pages-account-settings-security.js')}}"></script>
<script>
  var loadFile = function(event) {
    var image = document.getElementById('card_img');
    image.src = URL.createObjectURL(event.target.files[0]);
  };

  $(document).ready(function () {
    // upload button converting into file button
    $("a#select-avatar").on("click", function () {
      $("#upfile").click();
    })
  });
</script>
</body>

</html>