@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h2>Submission Histories</h2>
    @if (session('success'))
        @component('components.alert', ['type' => 'success', 'message' => session('success')])
        @endcomponent
    @endif
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Result</th>
                    <th scope="col">Accepted / Rejected</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($histories as $history)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $history->personnel->name }}</td>
                        <td>{{ $history->created_at->format('D d M Y') }}</td>
                        <td>70%</td>
                        <td><span class="badge text-bg-success">Accepted</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Update</a>
                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="text-center">No Data</td>
                @endforelse


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
