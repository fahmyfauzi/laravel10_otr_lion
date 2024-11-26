<div class="row g-4">
    <h2>Detail Submission {{ $submission->personnel->name }}</h2>
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
                        <input class="form-check-input " type="radio" id="initial" name="type" value="initial"
                            {{ (isset($submission->assessment->authorizeLaca) && $submission->assessment->authorizeLaca->type == 'initial') || old('type') == 'initial' ? 'checked' : '' }}>
                        <label class="form-check-label" for="initial">Initial</label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="additional" name="type" value="additional"
                            {{ (isset($submission->assessment->authorizeLaca) && $submission->assessment->authorizeLaca->type == 'additional') || old('type') == 'additional' ? 'checked' : '' }}>
                        <label class="form-check-label" for="additional">Additional</label>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input " type="radio" id="renewal" name="type" value="renewal"
                            {{ (isset($submission->assessment->authorizeLaca) && $submission->assessment->authorizeLaca->type == 'renewal') || old('type') == 'renewal' ? 'checked' : '' }}>
                        <label class="form-check-label" for="renewal">Renewal</label>
                    </div>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <label for="no" class="col-sm-4 col-form-label">No.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('no') is-invalid @enderror" name="no"
                            id="no" placeholder="Input laca no"
                            value="{{ old('no', $submission->assessment->authorizeLaca->no ?? '') }}">
                        @error('no')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="validy" class="col-sm-4 col-form-label">Validy</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('validy') is-invalid @enderror" name="validy"
                            id="validy" placeholder="Input validity"
                            value="{{ old('validy', $submission->assessment->authorizeLaca->validy ?? '') }}">
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
                                <input class="form-check-input" type="checkbox" id="mr" name="mr"
                                    value="1"
                                    {{ (isset($submission->assessment->authorizeLaca) && $submission->assessment->authorizeLaca->mr) || old('mr') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="mr">MR</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rii" name="rii"
                                    value="1"
                                    {{ (isset($submission->assessment->authorizeLaca) && $submission->assessment->authorizeLaca->rii) || old('rii') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="rii">RII</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="etops" name="etops"
                                    value="1"
                                    {{ (isset($submission->assessment->authorizeLaca) && $submission->assessment->authorizeLaca->etops) || old('etops') == '1' ? 'checked' : '' }}>
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
                            <th scope="row" width="50%" class="table-light">AME License No.</th>
                            <td>{{ $submission->ameLicense->license_no }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="table-light">V.U.T</th>
                            <td>{{ $submission->ameLicense->vut }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- MANDATORY TRAINING -->
                <div class="border">
                    <div class="bg-light">
                        <h3 class="p-2">Mandatory Training</h3>
                        <hr class="m-0">
                    </div>
                    <div class="p-2">
                        <div class="mb-3 row">
                            <label for="human_factory" class="col-sm-4 col-form-label">Human Factor
                                Training</label>
                            <div class="col-sm-8">
                                <input type="text"
                                    class="form-control @error('human_factory') is-invalid @enderror"
                                    name="human_factory" id="human_factory" placeholder="Input last performed year"
                                    value="{{ old('human_factory', $submission->assessment->mandatoryTraining->human_factory ?? '') }}">
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
                                    name="sms_training" id="sms_training" placeholder="Input last performed year"
                                    value="{{ old('sms_training', $submission->assessment->mandatoryTraining->sms_training ?? '') }}">
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
                                    placeholder="Input last performed year"
                                    value="{{ old('rvsm_pbn_training', $submission->assessment->mandatoryTraining->rvsm_pbn_training ?? '') }}">
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
                                    name="etops_training" id="etops_training" placeholder="Input last performed year"
                                    value="{{ old('etops_training', $submission->assessment->mandatoryTraining->etops_training ?? '') }}">
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
                                    name="rii_training" id="rii_training" placeholder="Input last performed year"
                                    value="{{ old('rii_training', $submission->assessment->mandatoryTraining->rii_training ?? '') }}">
                                @error('rii_training')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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
                        @foreach ($submission->lionAirAirCraftTypes as $lionAirAirCraftType)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $lionAirAirCraftType->air_craft_type }}
                                </td>
                            </tr>
                        @endforeach
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
            @component('components.assessment-material', [
                'index' => 1,
                'name' => 'assessment_material_1',
                'label' => 'The understanding of CASR, SMS, HF, RVSM & PBN',
                'value' => old('assessment_material_1', $submission->assessment->assessment_material_1 ?? ''),
            ])
            @endcomponent

            <!-- material 2 -->
            @component('components.assessment-material', [
                'index' => 2,
                'name' => 'assessment_material_2',
                'label' => 'The understanding of Lion Air CMM, QCPM and QN',
                'value' => old('assessment_material_2', $submission->assessment->assessment_material_2 ?? ''),
            ])
            @endcomponent


            <!-- material 3 -->
            @component('components.assessment-material', [
                'index' => 3,
                'name' => 'assessment_material_3',
                'label' => 'The understanding of Required Inspection Item (only for applicant RII person)',
                'value' => old('assessment_material_3', $submission->assessment->assessment_material_3 ?? ''),
            ])
            @endcomponent

            <!-- material 4 -->
            @component('components.assessment-material', [
                'index' => 4,
                'name' => 'assessment_material_4',
                'label' => 'The understanding of ETOPS (only for applicant type rating A330)',
                'value' => old('assessment_material_4', $submission->assessment->assessment_material_4 ?? ''),
            ])
            @endcomponent

            <!-- material 5 -->
            @component('components.assessment-material', [
                'index' => 5,
                'name' => 'assessment_material_5',
                'label' => 'The understanding and the application of MP and MEL',
                'value' => old('assessment_material_5', $submission->assessment->assessment_material_5 ?? ''),
            ])
            @endcomponent


            <!-- material 6, 7, 8 , 9 -->
            <tr>
                <td>6</td>
                <td>
                    The understanding of how to fill and to distribute of these listed:
                    <ul class="assessment-list">
                        <li> <label for="assessment_material_6" class="form-label"> Preflight / Transit / Daily
                            </label></li>
                        <li> <label for="assessment_material_7" class="form-label"> AD / SB </label></li>
                        <li> <label for="assessment_material_8" class="form-label"> AFML, DMI, DBC, NSRDI </label>
                        </li>
                        <li> <label for="assessment_material_6" class="form-label"> Chronologies Report, AOG and SS
                                Declaration </label></li>
                    </ul>
                </td>
                <td width="20%" class="pt-4">
                    <div class="input-group  input-group-sm mb-1">
                        <input type="number"
                            class="form-control value-assessment @error('assessment_material_6') is-invalid @enderror"
                            name="assessment_material_6" id="assessment_material_6"
                            value="{{ old('assessment_material_6', $submission->assessment->assessment_material_6 ?? '') }}">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('assessment_material_6')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="input-group  input-group-sm mb-1">
                        <input type="number"
                            class="form-control value-assessment @error('assessment_material_7') is-invalid @enderror"
                            name="assessment_material_7" id="assessment_material_7"
                            value="{{ old('assessment_material_7', $submission->assessment->assessment_material_7 ?? '') }}">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('assessment_material_7')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="input-group  input-group-sm mb-1">
                        <input type="number"
                            class="form-control value-assessment @error('assessment_material_8') is-invalid @enderror"
                            name="assessment_material_8" id="assessment_material_8"
                            value="{{ old('assessment_material_8', $submission->assessment->assessment_material_8 ?? '') }}">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('assessment_material_8')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="input-group  input-group-sm mb-1">
                        <input type="number"
                            class="form-control value-assessment @error('assessment_material_9') is-invalid @enderror"
                            name="assessment_material_9" id="assessment_material_9"
                            value="{{ old('assessment_material_9', $submission->assessment->assessment_material_9 ?? '') }}">
                        <span class="input-group-text">%</span>
                    </div>
                    @error('assessment_material_9')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </td>
            </tr>


            <!-- material 7 -->
            @component('components.assessment-material', [
                'index' => 7,
                'name' => 'assessment_material_10',
                'label' => 'The understanding of Airframe, Engine, Aircraft system',
                'value' => old('assessment_material_10', $submission->assessment->assessment_material_10 ?? ''),
            ])
            @endcomponent

            <!-- material 8 -->
            @component('components.assessment-material', [
                'index' => 8,
                'name' => 'assessment_material_11',
                'label' => 'The understanding of Electronics, Instrument, Radio installed to the Aircraft type',
                'value' => old('assessment_material_11', $submission->assessment->assessment_material_11 ?? ''),
            ])
            @endcomponent

            <!-- material 9 -->
            @component('components.assessment-material', [
                'index' => 9,
                'name' => 'assessment_material_12',
                'label' => 'The understanding of how to perform troubleshooting on the Aircraft',
                'value' => old('assessment_material_12', $submission->assessment->assessment_material_12 ?? ''),
            ])
            @endcomponent


            <!-- total result -->
            <tr>
                <td colspan="2" class="text-end">
                    <label for="total_result" class="form-label fs-4">
                        Total Result :
                    </label>
                </td>
                <td>
                    <div class="input-group  input-group-sm mb-1">
                        <input type="text" class="form-control" name="total_result" id="total_result"
                            placeholder="Result" aria-label="Total Result" min="0" max="100" disabled
                            value="{{ old('total_result', $submission->assessment->assessment_result ?? '') }}">
                        <span class="input-group-text">%</span>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

</div>
