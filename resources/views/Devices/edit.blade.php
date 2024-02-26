@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Pos Terminal Information</h5>
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

    <form class="row g-3" action="{{ route('devices-update', $device->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control custom-input-height" name="imei" id="floatingEmail" placeholder="Your IMEI" value="{{ $device->imei }}">
          <label for="floatingEmail">IMEI</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" name="name" id="floatingPassword" placeholder="Password" value="{{ $device->name }}">
          <label for="floatingPassword">Name</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="number" class="form-control" name="serial_number" id="floatingSerialNumber" placeholder="Your Device Serial Number" value="{{ $device->serial_number }}">
          <label for="floatingSerialNumber">Device Serial Number</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <select class="form-control" name="status" id="floatingStatus">
            <option value="pending" {{ $device->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="active" {{ $device->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="blocked" {{ $device->status == 'blocked' ? 'selected' : '' }}>Blocked</option>
          </select>
          <label for="floatingStatus">Status</label>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
      </div>
    </form><!-- End floating Labels Form -->
  </div>
</div>

<script>
  setTimeout(function() {
    document.getElementById("success-alert").style.display = "none";
    document.getElementById("error-alert").style.display = "none";
  }, 2000);
</script>
@endsection