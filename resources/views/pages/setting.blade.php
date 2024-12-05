{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Home')

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
@endsection

{{-- page content --}}
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('security') }}"><i class="mdi mdi-lock-open-outline mdi-20px me-1"></i>Security</a>
        </li>
        </ul>
        <div class="card mb-4">
        <h4 class="card-header">Profile Details</h4>
        <!-- Account -->
        <div class="card-body pt-2 mt-1">
            <form action="{{ route('profile') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}"/>
            <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{asset($user->img)}}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="profile-avatar" />
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                <a id="select-avatar" class="d-none d-sm-block">Upload new photo</a>
                <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" style="display: none;" accept="image/png, image/jpeg" name="image" onchange="loadFile(event)"/>
                </label>
                <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>
            </div>
            <div class="row mt-2 gy-4">
                <div class="col-md-4">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" id="firstName" name="firstname" value="{{$user->firstname}}" autofocus />
                        <label for="firstName">First Name</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating form-floating-outline">
                        <input class="form-control" type="text" name="lastname" id="lastName" value="{{$user->lastname}}" />
                        <label for="lastName">Last Name</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                        <input type="text" id="phoneNumber" name="phone" class="form-control" @if(isset($user->phone)) value="{{$user->phone}}" @else placeholder="202 555 0111" @endif />
                        <label for="phoneNumber">Phone Number</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating form-floating-outline">
                        <input type="text" class="form-control" id="address" name="address" @if(isset($user->address)) value="{{$user->address}}" @else placeholder="address" @endif />
                        <label for="address">Address</label>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /Account -->
        </div>
        <!-- <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
                <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check mb-3">
                <input
                class="form-check-input"
                type="checkbox"
                name="accountActivation"
                id="accountActivation" />
                <label class="form-check-label" for="accountActivation"
                >I confirm my account deactivation</label
                >
            </div>
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
        </div>
        </div> -->
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
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-security.js')}}"></script>
<script>
  var loadFile = function(event) {
    var image = document.getElementById('profile-avatar');
    image.src = URL.createObjectURL(event.target.files[0]);
  };

  $(document).ready(function () {
    // upload button converting into file button
    $("a#select-avatar").on("click", function () {
      $("#upfile").click();
    })
  });
</script>
@endsection