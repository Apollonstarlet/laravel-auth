{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Update Card')

{{-- vendor styles --}}
@section('vendor-style')
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

@endsection

{{-- page style --}}
@section('page-style')
<!-- Page CSS -->
<style type="text/css">
  .w-px-215 {
      width: 215px !important;
  } 
  .h-px-302 {
      height: 302px !important;
  } 
</style>
@endsection

{{-- page content --}}
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
        <!-- Pokemon Card -->
        <div class="card-body pt-2 mt-1">
            <form class="browser-default-validation" action="{{ route('card-update') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <input type="hidden" name="id" value="{{$data['card']->id}}" />
            <div class="row mt-2 gy-4">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{$data['card']->img}}" alt="card_img" class="d-block w-px-215 h-px-302 rounded" id="card_img" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                        <a id="select-avatar" class="d-none d-sm-block">Upload new photo</a>
                        <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" style="display: none;" accept="image/png, image/jpeg" name="image" value="{{$data['card']->img}}" onchange="loadFile(event)" />
                        </label>
                        <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="cardname" name="cardname" value="{{$data['card']->cardname}}" required />
                        <label for="cardname">Card Name</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="serial" id="serial" value="{{$data['card']->serial}}" required />
                        <label for="serial">Serial</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="yea" id="year" value="{{$data['card']->yea}}" required />
                        <label for="year">Year</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <select name="lan" id="language" class="select2 form-select" required >
                                <option value="">Select Language</option>
                                <option @if($data['card']->lan == "English") selected @endif value="English">English</option>
                                <option @if($data['card']->lan == "Japanese") selected @endif value="Japanese">Japanese</option>
                                <option @if($data['card']->lan == "Chinese") selected @endif value="Chinese">Chinese</option>
                                <option @if($data['card']->lan == "Korean") selected @endif value="Korean">Korean</option>
                        </select>
                        <label for="language">Language</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="variant" id="variant" value="{{$data['card']->variant}}" required />
                        <label for="variant">Variant</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="front" id="front" value="{{$data['card']->front}}" required />
                        <label for="front">Front</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="sidecorners" id="sidecorners" value="{{$data['card']->sidecorners}}" required />
                        <label for="sidecorners">Sidecorners</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="back" id="back" value="{{$data['card']->back}}" required />
                        <label for="back">Back</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="centring" id="centring" value="{{$data['card']->centring}}" required />
                        <label for="centring">Centring</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="overall" id="overall" value="{{$data['card']->overall}}" required />
                        <label for="overall">Overall</label>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" id="update" class="btn btn-primary me-2">Update Card
                </button>
            </div>
            </form>
        </div>
        <!-- /Account -->
        </div>
    </div>
    </div>
</div>
<!-- / Content -->

@endsection

{{-- vendor scripts --}}
@section('vendor-script')
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

    $('select#language').val('English');
    // upload button converting into file button
    $("a#select-avatar").on("click", function () {
      $("#upfile").click();
    });

    $("button#update").on("click", function () {
      var html = $(this).html();
      if($('input#cardname').val().length === 0 || $('input#serial').val().length === 0 || $('input#year').val().length === 0 || $('input#variant').val().length === 0 || $('input#front').val().length === 0 || $('input#sidecorners').val().length === 0 || $('input#back').val().length === 0 || $('input#centring').val().length === 0 || $('input#overall').val().length === 0 || $('select#language').val().length === 0){
        console.log('validation error');
      } else{
        $(this).html(html +' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>');
      }
      
    });
  });
</script>
@endsection

{{-- page scripts --}}
@section('page-script')

@endsection