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
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

{{-- page style --}}
@section('page-style')
<!-- Page CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-statistics.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-analytics.css')}}" />
@endsection

{{-- page content --}}
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row gy-4">
    <!-- Gamification Card -->
    <div class="col-md-12 col-lg-8">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-md-6 order-2 order-md-1">
            <div class="card-body">
              <h4 class="card-title pb-xl-2">Congratulations <strong> {{$user->firstname}}!</strong>🎉</h4>
              
              <p>Check your new badge in your profile.</p>
              <a href="{{asset('setting')}}" class="btn btn-primary">View Profile</a>
            </div>
          </div>
          <div class="col-md-6 text-center text-md-end order-1 order-md-2">
            <div class="card-body pb-0 px-0 px-md-4 ps-0">
              <img
                src="{{asset('assets/img/illustrations/illustration-john-light.png')}}"
                height="180"
                alt="View Profile"
                data-app-light-img="illustrations/illustration-john-light.png"
                data-app-dark-img="illustrations/illustration-john-dark.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Gamification Card -->

    <!-- Statistics Total Order -->
    <div class="col-lg-4 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-cart-plus mdi-24px"></i>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <p class="mb-0 text-success me-1">0%</p>
              <i class="mdi mdi-chevron-up text-success"></i>
            </div>
          </div>
          <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
            <h5 class="mb-2">0</h5>
            <p class="text-muted mb-lg-2 mb-xl-3">Total Orders</p>
            <div class="badge bg-label-secondary rounded-pill">Last 4 Month</div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Total Order -->
  </div>
</div>
<!-- / Content -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection