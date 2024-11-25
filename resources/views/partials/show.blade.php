@extends('layouts.app')
@section('title', 'Detail')

@section('content')
    <div class="container">
        <div class="row g-4">
            <!-- Biodata -->
            <div class="col-md-8">
                <div class="d-flex flex-column flex-md-row gap-3">
                    <div class="border text-white p-2 text-center flex-shrink-0" style="min-width: 150px;" id="fileUploadBox">
                        <!-- Image Preview -->
                        <img id="imagePreview" src="{{ asset('storage/uploads/photos/' . $submission->personnel->photo) }}"
                            alt="Image Preview" class="img-fluid" style="max-width: 100px; ">
                    </div>
                    <div class="w-100">
                        <div class="row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                {{ $submission->personnel->name }}
                            </div>

                        </div>
                        <div class=" row">
                            <label for="place_of_birth" class="col-sm-4 col-form-label">Place / Date of Birth</label>
                            <div class="col-sm-8">
                                <div class="d-flex flex-wrap gap-2">
                                    {{ $submission->personnel->place_of_birth }},
                                    {{ $submission->personnel->date_of_birth }}
                                </div>
                            </div>
                        </div>

                        <div class=" row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                {{ $submission->personnel->address }}
                            </div>
                        </div>

                        <div class=" row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                {{ $submission->personnel->phone }}
                            </div>
                        </div>

                        <div class=" row">
                            <label for="company_no_id" class="col-sm-4 col-form-label">Company ID No.</label>
                            <div class="col-sm-8">
                                {{ $submission->personnel->company_no_id }}
                            </div>
                        </div>

                        <div class=" row">
                            <label for="last_formal_education" class="col-sm-4 col-form-label">Last Formal
                                Education</label>
                            <div class="col-sm-8">
                                {{ $submission->personnel->last_formal_education }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            @if (Auth::user()->role !== 'pic_coordinator' && $submission->assessment)
                <!-- Authorization LACA -->
                <div class="col-md-4 ">
                    <span>Date:
                        @if ($submission->assessment)
                            {{ \Carbon\Carbon::parse($submission->assessment->authorizeLaca->created_at)->translatedFormat('l, d F Y') }}
                        @endif
                    </span>

                    <!-- Authorization LACA -->
                    <div class="border ">
                        <div class=" text-center text-allign-center bg-light">
                            <span class=" text-black d-block fs-5 fw-semibold">Authorization LACA</span>
                            <span class=" text-muted ">(fill by quality inspector)</span>
                        </div>
                        <hr class="my-0">
                        <div class="p-2">
                            <div class="d-flex flex-wrap gap-3">
                                @php
                                    $typeChecked = optional($submission->assessment->authorizeLaca)->type;
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="initial" name="type"
                                        value="initial" {{ $typeChecked === 'initial' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="initial">Initial</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="additional" name="type"
                                        value="additional" {{ $typeChecked === 'additional' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="additional">Additional</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="renewal" name="type"
                                        value="renewal" {{ $typeChecked === 'renewal' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="renewal">Renewal</label>
                                </div>
                            </div>

                            <div class="row align-items-center mt-3">
                                <label for="no" class="col-sm-4 col-form-label">No.</label>
                                <div class="col-sm-8">
                                    {{ optional($submission->assessment->authorizeLaca)->no ?? '-' }}
                                </div>
                            </div>

                            <div class="row align-items-center mt-3">
                                <label for="validy" class="col-sm-4 col-form-label">Validity</label>
                                <div class="col-sm-8">
                                    {{ optional($submission->assessment->authorizeLaca)->validy ?? '-' }}
                                </div>
                            </div>

                            <div class="row  mt-3">
                                <label for="scope" class="col-sm-4 col-form-label">Scope</label>
                                <div class="col-sm-8 mt-2">
                                    @php
                                        $scope = optional($submission->assessment->authorizeLaca);
                                    @endphp
                                    <div class="d-flex flex-wrap gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="mr" name="scope[mr]"
                                                value="1" {{ $scope->mr ? 'checked' : '' }}>
                                            <label class="form-check-label" for="mr">MR</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rii" name="scope[rii]"
                                                value="1" {{ $scope->rii ? 'checked' : '' }}>
                                            <label class="form-check-label" for="rii">RII</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="etops"
                                                name="scope[etops]" value="1" {{ $scope->etops ? 'checked' : '' }}>
                                            <label class="form-check-label" for="etops">ETOPS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="col-12">
                <div class="row">
                    <!-- TYPE OF RATING TRAINING -->
                    <div class="col-md-6">
                        <table class="table border">
                            <thead class="table-light ">
                                <tr>
                                    <th colspan="3">
                                        Type of Rating Training
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <th>
                                        No.
                                    </th>
                                    <th>Course</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($submission->ratingTrainings as $ratingTraining)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $ratingTraining->course }}
                                        </td>
                                        <td class="text-center">
                                            {{ $ratingTraining->year }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            No data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- TYPE OF BASIC LICENSE -->
                    <div class="col-md-6">
                        <table class="table border">
                            <thead class="table-light ">
                                <tr>
                                    <th colspan="3">
                                        BASIC LICENSE
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>Category</th>
                                    <th>Card No.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($submission->basicLicenses as $basicLicense)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $basicLicense->category }}
                                        </td>
                                        <td>
                                            {{ $basicLicense->card_no }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            No data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <!-- AME LICENSE -->
                        <table class="table border mb-4">
                            <tbody>
                                <tr>
                                    <th scope="row" width="50%" class="table-light">AME License No.</th>
                                    <td>{{ $submission->ameLicense->license_no }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="table-light">V.U.T</th>
                                    <td>{{ $submission->ameLicense->vut }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if (Auth::user()->role !== 'pic_coordinator' && $submission->assessment)
                            <!-- MANDATORY TRAINING -->
                            <table class="table border">
                                <thead class="text-center table-light">
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>Mandatory Training <br> Initial/Recurrent</th>
                                        <th>Last Performed Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>HUMAN FACTOR TRAINING</td>
                                        <td class="text-center">
                                            {{ $submission->assessment->mandatoryTraining->human_factory }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>SMS TRAINING</td>
                                        <td class="text-center">
                                            {{ $submission->assessment->mandatoryTraining->sms_training }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>RVSM PBN TRAINING</td>
                                        <td class="text-center">
                                            {{ $submission->assessment->mandatoryTraining->rvsm_pbn_training }}
                                        </td>
                                    </tr>
                                    @if ($submission->assessment->mandatoryTraining->etops_training != null)
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>ETOPS TRAINING (only for
                                                applicant for A/C type effective
                                                ETOPS)</td>
                                            <td class="text-center">
                                                {{ $submission->assessment->mandatoryTraining->etops_training }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($submission->assessment->mandatoryTraining->rii_training != null)
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>RII TRAINING (only for applicant
                                                RII)</td>
                                            <td class="text-center">
                                                {{ $submission->assessment->mandatoryTraining->rii_training }}
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        @endif
                    </div>

                    <!-- LION AIR AIRCRAFT TYPE -->
                    <div class="col-md-6">
                        <table class="table border">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>Lion Air Aircraft Type
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($submission->lionAirAirCraftTypes as $lionAirAirCraftType)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $lionAirAirCraftType->air_craft_type }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            No data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role !== 'pic_coordinator' &&
                    $submission->pic_status !== 'rejected' &&
                    $submission->assessment !== null)
                <!-- assessment -->
                <div class="mb-5">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th colspan="2">Assessment Material</th>
                                <th class="text-center">Percentage Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- material 1 -->
                            <tr>
                                <td>1</td>
                                <td>
                                    <label for="assessment_material_1" class="form-label">
                                        The understanding of CASR, SMS, HF, RVSM & PBN
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_1 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 2 -->
                            <tr>
                                <td>2</td>
                                <td>
                                    <label for="assessment_material_2" class="form-label">
                                        The understanding of Lion Air CMM, QCPM and QN
                                    </label>
                                </td>

                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_2 ?? '-' }} %
                                </td>

                            </tr>

                            <!-- material 3 -->
                            <tr>
                                <td>3</td>
                                <td>
                                    <label for="assessment_material_3" class="form-label">
                                        The understanding of Required Inspection Item (only for applicant RII person)
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_3 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 4 -->
                            <tr>
                                <td>4</td>
                                <td>
                                    <label for="assessment_material_4" class="form-label">
                                        The understanding of ETOPS (only for applicant type rating A330)
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_4 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 5 -->
                            <tr>
                                <td>5</td>
                                <td>
                                    <label for="assessment_material_5" class="form-label">
                                        The understanding and the application of MP and MEL
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_5 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 6 -->
                            <tr>
                                <td>6</td>
                                <td>
                                    <label for="assessment_material_6" class="form-label">
                                        The understanding of how to fill and to distribute of these listed:
                                        <ul class="assessment-list">
                                            <li>Preflight / Transit / Daily</li>
                                            <li>AD / SB</li>
                                            <li>AFML, DMI, DBC, NSRDI</li>
                                            <li>Chronologies Report, AOG and SS Declaration</li>
                                        </ul>
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_6 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 7 -->
                            <tr>
                                <td>7</td>
                                <td>
                                    <label for="assessment_material_7" class="form-label">
                                        The understanding of Airframe, Engine, Aircraft system
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_7 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 8 -->
                            <tr>
                                <td>8</td>
                                <td>
                                    <label for="assessment_material_8" class="form-label">
                                        The understanding of Electronics, Instrument, Radio installed to the Aircraft type
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_8 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- material 9 -->
                            <tr>
                                <td>9</td>
                                <td>
                                    <label for="assessment_material_9" class="form-label">
                                        What is the experience on performing troubleshooting on the aircraft? And how is
                                        his/her
                                        performance on conducting troubleshooting?
                                    </label>
                                </td>
                                <td width="20%" class="text-center">
                                    {{ $submission->assessment->assessment_material_9 ?? '-' }} %
                                </td>
                            </tr>

                            <!-- total result -->
                            <tr>
                                <td colspan="2" class="text-end">
                                    <label for="total_result" class="form-label fs-4">
                                        Total Result :
                                    </label>
                                </td>
                                <td width="20%" class="text-center fw-bold fs-4">
                                    {{ $submission->assessment->assessment_result ?? '-' }} %
                                </td>
                            </tr>

                        </tbody>
                    </table>


                </div>
            @endif

            <!-- signature -->
            <div class="justify-content-between text-center">
                <div class="row">
                    <div class="col">
                        <p>Applicant</p>
                    </div>
                    <div class="col">
                        Proposed and <br>
                        Check By
                    </div>
                    <div class="col">
                        <p>Assessment by,</p>
                    </div>
                </div>
                <div class="row fw-semibold">
                    <div class="col">
                        <p>({{ $submission->applicant->name }} ,
                            {{ \Carbon\Carbon::parse($submission->submited_at)->translatedFormat(' d F Y') }})
                        </p>
                    </div>
                    <div class="col ">
                        @if ($submission->pic_coordinator_id && $submission->pic_check_at)
                            ({{ $submission->pic_status == 'approved' ? 'Approved by:' : 'Rejected by:' }}
                            {{ $submission->picCoordinator->name }},
                            {{ \Carbon\Carbon::parse($submission->pic_check_at)->translatedFormat(' d M Y') }})
                        @else
                            ( )
                        @endif
                    </div>
                    <div class="col">
                        @if ($submission->assessment)
                            <p>( {{ $submission->assessment->status == 'pass' ? 'Pass by:' : 'Fail by:' }}
                                {{ $submission->assessment->qualityInspector->name }},
                                {{ \Carbon\Carbon::parse($submission->pic_check_at)->translatedFormat(' d F Y') }})</p>
                        @else
                            ( )
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Engineer</p>
                    </div>
                    <div class="col">
                        <p>PIC/ Coordinator</p>
                    </div>
                    <div class="col">
                        <p>Quality Inspector</p>
                    </div>
                </div>
            </div>

            <div class="d-flex ">
                <div class="col-md-6">
                    <p class="fw-semibold">Note :</p>
                    <ul class="note-list">
                        <li>
                            please give a check mark in the box selected
                        </li>
                        <li>
                            the applicant may apply fo examination not less than 30 (thirty)
                            days after the date applicant failed the examination
                        </li>
                        <li>minimum passing grade for each examination is 70%</li>
                    </ul>
                </div>
                <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
                    @if (Auth::user()->role !== 'pic_coordinator' && $submission->pic_status !== 'rejected')
                        @if ($submission->assessment)
                            <span
                                class="fw-semibold fs-1 {{ $submission->assessment->status == 'pass' ? 'bg-success' : 'bg-danger' }} py-2 px-4 rounded text-white">
                                {{ Illuminate\Support\Str::of($submission->assessment->status)->upper() }}</span>
                        @else
                            <span class="fw-semibold fs-1 bg-secondary py-2 px-4 rounded text-white">Not yet checked</span>
                        @endif
                    @else
                        @if (($submission->pic_status && !$submission->assessment) || $submission->assessment !== null)
                            <span
                                class="fw-semibold fs-1 {{ $submission->pic_status == 'approved' ? 'bg-success' : 'bg-danger' }} py-2 px-4 rounded text-white">
                                {{ Illuminate\Support\Str::of($submission->pic_status)->upper() }}</span>
                        @else
                            <div class="text-end">
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#rejectModal">Reject</button>
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#approvedModal">Approve</button>
                            </div>
                            @component('components.confirmation-modal', [
                                'message' => 'Are you sure you can refuse the application?',
                                'modalId' => 'rejectModal',
                                'title' => 'Confirmation Reject',
                                'action' => route('pic.update', $submission->id),
                                'statusValue' => 'rejected',
                            ])
                            @endcomponent
                            @component('components.confirmation-modal', [
                                'message' => 'Are you sure you can approve the application?',
                                'modalId' => 'approvedModal',
                                'title' => 'Confirmation Approved',
                                'action' => route('pic.update', $submission->id),
                                'statusValue' => 'approved',
                            ])
                            @endcomponent
                        @endif
                    @endif


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
