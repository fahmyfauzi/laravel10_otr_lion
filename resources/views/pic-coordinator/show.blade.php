@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

    @if (session('success'))
        @component('components.alert', ['type' => 'success', 'message' => session('success')])
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
                            <thead class="text-center">
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
                <ul>
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
            <div class="col-md-6">

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
