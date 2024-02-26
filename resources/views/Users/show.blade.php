@extends('layouts.main')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Merchants</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable table-light table-sm ">
                        <thead>
                            <tr>
                                <th>Ref</th>
                                <th><b>Name</b></th>
                                <th>Email</th>
                                <th>Last Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $users as  $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                 <td>{{ $user->email }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- <a href="{{ route('users-edit', $user->id) }}" class="text-decoration-none me-2">
                                            <i class="bx bx-edit fs-4"></i>
                                        </a> -->
                                        <form action="{{ route('users-delete', $user->id) }}" method="POST" style="display: inline-block;">
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