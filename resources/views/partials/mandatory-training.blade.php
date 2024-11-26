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
