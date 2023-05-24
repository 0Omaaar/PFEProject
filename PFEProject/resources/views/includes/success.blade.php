@if (session()->has('success'))
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 0px;">
        <div class="toast bg-light" role="alert" aria-live="assertive" aria-atomic="true"
            style="position: absolute; top: 0px; right: 0px;">
            <div class="toast-header">
                <strong class="mr-auto">Succes</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"
                    style="margin-left: 250px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
            $('.toast .close').click(function() {
                $(this).closest('.toast').toast('hide');
            });
        });
    </script>
@endif
