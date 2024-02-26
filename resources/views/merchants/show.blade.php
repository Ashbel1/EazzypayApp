@extends('layouts.main')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Merchants</h5>
                    <!-- Table with stripped rows -->
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
                            @foreach($merchants as $merchant)
                            <tr>
                                <td>{{ $merchant->id }}</td>
                                <td>{{ $merchant->name }}</td>
                                 <td>{{ $merchant->account }}</td>
                                <td>{{ $merchant->short_code }}</td>
                                <td>{{ $merchant->suburb }}</td>
                                <td>{{ $merchant->city }}</td>
                                <td>{{ $merchant->deposit }}</td>
                                <td>{{ $merchant->commission }}</td>
                                <td>{{ $merchant->first_use }}</td>
                                <td>{{ $merchant->last_use }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('merchants-edit', $merchant->id) }}" class="text-decoration-none me-2">
                                            <i class="bx bx-edit fs-4"></i>
                                        </a>
                                        <form action="{{ route('merchants-delete', $merchant->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="bx bx-trash fs-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection