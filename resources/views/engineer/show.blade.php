@extends('layouts.app')
@section('title', 'Detail')

@section('content')
    <div class="container">
        <div class="row g-4">
            <!-- Biodata -->
            <div class="col-md-8">
                @include('partials.biodata')
            </div>


            <!-- Authorization LACA -->
            @if ($submission->assessment)
                <div class="col-md-4 ">
                    @include('partials.authorize-laca')
                </div>
            @endif

            <!-- TYPE OF RATING TRAINING & BASIC LICENSE -->
            <div class="col-12">
                <div class="row">
                    <!-- TYPE OF RATING TRAINING -->
                    <div class="col-md-6">
                        @include('partials.rating-training')
                    </div>

                    <!-- TYPE OF BASIC LICENSE -->
                    <div class="col-md-6">
                        @include('partials.basic-license')
                    </div>
                </div>
            </div>

            <!-- AME LICENSE & MANDATORY TRAINING -->
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <!-- AME LICENSE -->
                        @include('partials.ame-license')

                        <!-- MANDATORY TRAINING -->
                        @if ($submission->assessment)
                            @include('partials.mandatory-training')
                        @endif
                    </div>

                    <!-- LION AIR AIRCRAFT TYPE -->
                    <div class="col-md-6">
                        @include('partials.aircraft-type')
                    </div>
                </div>
            </div>

            <!-- assessment -->
            @if ($submission->pic_status !== 'rejected' && $submission->assessment !== null)
                <div class="mb-5">
                    @include('partials.assessment-material')
                </div>
            @endif

            <!-- signature -->
            <div class="justify-content-between text-center">
                @include('partials.signature')
            </div>

            <!-- note & status -->
            <div class="d-flex ">
                <div class="col-md-6">
                    @include('partials.note')
                </div>
                <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
                    @include('partials.status')
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
@endpush
