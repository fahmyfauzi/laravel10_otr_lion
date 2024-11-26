@if ($submission->pic_status)
    <span
        class="fw-semibold fs-1 {{ $submission->pic_status == 'approved' ? 'bg-success' : 'bg-danger' }} py-2 px-4 rounded text-white">
        {{ Illuminate\Support\Str::of($submission->pic_status)->upper() }}</span>
@else
    <div class="text-end">
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approvedModal">Approve</button>
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
