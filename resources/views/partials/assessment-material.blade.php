<!-- assessment -->
<div class="mb-5">
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th colspan="2">Assessment Material</th>
                <th class="text-center">Percentage <br> Value</th>
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
                    <span class="d-block mt-3" class="mt-2">
                        {{ $submission->assessment->assessment_material_6 ?? '-' }} %
                    </span>
                    <span class="d-block">
                        {{ $submission->assessment->assessment_material_7 ?? '-' }} %
                    </span>
                    <span class="d-block">
                        {{ $submission->assessment->assessment_material_8 ?? '-' }} %
                    </span>
                    <span class="d-block">
                        {{ $submission->assessment->assessment_material_9 ?? '-' }} %
                    </span>
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
                    {{ $submission->assessment->assessment_material_10 ?? '-' }} %
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
                    {{ $submission->assessment->assessment_material_11 ?? '-' }} %
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
                    {{ $submission->assessment->assessment_material_12 ?? '-' }} %
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
