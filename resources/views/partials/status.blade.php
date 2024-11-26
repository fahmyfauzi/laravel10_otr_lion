@if ($submission->pic_status !== 'rejected')
    @if ($submission->assessment)
        <span
            class="fw-semibold fs-1 {{ $submission->assessment->status == 'pass' ? 'bg-success' : 'bg-danger' }} py-2 px-4 rounded text-white">
            {{ Illuminate\Support\Str::of($submission->assessment->status)->upper() }}</span>
    @else
        <span class="fw-semibold fs-1 bg-secondary py-2 px-4 rounded text-white">Not yet checked</span>
    @endif
@else
    <span
        class="fw-semibold fs-1 {{ $submission->pic_status == 'approved' ? 'bg-success' : 'bg-danger' }} py-2 px-4 rounded text-white">
        {{ Illuminate\Support\Str::of($submission->pic_status)->upper() }}</span>

@endif
