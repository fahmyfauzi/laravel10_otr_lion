@extends('layouts.app')
@section('title', 'Assessment')

@section('content')

    @if (session('success'))
        @component('components.alert', ['type' => 'success', 'message' => session('success')])
        @endcomponent
    @endif
    @if (session('error'))
        @component('components.alert', ['type' => 'danger', 'message' => session('success')])
        @endcomponent
    @endif

    <div class="container">
        <form action="{{ route('quality-inspector.update', $submission->id) }}" method="POST">
            @csrf
            <div class="row g-4">
                <h2>Detail Submission {{ $submission->personnel->name }}</h2>
                <!-- Biodata -->
                <div class="col-md-8">
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <div class="border text-white p-2 text-center flex-shrink-0" style="min-width: 150px;"
                            id="fileUploadBox">
                            <!-- Image Preview -->
                            <img id="imagePreview"
                                src="{{ asset('storage/uploads/photos/' . $submission->personnel->photo) }}"
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

                <!-- Authorization LACA -->
                <div class="col-md-4">
                    <div class="border">
                        <div class=" text-center text-allign-center bg-light p-2">
                            <span class=" text-black d-block fs-5 fw-semibold">Authorization LACA</span>
                            <span class=" text-muted ">(fill by quality inspector)</span>
                        </div>
                        <hr class="m-0">
                        <div class="p-2">
                            <div class="d-flex flex-wrap gap-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" id="initial" name="type"
                                        value="initial">
                                    <label class="form-check-label" for="initial">Initial</label>

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="additional" name="type"
                                        value="additional">
                                    <label class="form-check-label" for="additional">Additional</label>

                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" id="renewal" name="type"
                                        value="renewal">
                                    <label class="form-check-label" for="renewal">Renewal</label>
                                </div>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label for="no" class="col-sm-4 col-form-label">No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('no') is-invalid @enderror"
                                        name="no" id="no" placeholder="Input your laca no"
                                        value="{{ old('no') }}">
                                    @error('no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="validy" class="col-sm-4 col-form-label">Validy</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('validy') is-invalid @enderror"
                                        name="validy" id="validy" placeholder="Input your validity"
                                        value="{{ old('validy') }}">
                                    @error('validy')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="scope" class="col-sm-4 col-form-label">Scope</label>
                                <div class="col-sm-8 align-items-center ">
                                    <div class="d-flex flex-wrap gap-4 pt-2">
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" id="mr"
                                                name="mr" value="1">
                                            <label class="form-check-label" for="mr">MR</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" id="rii"
                                                name="rii" value="1">
                                            <label class="form-check-label" for="rii">RII</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox" id="etops"
                                                name="etops" value="1">
                                            <label class="form-check-label" for="etops">ETOPS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- TYPE OF RATING TRAINING &  -->
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

                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- AME LICENSE -->
                            <table class="table border mb-4">
                                <tbody>
                                    <tr>
                                        <th scope="row" class="table-light">License No.</th>
                                        <td>{{ $submission->ameLicense->license_no }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table-light">V.U.T</th>
                                        <td>{{ $submission->ameLicense->vut }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- MANDATORY TRAINING -->
                            <h3>Mandatory Training</h3>
                            <div class="mb-3 row">
                                <label for="human_factory" class="col-sm-4 col-form-label">Human Factor
                                    Training</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('human_factory') is-invalid @enderror"
                                        name="human_factory" id="human_factory"
                                        placeholder="Input your last performed year" value="{{ old('human_factory') }}">
                                    @error('human_factory')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="sms_training" class="col-sm-4 col-form-label">SMS
                                    TRAINING</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('sms_training') is-invalid @enderror"
                                        name="sms_training" id="sms_training"
                                        placeholder="Input your last performed year" value="{{ old('sms_training') }}">
                                    @error('sms_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="rvsm_pbn_training" class="col-sm-4 col-form-label">RVSM PBN
                                    TRAINING</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('rvsm_pbn_training') is-invalid @enderror"
                                        name="rvsm_pbn_training" id="rvsm_pbn_training"
                                        placeholder="Input your last performed year"
                                        value="{{ old('rvsm_pbn_training') }}">
                                    @error('rvsm_pbn_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="etops_training" class="col-sm-4 col-form-label">ETOPS TRAINING
                                    (only for applicant for A/C type effective ETOPS)</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('etops_training') is-invalid @enderror"
                                        name="etops_training" id="etops_training"
                                        placeholder="Input your last performed year" value="{{ old('etops_training') }}">
                                    @error('etops_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="rii_training" class="col-sm-4 col-form-label">RII TRAINING
                                    (only for applicant RII)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('rii_training') is-invalid @enderror"
                                        name="rii_training" id="rii_training"
                                        placeholder="Input your last performed year" value="{{ old('rii_training') }}">
                                    @error('rii_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

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
            </div>

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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_1') is-invalid @enderror"
                                        name="assessment_material_1" id="assessment_material_1"
                                        value="{{ old('assessment_material_1') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_2') is-invalid @enderror"
                                        name="assessment_material_2" id="assessment_material_2"
                                        value="{{ old('assessment_material_2') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_3') is-invalid @enderror"
                                        name="assessment_material_3" id="assessment_material_3"
                                        value="{{ old('assessment_material_3') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_4') is-invalid @enderror"
                                        name="assessment_material_4" id="assessment_material_4"
                                        value="{{ old('assessment_material_4') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_4')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_5') is-invalid @enderror"
                                        name="assessment_material_5" id="assessment_material_5"
                                        value="{{ old('assessment_material_5') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_5')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_6') is-invalid @enderror"
                                        name="assessment_material_6" id="assessment_material_6"
                                        value="{{ old('assessment_material_6') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_6')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_7') is-invalid @enderror"
                                        name="assessment_material_7" id="assessment_material_7"
                                        value="{{ old('assessment_material_7') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_7')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_8') is-invalid @enderror"
                                        name="assessment_material_8" id="assessment_material_8"
                                        value="{{ old('assessment_material_8') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_8')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <!-- material 9 -->
                        <tr>
                            <td>9</td>
                            <td>
                                <label for="assessment_material_9" class="form-label">
                                    What is the experience on performing troubleshooting on the aircraft? And how is his/her
                                    performance on conducting troubleshooting?
                                </label>
                            </td>
                            <td width="20%">
                                <div class="input-group mb-3">
                                    <input type="number"
                                        class="form-control value-assessment @error('assessment_material_9') is-invalid @enderror"
                                        name="assessment_material_9" id="assessment_material_9"
                                        value="{{ old('assessment_material_9') }}">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('assessment_material_9')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>

                        <!-- total result -->
                        <tr>
                            <td colspan="2" class="text-end">
                                <label for="total_result" class="form-label fs-4">
                                    Total Result :
                                </label>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="total_result" id="total_result"
                                        placeholder="Result" aria-label="Total Result" min="0" max="100"
                                        disabled>
                                    <span class="input-group-text">%</span>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

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
                        {{ \Carbon\Carbon::parse($submission->submited_at)->translatedFormat(' d M Y') }})
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
                            {{ \Carbon\Carbon::parse($submission->pic_check_at)->translatedFormat(' d M Y') }})</p>
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

        @if (!$submission->pic_status)
            <div class="text-end">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approvedModal">Approve</button>
            </div>
        @endif

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
            <div class="col-md-6 text-center ">
                <span class="fw-semibold fs-1 bg-success py-2 px-4 rounded text-white d-none" id="resultPass">PASS</span>
                <span class="fw-semibold fs-1 bg-danger py-2 px-4 rounded text-white d-none" id="resultFail">Fail</span>
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

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll(
                'input[name^="assessment_material_"]'); // Ambil semua input material
            // Ambil input Total Result
            const totalResultInput = document.getElementById("total_result");

            // Fungsi untuk menghitung total hasil
            function calculateTotal() {
                let total = 0;
                let countFilled = 0;

                inputs.forEach(input => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) {
                        total += value;
                        countFilled++;
                    }
                });

                // Jika semua nilai telah diisi, hitung rata-rata dan tampilkan
                if (countFilled === inputs.length) {
                    // Hitung rata-rata (2 desimal)
                    const average = (total / inputs.length).toFixed(2);
                    totalResultInput.value = average;

                    // Tampilkan status berdasarkan nilai
                    if (average >= 70) {
                        document.getElementById("resultPass").classList.remove("d-none");
                        document.getElementById("resultFail").classList.add("d-none");
                    } else {
                        document.getElementById("resultFail").classList.remove("d-none");
                        document.getElementById("resultPass").classList.add("d-none");
                    }
                } else {
                    // Kosongkan jika belum semua terisi
                    totalResultInput.value = "";
                }
            }

            // Tambahkan event listener ke setiap input material
            inputs.forEach(input => {
                input.addEventListener("input", calculateTotal);
            });
        });
    </script>
    <script>
        // Select all elements with the class 'value-assessment'
        document.querySelectorAll('.value-assessment').forEach(function(element) {
            element.addEventListener('input', function() {
                let value = this.value;

                // Ensure there are only two decimal places
                if (value.indexOf('.') !== -1) {
                    let parts = value.split('.');
                    parts[1] = parts[1].substring(0, 2); // Limit to two decimal places
                    value = parts.join('.');
                }

                // Ensure the value does not exceed 100
                if (parseFloat(value) > 100) {
                    value = 100;
                }

                // Set the value back to the input field
                this.value = value;
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".form-check-input");

            // Mapping antara checkbox ID dengan elemen yang akan ditampilkan
            const mappings = {
                "rii": "rii_training",
                "etops": "etops_training",
            };

            // Menambahkan event listener pada setiap checkbox
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    const fieldId = mappings[this.id];

                    if (fieldId) {
                        const field = document.getElementById(fieldId).closest(".row");

                        // Tampilkan atau sembunyikan field berdasarkan checkbox status
                        if (this.checked) {
                            field.style.display = "flex";
                        } else {
                            field.style.display = "none";
                        }
                    }
                });
            });

            // Menyembunyikan semua elemen terkait pada awal
            for (const fieldId in mappings) {
                const field = document.getElementById(mappings[fieldId]).closest(".row");
                if (field) {
                    field.style.display = "none";
                }
            }
        });
    </script>
@endpush
