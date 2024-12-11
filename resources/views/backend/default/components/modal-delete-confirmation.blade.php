<div>
    <div class="modal fade"  id="modalDeleteConfirmation">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('Konfirmasi') }}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <input type="hidden" name="id" id="id">
                    <h6>{{ __('Apakah kamu yakin akan menghapus data ini?') }}</h6>
                    <p class="text-muted mb-0">{{ __('Data yang akan dihapus tidak dapat dikembalikan!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-delete" class="btn btn-danger btn-wave" data-bs-dismiss="modal">
                        <i class="bx bx-trash"></i>
                        {{ __('Ya. Hapus!') }}
                    </button>
                    <button class="btn btn-light btn-wave" data-bs-dismiss="modal" >
                        <i class="bx bx-x"></i>
                        {{ __('Batal') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('showModalDeleteConfirmation', event => {
        $('#modalDeleteConfirmation #id').val(event.detail[0].id);
    });

    $(document).ready(function() {
        $(document).on('click', '#btn-delete', function() {
            const id = $('#modalDeleteConfirmation #id').val();
            Livewire.dispatch('deleteAction', { id: id });
        })
    });
</script>
