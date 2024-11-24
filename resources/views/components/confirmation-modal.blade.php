<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $modalId }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $message }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Form untuk menangani aksi -->
                <form method="POST" action="{{ $action }}" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="{{ $statusValue }}">
                    <button type="submit" class="btn btn-primary">Confirmation</button>
                </form>
            </div>
        </div>
    </div>
</div>
