 {{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Home')

{{-- vendor styles --}}
@section('vendor-style')
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
  <div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <div class="mdi mdi-account-outline mdi-24px"></div>
              </div>
            </div>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">8,458</h5>
                <div class="mdi mdi-chevron-down text-danger mdi-24px"></div>
                <small class="text-danger">8.1%</small>
              </div>
              <small class="text-muted">New Customers</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar">
              <div class="avatar-initial bg-label-warning rounded">
                <div class="mdi mdi-poll mdi-24px"></div>
              </div>
            </div>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">$28.5K</h5>
                <div class="mdi mdi-chevron-up text-success mdi-24px"></div>
                <small class="text-success">18.2%</small>
              </div>
              <small class="text-muted">Total Profit</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar">
              <div class="avatar-initial bg-label-info rounded">
                <div class="mdi mdi-trending-up mdi-24px"></div>
              </div>
            </div>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">2,450K</h5>
                <div class="mdi mdi-chevron-down text-danger mdi-24px"></div>
                <small class="text-danger">24.6%</small>
              </div>
              <small class="text-muted">New Transaction</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar">
              <div class="avatar-initial bg-label-success rounded">
                <div class="mdi mdi-currency-usd mdi-24px"></div>
              </div>
            </div>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h5 class="mb-0">$48.2K</h5>
                <div class="mdi mdi-chevron-down text-success mdi-24px"></div>
                <small class="text-success">22.5%</small>
              </div>
              <small class="text-muted">Total Revenue</small>
            </div>
          </div>
        </div>
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
@endsection

{{-- page scripts --}}
@section('page-script')

@endsection