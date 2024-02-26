@extends('layouts.main')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Transactions</h5>
                    <!-- Table with stripped rows -->
                    <div class="card mb-3">
            <div class="card-body"> 
              <!-- Vertically centered Modal -->
              <div class="d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                    Click to Search for a transaction
                </button>
              </div>
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Search transactions by date</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row mb-3">
                        <div class="col-sm-7">
                             <!-- Special title treatmen -->
                        <div class="card text-center">
                          <div class="card-header">
                          <div class="card-body">
                            <h6 class="card-title">Custom Transaction Filter</h6>
                            <form method="post" action="{{ route('transactions-custom') }}">
                            @csrf
                              <div class="row mb-2">
                              <div class="col-sm-6">
                                <label for="start_date">Start date</label>
                                <input type="date" class="form-control" name="start_date">
                              </div>
                              <div class="col-sm-6">
                                <label for="end_date">End date</label>
                                <input type="date" class="form-control" name="end_date">
                              </div>
                              <button type="submit" id="submitBtn" class="btn btn-primary mt-3">Filter Transactions</button>
                              <!-- <button type="button" class="btn btn-primary mt-3">Save changes</button><br> -->
                            <form>
                          </div>
                          </div>
                        </div><!-- End Special title treatmen -->
                        </div>        
                      </div>
                      <div class="col-sm-5">
                        <!-- Special title treatmen -->
                   <div class="card text-center">
                     <div class="card-header">
                     <div class="card-body">
                     <!-- <a href="#" class="btn btn-outline-warning mt-1">Now</a> -->
                       <a href="{{ route('transactions-today') }}" class="btn btn-outline-info mt-1 col-sm-6">Today</a>
                       <a href="{{ route('transactions-last_7_days') }}" class="btn btn-outline-info mt-1 col-sm-6">Last 7 days</a>
                       <a href="{{ route('transactions-this_month') }}" class="btn btn-outline-info mt-1 col-sm-6">This month</a>
                       <a href="{{ route('transactions-last_month') }}" class="btn btn-outline-info mt-1 col-sm-6">Last month</a>
                     </div>
                   </div><!-- End Special title treatmen -->
                   </div>        
                 </div>
                    </div>
                    <!-- <div class="modal-footer">
                    </div> -->
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->
            </div>
          </div><br>
                    <table class="table datatable table-light table-sm">
                        <thead>
                            <tr>
                                <th>Ref</th>
                                <th><b>Name</b></th>
                                <th>Account</th>
                                <th>Short Code</th>
                                <th>Suburb</th>
                                <th>City</th>
                                <th>Deposit</th>
                                <th>Commission</th>
                                <th>First Use</th>
                                <th>Last Use</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>Dev mode</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="" class="text-decoration-none me-2">
                                            <i class="bx bx-edit fs-4"></i>
                                        </a>
                                        <form action="" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="bx bx-trash fs-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

