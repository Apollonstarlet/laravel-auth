{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users')

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
    <h5 class="card-header">Users</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Avatar</th>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($data['users'] as $val)
          <tr>
            <td>
            <img width="50" height="50" src="{{ asset($val->img) }}" alt="Avatar" class="rounded-circle" />
            </td>
            <td>{{$val->email }}</td>
            <td>{{$val->firstname }} {{ $val->lastname }}</td>
            <td>{{$val->phone }}</td>
            <td>{{$val->address }}</td>
            <td><span class="badge bg-label-success me-1">{{ $val->role }}</span></td>
            <td>@if($val->status == "Active")<span class="badge bg-label-primary me-1">Active</span> @else <span class="badge bg-label-warning me-1">Deactive</span> @endif</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item edit" data-bs-toggle="modal" data-bs-target="#editUser{{ $val->id }}" ><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item del" onclick="event.preventDefault(); document.getElementById('del{{ $val->id }}').submit();" ><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                  <form id="del{{ $val->id }}" action="{{ route('userDel') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $val->id }}" />
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div>{{ $data['users']->links('vendor.pagination.custom')}}</div>
    </div>
  </div>
  <!-- Bootstrap Table with Header - Light -->
  <div class="row">
    @foreach($data['users'] as $val)
    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser{{ $val->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
            <div class="modal-body py-3 py-md-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                <h3 class="mb-2">Edit User Information</h3>
                <p class="pt-1">Updating user details will receive a privacy audit.</p>
                </div>
                <form class="row g-4" action="{{ route('profile') }}" method="POST" >
                @csrf
                <div class="col-12 col-md-6">
                    <div class="form-floating form-floating-outline">
                    <input type="hidden" name="id" value="{{ $val->id }}"/>
                    <input type="text" id="modalEditUserFirstName" name="firstname" class="form-control" @if(isset($val->firstname)) value="{{ $val->firstname }}" @else placeholder="Jack" @endif/>
                    <label for="modalEditUserFirstName">First Name</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating form-floating-outline">
                    <input type="text" id="modalEditUserLastName" name="lastname" class="form-control"
                        @if(isset($val->lastname)) value="{{ $val->lastname }}" @else placeholder="Allen" @endif />
                    <label for="modalEditUserLastName">Last Name</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating form-floating-outline">
                    <input type="text" id="modalEditUserEmail" name="email"
                        class="form-control"
                        @if(isset($val->email)) value="{{ $val->email }}" @else placeholder="example@gmail.com" @endif />
                    <label for="modalEditUserEmail">Email</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="modalEditUserPhone" name="phone" class="form-control phone-number-mask"
                        @if(isset($val->phone)) value="{{ $val->phone }}" @else placeholder="+44 5394303795" @endif />
                        <label for="modalEditUserPhone">Phone Number</label>
                    </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <input type="text" id="modalEditAddress" name="address"
                        class="form-control address" @if(isset($val->address)) value="{{ $val->address }}" @else placeholder="1419 Deberry Blvd, Florence" @endif />
                        <label for="modalEditAddress">Address</label>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline">
                    <select
                        id="modalEditUserStatus"
                        name="status"
                        class="form-select"
                        aria-label="Default select example">
                        <option value="Active" @if($val->status == "Active") selected @endif >Active</option>
                        <option value="Inactive" @if($val->status == "Inactive") selected @endif >Inactive</option>
                    </select>
                    <label for="modalEditUserStatus">Status</label>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"> Cancel </button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->
    @endforeach
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