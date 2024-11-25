@extends('layouts.app')
@section('title', 'Dashboard')

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
        <h2>Detail Submission {{ $submission->personnel->name }}</h2>
        <div class="row g-4">
            <!-- Biodata -->
            <div class="col-md-8">
                <h3>Biodata</h3>
                <div class="d-flex flex-column flex-md-row gap-3">

                    <div class="border text-white p-2 text-center flex-shrink-0" style="min-width: 150px; cursor: pointer;"
                        id="fileUploadBox">
                        <!-- Image Preview -->
                        <img id="imagePreview" src="{{ asset('storage/uploads/photos/' . $submission->personnel->photo) }}"
                            alt="Image Preview" class="img-fluid" style="max-width: 100px; ">
                    </div>
                    <div class="w-100">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->personnel->name }}</p>
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <label for="place_of_birth" class="col-sm-4 col-form-label">Place / Date of Birth</label>
                            <div class="col-sm-8">
                                <div class="d-flex flex-wrap gap-2">
                                    <p>{{ $submission->personnel->place_of_birth }},
                                        {{ $submission->personnel->date_of_birth }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->personnel->address }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->personnel->phone }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="company_no_id" class="col-sm-4 col-form-label">Company ID No.</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->personnel->company_no_id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="last_formal_education" class="col-sm-4 col-form-label">Last Formal
                                Education</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->personnel->last_formal_education }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Authorization LACA -->
            <div class="col-md-4 ">
                <p>Date: {{ \Carbon\Carbon::parse($submission->authorizeLaca->created_at)->translatedFormat('l, d F Y') }}
                </p>

                <div class="border ">
                    <div class="py-2 text-center text-allign-center bg-light">
                        <h5>Authorization LACA</h5>
                        <p class=" text-muted">(fill by quality inspector)</p>
                    </div>
                    <hr class="my-0">
                    <div class="p-3">

                        <div class="d-flex flex-wrap gap-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input " type="radio" id="initial" name="type"
                                    value="initial" {{ $submission->authorizeLaca->type == 'initial' ? 'checked' : '' }}>
                                <label class="form-check-label" for="initial">Initial</label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="additional" name="type"
                                    value="additional"
                                    {{ $submission->authorizeLaca->type == 'additional' ? 'checked' : '' }}>
                                <label class="form-check-label" for="additional">Additional</label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input " type="radio" id="renewal" name="type"
                                    value="renewal" {{ $submission->authorizeLaca->type == 'renewal' ? 'checked' : '' }}>
                                <label class="form-check-label" for="renewal">Renewal</label>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="no" class="col-sm-4 col-form-label">No.</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->authorizeLaca->no }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="validy" class="col-sm-4 col-form-label">Validy</label>
                            <div class="col-sm-8">
                                <p>{{ $submission->authorizeLaca->validy }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="scope" class="col-sm-4 col-form-label">Scope</label>
                            <div class="col-sm-8 align-items-center ">
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" id="mr" name="mr"
                                            value="1" {{ $submission->authorizeLaca->mr == true ? 'checked' : '' }}>
                                        <label class="form-check-label" for="mr">MR</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" id="rii" name="rii"
                                            value="1" {{ $submission->authorizeLaca->rii == true ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rii">RII</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" id="etops" name="etops"
                                            value="1"
                                            {{ $submission->authorizeLaca->etops == true ? 'checked' : '' }}>
                                        <label class="form-check-label" for="etops">ETOPS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

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
                                    <td class="text-center">{{ $submission->mandatoryTraining->human_factory }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>SMS TRAINING</td>
                                    <td class="text-center">{{ $submission->mandatoryTraining->sms_training }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>RVSM PBN TRAINING</td>
                                    <td class="text-center">{{ $submission->mandatoryTraining->rvsm_pbn_training }}</td>
                                </tr>
                                @if ($submission->mandatoryTraining->etops_training != null)
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>ETOPS TRAINING (only for
                                            applicant for A/C type effective
                                            ETOPS)</td>
                                        <td class="text-center">{{ $submission->mandatoryTraining->etops_training }}</td>
                                    </tr>
                                @endif
                                @if ($submission->mandatoryTraining->rii_training != null)
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>RII TRAINING (only for applicant
                                            RII)</td>
                                        <td class="text-center">{{ $submission->mandatoryTraining->rii_training }}</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
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
            <form action="{{ route('quality-inspector.update', $submission->id) }}" method="POST">
                @csrf

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
                                        placeholder="Enter total result" aria-label="Total Result" min="0"
                                        max="100" disabled>
                                    <span class="input-group-text">%</span>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

        <div class="d-flex row justify-content-between">
            <div class="col-md-4 text-center">
                <p>Applicant</p>
                <p>({{ $submission->personnel->name }} ,
                    {{ \Carbon\Carbon::parse($submission->authorizeLaca->created_at)->translatedFormat(' d F Y') }})</p>
                <p>Engineer</p>
            </div>

            <div class="col-md-4 text-center">
                <p>
                    @if ($submission->pic_status == 'rejected')
                        Rejected and <br>
                        Check By
                    @else
                        Proposed and <br>
                        Check By
                    @endif
                </p>
                <p>

                    @if ($submission->pic_coodinator_id && $submission->pic_check_at)
                        ({{ $submission->picCoordinator->name }},
                        {{ \Carbon\Carbon::parse($submission->pic_check_at)->translatedFormat(' d F Y') }})
                    @else
                        ( )
                    @endif
                </p>
                <p>PIC/ Coordinator</p>
            </div>
            <div class="col-md-4 text-center">
                <p>Assessment by,</p>
                <p>({{ $submission->personnel->name }})</p>
                <p>Quality Inspector</p>
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
@endpush
