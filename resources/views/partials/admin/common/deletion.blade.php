<form id="deletion-form" style="display: none" method="post">
    @csrf
    @method('delete')
</form>

@push('scripts')
    <script defer>
        const deleteItem = function () {
            event.preventDefault();

            let confirmation = confirm("Уверены?");
            let deletionForm = document.getElementById('deletion-form');

            if (confirmation) {
                deletionForm.setAttribute('action', event.target.closest('a').href);
                deletionForm.submit();
            }
        }
    </script>
@endpush
