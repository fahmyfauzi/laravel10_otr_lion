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
                    <th scope="col">Date Submitted</th>
                    <th scope="col">Status</th>
                    <th scope="col">Result</th>
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
                        <td> {{ \Carbon\Carbon::parse($history->submited_at)->translatedFormat('l, d F Y') }}</td>
                        <td>
                            @if ($history->assessment !== null)
                                <span
                                    class="badge text-bg-{{ $history->assessment->status === 'pass' ? 'success' : ($history->assessment->status === 'fail' ? 'danger' : 'warning') }}">
                                    {{ \Illuminate\Support\Str::camel($history->pic_status) }}
                                </span>
                            @else
                                <span class="badge text-bg-secondary">
                                    Not Yet Assessment
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($history->assessment !== null)
                                {{ $history->assessment->assessment_result }} %
                            @else
                                -
                            @endif
                        </td>

                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-outline-secondary">View</a>
                            @if ($history->assessment === null)
                                <a href="{{ route('quality-inspector.edit', $history->id) }}"
                                    class="btn btn-sm btn-outline-secondary">Assessment</a>
                            @endif
                        </td>
                    </tr>
                    @component('components.confirmation-modal', [
                        'message' => 'Are you sure you can refuse the application?',
                        'modalId' => 'rejectModal',
                        'title' => 'Confirmation Reject',
                        'action' => route('pic.update', $history->id),
                        'statusValue' => 'rejected',
                    ])
                    @endcomponent
                    @component('components.confirmation-modal', [
                        'message' => 'Are you sure you can approve the application?',
                        'modalId' => 'approvedModal',
                        'title' => 'Confirmation Approved',
                        'action' => route('pic.update', $history->id),
                        'statusValue' => 'approved',
                    ])
                    @endcomponent
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
