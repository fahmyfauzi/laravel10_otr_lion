@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <h2>Submission List</h2>
    @if (session('success'))
        @component('components.alert', ['type' => 'success', 'message' => session('success')])
        @endcomponent
    @endif
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date Submitted</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @forelse ($histories as $history)
                    <tr>
                        <td>{{ $loop->iteration + ($histories->currentPage() - 1) * $histories->perPage() }}</td>
                        <td>{{ $history->personnel->name }}</td>
                        <td> {{ \Carbon\Carbon::parse($history->submited_at)->translatedFormat('l, d F Y') }}</td>
                        <td>
                            <span
                                class="badge text-bg-{{ $history->pic_status === 'approved' ? 'success' : ($history->pic_status === 'rejected' ? 'danger' : 'warning') }}">
                                {{ \Illuminate\Support\Str::title($history->pic_status ?? 'not yet checked') }}

                            </span>
                        </td>

                        </td>
                        <td>
                            <a href="{{ route('pic.show', $history->id) }}"
                                class="btn btn-sm btn-outline-secondary">{{ $history->pic_status ? 'View' : 'Assessment' }}</a>
                        </td>
                    </tr>

                @empty
                    <td colspan="5" class="text-center">No Data</td>
                @endforelse


            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-2 me-auto">
        {{ $histories->links() }}
    </div>
@endsection

@push('styles')
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
@endpush
