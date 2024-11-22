@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h2>Submission Histories</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Result</th>
                    <th scope="col">Accepted / Rejected</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Senin 12 Januari 2024</td>
                    <td>70%</td>
                    <td><span class="badge text-bg-success">Accepted</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Update</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Senin 12 Januari 2024</td>
                    <td>50%</td>
                    <td><span class="badge text-bg-danger">Rejected</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Update</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Senin 12 Januari 2024</td>
                    <td>-</td>
                    <td><span class="badge text-bg-warning">Pending</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Update</a>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
@endsection

@push('styles')
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
@endpush
