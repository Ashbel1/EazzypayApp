@extends('layouts.main')
@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title"> <span><i class="bx bx-user"></i> </span> User Information</h5>
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
    <form class="row g-3" action="{{ route('users-store') }}" method="POST">
      @csrf
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control custom-input-height" name="name" id="floatingEmail" placeholder="Name">
          <label for="name">First name</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" name="lastname" id="floatingPassword" placeholder="Last Name">
          <label for="lastname">Last Name</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="email" class="form-control" name="email" id="floatingSerialNumber" placeholder="Email">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingSerialNumber" placeholder="Email">
          <label for="password">Password</label>
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