@extends('layouts.main')
@section('content')
<div class="card"> 
  <div class="card-body">
    <h5 class="card-title">Merchant Information</h5>
    @if(session('success'))
    <div id="success-alert" class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div id="error-alert" class="alert alert-warning">
      {{ session('error') }}
    </div>
    @endif
    <form class="row g-3" action="{{route('merchants-update',$merchant->id)}}" method="POST">
        @csrf
        @method('PUT')
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" name="name" value="{{ $merchant->name ?? '' }}" id="floatingPassword" placeholder="Merchant Name">
          <label for="floatingPassword">Merchant Name</label>
        </div>
      </div>
  <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select custom-input-height" name="supervisor_id" id="floatingSupervisor">
                        <option value="" selected disabled>Supervisor</option>
                        <option value="1">Ashbel</option>
                        <option value="2">Tsomaz</option>
                        <option value="3">Mr Masemo</option>
                    </select>
                    <label for="floatingSupervisor">Supervisor</label>
                </div>
            </div>
  <div class="col-md-6">
      <div class="form-floating">
        <select class="form-select custom-input-height" name="type" id="floatingCOS">
          <option value="" selected disabled>Merchant Type</option>
          <option value="Chicken Inn">Chicken Inn</option>
          <option value="Petroleum">Petroleum</option>
          <option value="Fbc">Fbc</option>
        </select>
      </div>
    </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tax_clearance" value="{{ $merchant->tax_clearance ?? '' }}" id="floatingStreet" placeholder="City">
                <label for="tax_clearance">Tax Clearance</label>
            </div>
          </div>
        </div>
      
        <div class="col-md-6">
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="commission" value="{{ $merchant->commission ?? '' }}" id="floatingStreet" placeholder="Street">
                <label for="commission">Merchant Service Fee In %</label>
            </div>
          </div>
        </div>
    <div class="col-md-6">
      <div class="form-floating">
        <select class="form-select custom-input-height" name="agent_class_of_service_id" id="floatingCOS">
          <option value="" selected disabled>Class Of Service</option>
          <option value="2">Service A</option>
          <option value="1">Service B</option>
          <option value="3">Service C</option>
        </select>
      </div>
    </div>
      <div class="col-md-6">
      <div class="form-floating">
        <select class="form-select custom-input-height" name="logo" id="floatingLogo">
          <option value="" selected disabled>Pos Display Logo</option>
          <option value="Logo A">Logo A</option>
          <option value="Logo B">Logo B</option>
          <option value="Logo C">Logo C</option>
        </select>
        <!-- <label for="floatingLogo">Pos Display Logo</label> -->
      </div>
      </div>
      <h6 style="text-align: center; font-weight: bold;">Address</h6>

      <div class="col-md-6">
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="street" value="{{ $merchant->street ?? '' }}" id="floatingStreet" placeholder="Street">
                <label for="street">Street</label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="suburb" value="{{ $merchant->suburb ?? '' }}" id="floatingStreet" placeholder="Suburb">
                <label for="suburb">Suburb</label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="city" value="{{ $merchant->city ?? '' }}" id="floatingStreet" placeholder="City">
                <label for="city">City</label>
            </div>
          </div>
        </div>
  </div>
 </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Primary Contact Information</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="firstname" value="{{ $merchant->firstname ?? '' }}" placeholder="First Name">
            <label for="firstname">First Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" value="{{ $merchant->lastname ?? '' }}" name="lastname" placeholder="Last Name">
            <label for="lastname">Surname</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" value="{{ $merchant->cellphone ?? '' }}" name="cellphone" placeholder="Your IMEI">
            <label for="cellphone">Cellphone</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="number" class="form-control custom-input-height" value="{{ $merchant->landline ?? '' }}" name="landline" placeholder="Landline">
            <label for="landline">Landline</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="email" class="form-control custom-input-height" value="{{ $merchant->email ?? '' }}" name="email" placeholder="Email">
            <label for="email">Email</label>
          </div>
        </div>
        <!-- Rest of the fields for the first card -->
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Bank Account Information</h5>
      <div class="row g-3">
      <div class="col-md-6">
      <div class="form-floating">
        <select class="form-control custom-input-height" name="bank_name" id="bank_name">
        <option value="">Select Bank</option>
          <option value="CBZ">CBZ</option>
          <option value="NMB">NMB</option>
          <option value="FBC">FBC</option>
          <option value="POSB">POSB</option>
          <option value="ZB BANK">ZB BANK</option>
          <option value="FIRST CAPITAL">FIRST CAPITAL</option>
        </select>
      </div>
    </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="bank_account_name" value="{{ $merchant->bank_account_name ?? '' }}" placeholder="Account Name">
            <label for="bank_account_name">Account Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="bank_branch_code" value="{{ $merchant->bank_branch_code ?? '' }}" placeholder="Branch Code">
            <label for="bank_branch_code">Branch Code</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="bank_account" value="{{ $merchant->bank_account ?? '' }}" placeholder="Bank Account">
            <label for="bank_account">Account Number</label>
          </div>
        </div>
        <!-- Rest of the fields for the second card -->
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">1.) Director Information</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_full_name_1" value="{{ $merchant->director_full_name_1 ?? '' }}" placeholder="Full Name">
            <label for="director_full_name_1">Full Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_id_number_1" value="{{ $merchant->director_id_number_1 ?? '' }}" placeholder="National ID">
            <label for="director_id_number_1">National ID</label>
          </div>
        </div>
        <!-- Rest of the fields for the third card -->
      </div>
      <h5 class="card-title">2.) Director Information</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_full_name_2" value="{{ $merchant->director_full_name_2 ?? '' }}" placeholder="Full Name">
            <label for="director_full_name_2">Full Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_id_number_2" value="{{ $merchant->director_id_number_2 ?? '' }}" placeholder="Your IMEI">
            <label for="director_id_number_2">National ID</label>
          </div>
        </div>
        <!-- Rest of the fields for the third card -->
      </div>

      <h5 class="card-title">3.) Director Information</h5>
      <div class="row g-3">

        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_full_name_3" value="{{ $merchant->director_full_name_3 ?? '' }}" placeholder="Your IMEI">
            <label for="director_full_name_3">Full Name</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_id_number_3" value="{{ $merchant->director_id_number_3 ?? '' }}" placeholder="Your IMEI">
            <label for="3">National ID</label>
          </div>
        </div>
        
        <!-- Rest of the fields for the third card -->
      </div>
      <h5 class="card-title">4.) Director Information</h5>
      <div class="row g-3">

        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_full_name_4" value="{{ $merchant->director_full_name_4 ?? '' }}" placeholder="Your IMEI">
            <label for="director_full_name_4">Full Name</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control custom-input-height" name="director_id_number_4" value="{{ $merchant->director_id_number_4 ?? '' }}" placeholder="Your IMEI">
            <label for="director_id_number_4">National ID</label>
          </div>
        </div>
        
        <!-- Rest of the fields for the third card -->
      </div>
    </div>
  </div>

  <div class="text-center">
        <button type="submit" id="submitBtn" class="btn btn-primary">Save</button>
 </div>
</form>

@endsection

