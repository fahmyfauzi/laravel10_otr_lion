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
