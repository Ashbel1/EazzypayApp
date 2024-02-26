@extends('layouts.main')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Devices</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable table-light table-sm">
                        <thead>
                            <tr>
                                <th><b>Name</b></th>
                                <th>Imei</th>
                                <th>Status</th>
                                <th>Serial Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->imei }}</td>
                                <td>{{ $device->status }}</td>
                                <td>{{ $device->serial_number }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('devices-edit', $device->id) }}" class="text-decoration-none me-2">
                                            <i class="bx bx-edit fs-4"></i>
                                        </a>
                                        <form action="{{ route('devices-delete', $device->id) }}" method="POST" style="display: inline-block;">
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