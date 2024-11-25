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
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Submitted Date</th>
                    <th scope="col">Status PIC</th>
                    <th scope="col">Status Quality Inspector</th>
                    <th scope="col">Result</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @forelse ($histories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $history->personnel->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($history->submited_at)->translatedFormat('l, d F Y') }} </td>
                        <td><span
                                class="badge text-bg-{{ $history->pic_status === 'approved' ? 'success' : ($history->pic_status === 'rejected' ? 'danger' : 'warning') }}">
                                {{ ucfirst(\Illuminate\Support\Str::camel($history->pic_status ?? 'Process')) }}
                            </span></td>
                        <td>
                            @if ($history->assessment !== null)
                                <span
                                    class="badge text-bg-{{ $history->assessment->status === 'pass' ? 'success' : ($history->assessment->status === 'fail' ? 'danger' : 'warning') }}">
                                    {{ Ucfirst(\Illuminate\Support\Str::camel($history->assessment->status)) }}
                                </span>
                            @elseif ($history->assessment === null && $history->pic_status === 'rejected')
                                <span class="badge text-bg-danger">
                                    Fail
                                </span>
                            @else
                                <span class="badge text-bg-warning">
                                    Waiting for Assessment
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

                        <td>
                            <a href="{{ route('submission.show', $history->id) }}"
                                class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Download</a>
                        </td>
                    </tr>
                @empty
                    <td colspan="7" class="text-center">No Data</td>
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
