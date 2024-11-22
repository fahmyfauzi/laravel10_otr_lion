<div class="alert alert-{{ $type }} alert-dismissible" role="alert">
    @if ($type == 'danger')
        <span><i data-feather="alert-circle" class="me-2"></i></span>
    @else
        <span><i data-feather="check-circle" class="me-2"></i></span>
    @endif
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
