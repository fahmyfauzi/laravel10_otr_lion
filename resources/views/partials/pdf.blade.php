<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Personnel Authorized Qualification Record</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 8px;
        }

        ul {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <div class="border" style="border: 1px solid black; padding: 0 10px 10px 10px">
        <table style="width: 100%; ">
            <tr>
                <td style="width:33%">
                    <img src="{{ public_path('assets/images/logo-lion-air.png') }}" alt="Logo Lion Air"
                        style="width: 200px;" />
                </td>
                <td>
                    <div style="margin-bottom: 40px;">
                        <span
                            style="background: #e5e5e5; width: 60%; text-align: center; padding:5px 20px; font-size: 14px; font-weight: bold; border: 1px solid black">
                            PERSONNEL AUTHORIZED QUALIFICATION RECORD
                        </span>
                    </div>
                </td>
            </tr>
        </table>

        <table
            style="
                    width: 100%;
                    border-collapse: collapse;
                    table-layout: fixed;
                ">
            <tr>
                <!-- Kolom Gambar -->
                <td
                    style="
                            width: 15%;
                            vertical-align: top;
                        ">
                    <img src="{{ public_path('storage/uploads/photos/' . $submission->personnel->photo) }}"
                        alt="Profile Picture" style="width: 100px;" />
                </td>

                <!-- Kolom Data -->
                <td style="width: 50%; padding: 5px; vertical-align: top">
                    <table style="width: 100%; border-collapse: collapse">
                        <tr>
                            <td style="width: 40%; padding: 3px">Name</td>
                            <td style="width: 60%; padding: 3px">
                                : {{ $submission->personnel->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px">
                                Place / Date of Birth
                            </td>
                            <td style="width: 60%; padding: 3px">
                                :
                                {{ $submission->personnel->place_of_birth }},
                                {{ \Carbon\Carbon::parse($submission->personnel->date_of_birth)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px">
                                Address
                            </td>
                            <td style="width: 60%; padding: 3px">
                                : {{ $submission->personnel->address }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px">
                                Phone / Cell Phone
                            </td>
                            <td style="width: 60%; padding: 3px">
                                : {{ $submission->personnel->phone }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px">
                                Company ID No.
                            </td>
                            <td style="width: 60%; padding: 3px">
                                :
                                {{ $submission->personnel->company_no_id }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding: 3px">
                                Last Formal Education
                            </td>
                            <td style="width: 60%; padding: 3px">
                                :
                                {{ $submission->personnel->last_formal_education }}
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- Kolom authorize laca -->
                @if ($submission->assessment)
                    <td
                        style="
                            width: 35%;
                            padding: 5px;
                            text-align: left;
                            vertical-align: top;
                        ">
                        <span>
                            Date:
                            {{ \Carbon\Carbon::parse($submission->assessment->authorizeLaca->created_at)->translatedFormat('l d F Y') }}
                        </span>
                        @php
                            $typeChecked = optional($submission->assessment->authorizeLaca)->type;
                        @endphp
                        <div style="border: 1px solid black; text-align: center">
                            <div style="background-color: #e5e5e5">
                                <h3 style="margin: 0;">Authorization LACA</h3>
                                <p>(fill by quality inspector)</p>
                                <hr>
                            </div>
                            <div>
                                <table>
                                    <tr>
                                        <td style="width: 33%">
                                            <div
                                                style="
                                                    display: flex;
                                                    align-items: center;

                                                    font-family: Arial,
                                                        sans-serif;
                                                ">
                                                <label for="initial"
                                                    style="
                                                        font-weight: bold;
                                                        color: #333;
                                                    ">Initial</label>
                                                <input type="checkbox" id="initial"
                                                    style="width: 20px;
                                                height: 20px"
                                                    {{ $typeChecked === 'initial' ? 'checked' : '' }} />
                                            </div>
                                        </td>

                                        <td style="width: 33%">
                                            <div
                                                style="
                                                    display: flex;
                                                    align-items: center;

                                                    font-family: Arial,
                                                        sans-serif;
                                                ">
                                                <label for="additional"
                                                    style="
                                                        font-weight: bold;
                                                        color: #333;
                                                    ">Additional</label>
                                                <input type="checkbox" id="additional"
                                                    style="width:
                                                20px; height: 20px"
                                                    {{ $typeChecked === 'additional' ? 'checked' : '' }} />
                                            </div>
                                        </td>

                                        <td style="width: 33%">
                                            <div
                                                style="
                                                    display: flex;
                                                    align-items: center;

                                                    font-family: Arial,
                                                        sans-serif;
                                                ">
                                                <label for="renewal"
                                                    style="
                                                        font-weight: bold;
                                                        color: #333;
                                                    ">Renewal</label>
                                                <input type="checkbox" id="renewal"
                                                    style="width: 20px;
                                                height: 20px"
                                                    {{ $typeChecked === 'renewal' ? 'checked' : '' }} />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No.</td>
                                        <td>
                                            :
                                            {{ $submission->assessment->authorizeLaca->no }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Validy</td>
                                        <td>
                                            :
                                            {{ $submission->assessment->authorizeLaca->validy }}
                                        </td>
                                    </tr>
                                    @php
                                        $scope = optional($submission->assessment->authorizeLaca);
                                    @endphp
                                    <tr>
                                        <td>Scope</td>

                                        <td colspan="2">

                                            <span
                                                style="
                                        display: flex; text-align: center; ">

                                                <span>
                                                    <label for="mr"
                                                        style="
                                                        font-weight: bold;
                                                        color: #333;
                                                    ">:
                                                        MR</label>
                                                    <input type="checkbox" id="mr"
                                                        style="
                                                        width: 20px;
                                                        height: 20px;
                                                    "
                                                        {{ $scope->mr ? 'checked' : '' }} />
                                                </span>
                                                <span>
                                                    <label for="rii"
                                                        style="
                                                        font-weight: bold;
                                                        color: #333;
                                                    ">RII</label>
                                                    <input type="checkbox" id="rii"
                                                        style="
                                                        width: 20px;
                                                        height: 20px;
                                                    "
                                                        {{ $scope->rii ? 'checked' : '' }} />
                                                </span>
                                                <span>
                                                    <label for="etops"
                                                        style="
                                                        font-weight: bold;
                                                        color: #333;
                                                    ">ETOPS</label>
                                                    <input type="checkbox" id="etops"
                                                        style="
                                                        width: 20px;
                                                        height: 20px;
                                                    "
                                                        {{ $scope->etops ? 'checked' : '' }} />
                                                </span>

                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                @endif
            </tr>
        </table>
        <hr>

        <table style="width: 100%">
            <tbody>
                <tr>
                    <!-- type of rating training -->
                    <td style="width:50%;">
                        <table
                            style="width: 100%; border: 1px solid black; border-collapse: collapse; border-spacing: 1px ">
                            <thead>
                                <tr style="background: #e5e5e5">
                                    <th colspan="3" style="font-size: 12px; text-align: left">TYPE of RATING TRAINING
                                    </th>
                                </tr>
                                <tr style="background: #e5e5e5;  border: 1px solid black;">
                                    <th style="border: 1px solid black; width:10%">No.</th>
                                    <th style="border: 1px solid black">Course</th>
                                    <th style=" width:15%">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submission->ratingTrainings as $ratingTraining)
                                    )
                                    <tr>
                                        <td
                                            style="text-align: center; border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td style=" border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $ratingTraining->course }}</td>
                                        <td
                                            style="text-align: center; border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $ratingTraining->year }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>

                    <!-- basic license -->
                    <td style="width:50%; vertical-align: top">
                        <table
                            style="width: 100%; border: 1px solid black; border-collapse: collapse; border-spacing: 1px ">
                            <thead>
                                <tr style="background: #e5e5e5; border: 1px solid black">
                                    <th colspan="3" style="font-size: 12px; text-align: left">BASIC LICENSE</th>
                                </tr>
                                <tr style="background: #e5e5e5">
                                    <th style="border:1px solid black; width:10%">No.</th>
                                    <th style="border:1px solid black;">Category</th>
                                    <th style="border:1px solid black;">Card No.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submission->basicLicenses as $basicLicense)
                                    )
                                    <tr>
                                        <td
                                            style="text-align: center; border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $loop->iteration }}</td>
                                        <td style=" border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $basicLicense->category }}</td>
                                        <td
                                            style="text-align: center; border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $basicLicense->card_no }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width: 100% ">
            <tbody>
                <tr>
                    <td style="width: 50%">
                        <table
                            style="width: 100%; border: 1px solid black; border-collapse: collapse; border-spacing: 1px; margin-bottom: 8px ">
                            <tr style="border: 1px solid black;">
                                <th
                                    style="width: 50%; background: #e5e5e5; text-align: left; border-right: 1px solid black">
                                    AME LICENSE No.
                                </th>
                                <td style="width: 50%;">
                                    {{ $submission->ameLicense->license_no }}
                                </td>
                            </tr>
                            <tr>
                                <th
                                    style="width: 50%; background: #e5e5e5 ; text-align: left;  border-right: 1px solid black">
                                    V.U.T
                                </th>
                                <td style="width: 50%;">
                                    {{ $submission->ameLicense->vut }}
                                </td>
                            </tr>
                        </table>

                        @if ($submission->assessment)
                            <!-- mandatory training -->
                            <table
                                style="width: 100%; border: 1px solid black; border-collapse: collapse; border-spacing: 1px ">
                                <thead style="">
                                    <tr style="background: #e5e5e5; border:1px solid black">
                                        <th style=" background: #e5e5e5; border:1px solid black; width:10%;">
                                            No.</th>
                                        <th style="background: #e5e5e5; border:1px solid black">Mandatoy Training <br>
                                            Initial/Recurrent</th>
                                        <th style="background: #e5e5e5; border:1px solid black">Last Performed Year
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom:1px dotted black">
                                        <td style="border-right: 1px solid black ; text-align: center">
                                            1
                                        </td>
                                        <td style="border-right: 1px solid black">HUMAN FACTOR TRAINING</td>
                                        <td style="text-align: center">
                                            {{ $submission->assessment->mandatoryTraining->human_factory }}</td>
                                    </tr>
                                    <tr style="border-bottom:1px dotted black">
                                        <td style="border-right: 1px solid black; text-align: center">
                                            2
                                        </td>
                                        <td style="border-right: 1px solid black">SMS TRAINING</td>
                                        <td style="text-align: center">
                                            {{ $submission->assessment->mandatoryTraining->sms_training }}</td>
                                    </tr>
                                    <tr style="border-bottom:1px dotted black">
                                        <td style="border-right: 1px solid black;text-align: center">
                                            3
                                        </td>
                                        <td style="border-right: 1px solid black">RVSM PBN TRAINING</td>
                                        <td style="text-align: center">
                                            {{ $submission->assessment->mandatoryTraining->rvsm_pbn_training }}</td>
                                    </tr>
                                    <tr style="border-bottom:1px dotted black">
                                        <td style="border-right: 1px solid black; text-align: center">
                                            4
                                        </td>
                                        <td style="border-right: 1px solid black">ETOPS TRAINING (only for
                                            applicant for A/C type effective
                                            ETOPS)</td>
                                        <td style="text-align: center">
                                            {{ $submission->assessment->mandatoryTraining->etops_training ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border-right: 1px solid black; text-align: center">
                                            5
                                        </td>
                                        <td style="border-right: 1px solid black">RII TRAINING (only for applicant
                                            RII)</td>
                                        <td style="text-align: center">
                                            {{ $submission->assessment->mandatoryTraining->rii_training ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif

                    </td>

                    <!-- lion air aircraft type -->
                    <td style="width:50%; vertical-align: top">
                        <table
                            style="width: 100%; border: 1px solid black; border-collapse: collapse; border-spacing: 1px ">
                            <thead>
                                <tr style="background: #e5e5e5; border: 1px solid black">
                                    <th style="width: 10%; border: 1px solid black">No.</th>
                                    <th>Lion Air Aircraft Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submission->lionAirAirCraftTypes as $lionAirAirCraftType)
                                    )
                                    <tr>
                                        <td
                                            style="text-align: center; border-bottom: 1px dotted black; border-right: 1px solid black">
                                            {{ $loop->iteration }}</td>
                                        <td style="border-bottom: 1px dotted black">
                                            {{ $lionAirAirCraftType->air_craft_type }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        @if ($submission->assessment)
            <!-- assessment material -->
            <table style="width:100%;  border-collapse: collapse; margin-top:8px">
                <thead>
                    <tr style="background: #e5e5e5; ">
                        <th colspan="2" style=" border:1px solid black; text-align: left; font-size: 12px">
                            Assessment Material
                        </th>
                        <th style="border:1px solid black;">
                            <div style="border:1px solid black; margin:7px; background: #ffff">
                                Percentage <br> Value
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody style="border:1px solid black;">
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; border-right: 1px solid black">
                            1
                        </td>
                        <td style="border-right: 1px solid black">The understanding of CASR, SMS, HF, RVSM & PBN</td>
                        <td style="text-align: center;  border-right: 1px solid black">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_1 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center;  border-right: 1px solid black">
                            2
                        </td>
                        <td style="border-right: 1px solid black">The understanding of Lion Air CMM, QCPM and QN</td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_2 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; border-right: 1px solid black">
                            3
                        </td>
                        <td style="border-right: 1px solid black">The understanding of Required Inspection Item (only
                            for applicant RII person)</td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_3 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; border-right: 1px solid black">
                            4
                        </td>
                        <td style="border-right: 1px solid black">The understanding of ETOPS (only for applicant type
                            rating A330)</td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_4 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; border-right: 1px solid black">
                            5
                        </td>
                        <td style="border-right: 1px solid black">The understanding and the application of MP and MEL
                        </td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_5 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; vertical-align: top; border-right: 1px solid black">
                            6
                        </td>
                        <td style="border-right: 1px solid black; vertical-align: top;">The understanding of how to
                            fill
                            and to distribute of
                            these listed:
                            <ul class="assessment-list" style="padding-left: 105px; ">
                                <li style="margin-top: 15px">- Preflight / Transit / Daily</li>
                                <li style="margin-top: 10px">- AD / SB</li>
                                <li style="margin-top: 10px">- AFML, DMI, DBC, NSRDI</li>
                                <li style="margin-top: 8px">- Chronologies Report, AOG and SS
                                    Declaration</li>
                            </ul>
                        </td>
                        <td style="text-align: center; padding-top: 16px">
                            <div>
                                <input type="text"
                                    value=" {{ $submission->assessment->assessment_material_6 }} %">
                            </div>
                            <div>
                                <input type="text"
                                    value=" {{ $submission->assessment->assessment_material_7 }} %">
                            </div>
                            <div>
                                <input type="text"
                                    value=" {{ $submission->assessment->assessment_material_8 }} %">
                            </div>
                            <div>
                                <input type="text"
                                    value=" {{ $submission->assessment->assessment_material_9 }} %">
                            </div>

                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; border-right: 1px solid black">
                            7
                        </td>
                        <td style="border-right: 1px solid black">The understanding of Airframe, Engine, Aircraft
                            system</td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_10 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; border-right: 1px solid black">
                            8
                        </td>
                        <td style="border-right: 1px solid black">The understanding of Electronics, Instrument, Radio
                            installed to the Aircraft type </td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_11 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td style="text-align: center; vertical-align: top; border-right: 1px solid black">
                            9
                        </td>
                        <td style="border-right: 1px solid black">What is the experience on performing trouble shooting
                            on the aircraft? And how is his/her
                            performance on conducting trouble shooting? </td>
                        <td style="text-align: center">
                            <input type="text" value=" {{ $submission->assessment->assessment_material_12 }} %">
                        </td>
                    </tr>
                    <tr style="border:1px solid black;">
                        <td colspan="2"
                            style="font-weight: bold; text-align: right; border-right: 1px solid black;">
                            Total Result
                        </td>
                        <td style="text-align: center; background-color: #e5e5e5">
                            <input type="text" style="font-weight: bold; border:2px solid black "
                                value="{{ $submission->assessment->assessment_result }} %">
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif

        <!-- signature -->
        <table style="width:100% ">
            <tbody>
                <tr style="text-align: center">
                    <td>Applicant,</td>
                    <td> Proposed and <br>
                        Check By,</td>
                    <td>Assessment by,</td>
                </tr>
                <tr style="text-align: center; font-weight: bold">
                    <td>
                        ({{ $submission->applicant->name }} ,
                        {{ \Carbon\Carbon::parse($submission->submited_at)->translatedFormat(' d F Y') }})
                    </td>
                    <td>
                        @if ($submission->pic_coordinator_id && $submission->pic_check_at)
                            ({{ $submission->pic_status == 'approved' ? 'Approved by:' : 'Rejected by:' }}
                            {{ $submission->picCoordinator->name }},
                            {{ \Carbon\Carbon::parse($submission->pic_check_at)->translatedFormat(' d M Y') }})
                        @else
                            ( )
                        @endif
                    </td>
                    <td>
                        @if ($submission->assessment)
                            <p>( {{ $submission->assessment->status == 'pass' ? 'Pass by:' : 'Fail by:' }}
                                {{ $submission->assessment->qualityInspector->name }},
                                {{ \Carbon\Carbon::parse($submission->pic_check_at)->translatedFormat(' d F Y') }})</p>
                        @else
                            ( )
                        @endif
                    </td>
                </tr>
                <tr style="text-align: center">
                    <td>Engineer</td>
                    <td>PIC/ Coordinator</td>
                    <td>
                        Quality Inspector
                    </td>
                </tr>
            </tbody>

        </table>

        <!-- note -->
        <table style="width: 100%">
            <tr>
                <td style="width:50%">
                    <p style="font-weight: bold">Note :</p>
                    <ul>
                        <li>
                            * please give a check mark in the box selected
                        </li>
                        <li>
                            * the applicant may apply fo examination not less than 30 (thirty)
                            days after the date applicant failed the examination
                        </li>
                        <li>* minimum passing grade for each examination is 70%</li>
                    </ul>

                </td>
                <td style="width: 50%; text-align: center; vertical-align: middle;">
                    <table
                        style="
                            border-collapse: collapse;
                            margin: auto;
                            height: 50px;
                        ">
                        <tr>
                            @if ($submission->assessment)
                                <td
                                    style="
                                    border: 1px solid black;
                                    text-align: center;
                                    vertical-align: middle;
                                    position: relative;
                                    padding: 10px;
                                ">
                                    <input type="checkbox" id="pass"
                                        style="position: absolute; top: 5px; left: 5px;"
                                        {{ $submission->assessment->status == 'pass' ? 'checked' : '' }} />
                                    <label for="pass"
                                        style="font-weight: bold; font-size: 16px; margin-left: 12px;">PASS</label>
                                </td>
                                <td
                                    style="
                                    border: 1px solid black;
                                    text-align: center;
                                    vertical-align: middle;
                                    position: relative;
                                    padding: 10px; 
                                ">
                                    <input type="checkbox" id="fail"
                                        style="position: absolute; top: 5px; left: 5px;"
                                        {{ $submission->assessment->status == 'fail' ? 'checked' : '' }} />
                                    <label for="fail"
                                        style="font-weight: bold; font-size: 16px; margin-left: 12px;">FAIL</label>
                                </td>
                            @else
                                <td
                                    style="
                            border: 1px solid black;
                            text-align: center;
                            vertical-align: middle;
                            position: relative;
                            padding: 10px;
                        ">
                                    <input type="checkbox" id="approved"
                                        style="position: absolute; top: 5px; left: 5px;"
                                        {{ $submission->pic_status == 'approved' ? 'checked' : '' }} />
                                    <label for="approved"
                                        style="font-weight: bold; font-size: 16px; margin-left: 12px;">APPROVED</label>
                                </td>
                                <td
                                    style="
                            border: 1px solid black;
                            text-align: center;
                            vertical-align: middle;
                            position: relative;
                            padding: 10px;
                        ">
                                    <input type="checkbox" id="rejected"
                                        style="position: absolute; top: 5px; left: 5px;"
                                        {{ $submission->pic_status == 'rejected' ? 'checked' : '' }} />
                                    <label for="rejected"
                                        style="font-weight: bold; font-size: 16px; margin-left: 12px;">REJECTED</label>
                                </td>
                            @endif
                        </tr>
                    </table>
                </td>

            </tr>

        </table>

    </div>
</body>

</html>
