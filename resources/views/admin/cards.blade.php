{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Cards')

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
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css')}}"/>
@endsection

{{-- page style --}}
@section('page-style')
<!-- Page CSS -->
@endsection

{{-- page content --}}
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Bootstrap Table with Header - Light -->
  <div class="card">
    <h5 class="card-header">Cards</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Serial</th>
            <th>Year</th>
            <th>Language</th>
            <th>Variant</th>
            <th>F</th>
            <th>S/C</th>
            <th>B</th>
            <th>C</th>
            <th>Overall</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
	  @foreach($data['cards'] as $card)
          <tr>
            <td>
              <strong>{{$card->cardname}}</strong>
            </td>
            <td>{{$card->serial}}</td>
            <td>{{$card->yea}}</td>
            <td><span class="badge bg-label-primary me-1">{{$card->lan}}</span></td>
            <td>
              <strong>{{$card->variant}}</strong>
            </td>
            <td>{{$card->front}}</td>
            <td>{{$card->sidecorners}}</td>
            <td>{{$card->back}}</td>
            <td>{{$card->centring}}</td>
            <td>
              <strong>{{$card->overall}}</strong>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item card-edit" id="{{$card->id}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item confirm-del" id="{{$card->id}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                </div>
              </div>
            </td>
          </tr>
	  @endforeach
        </tbody>
      </table>
      <form id="del-confirm" action="{{ route('card-del') }}" method="POST">
        @csrf
        <input type="hidden" name="id" id="id" />
      </form>
      <form id="card-edit" action="{{ route('card-edit') }}" method="POST">
        @csrf
        <input type="hidden" name="id" id="card-id" />
      </form>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->
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
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script>
/**
 * Sweet Alerts
 */

 'use strict';

(function () {
  const edit = document.querySelector('a.card-edit'),
        confirmDel = document.querySelector('a.confirm-del');

  if (edit) {
    edit.onclick = function () {
      var id = $(this).attr('id');
      $('input#card-id').val(id);
      $('form#card-edit').submit();
    };
  }

  // Alert With Functional Confirm Button
  if (confirmDel) {
    confirmDel.onclick = function () {
      var id = $(this).attr('id');
      $('input#id').val(id);
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
          cancelButton: 'btn btn-label-secondary waves-effect'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          $('form#del-confirm').submit();
        }
      });
    };
  }
})();
</script>
@endsection