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

        @if($errors->any())
        <div id="error-alert" class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="row g-3" action="{{ route('merchants-store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="floatingName" placeholder="Merchant Name" value="{{ old('name') }}" required>
                    <label for="floatingName">Merchant Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="street" id="floatingStreet" placeholder="Street" value="{{ old('street') }}" required>
                    <label for="floatingStreet">Street</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="suburb" id="floatingSuburb" placeholder="Suburb" value="{{ old('suburb') }}" required>
                    <label for="floatingSuburb">Suburb</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="city" id="floatingCity" placeholder="City" value="{{ old('city') }}" required>
                    <label for="floatingCity">City</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select custom-input-height" name="supervisor_id" id="floatingSupervisor" required>
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
                    <select class="form-select custom-input-height" name="type" id="floatingType" required>
                        <option value="" selected disabled>Merchant Type</option>
                        <option value="Chicken Inn">Chicken Inn</option>
                        <option value="Petroleum">Petroleum</option>
                        <option value="Fbc">Fbc</option>
                    </select>
                    <label for="floatingType">Merchant Type</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="tax_clearance" id="floatingTaxClearance" placeholder="Tax Clearance" value="{{ old('tax_clearance') }}" required>
                    <label for="floatingTaxClearance">Tax Clearance</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="number" class="form-control" name="commission" id="floatingCommission" placeholder="Merchant Service Fee In %" value="{{ old('commission') }}" required>
                    <label for="floatingCommission">Merchant Service Fee In %</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select custom-input-height" name="agent_class_of_service_id" id="floatingCOS" required>
                        <option value="" selected disabled>Class Of Service</option>
                        <option value="2">Service A</option>
                        <option value="1">Service B</option>
                        <option value="3">Service C</option>
                    </select>
                    <label for="floatingCOS">Class Of Service</label>
                </div>
            </div>
            <div class="col-md-6">
    <div class="form-floating">
        <select class="form-select" name="logo" id="floatingLogo" placeholder="Pos Display Logo" required>
            <option value="" selected disabled>Select an option</option>
            <option value="option1" {{ old('logo') == 'option1' ? 'selected' : '' }}>Logo  A</option>
            <option value="option2" {{ old('logo') == 'option2' ? 'selected' : '' }}>Logo  B</option>
            <option value="option3" {{ old('logo') == 'option3' ? 'selected' : '' }}>Logo  C</option>
            <!-- Add more options as needed -->
        </select>
        <label for="floatingLogo">Pos Display Logo</label>
    </div>
</div>
            <div class="col-12">
                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection