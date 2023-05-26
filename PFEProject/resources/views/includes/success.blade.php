@if (session()->has('success'))
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
            style="border-Left: 5px solid green ; position: absolute; top: 20px; right:30px   ">
            <div class="toast-header">
                <strong class="mr-auto">Succes</strong>
                <button type="button" class="fa fa-times close" data-dismiss="toast" aria-label="Close"
                    style="margin-left: 250px;">
                </button>
            </div>
            <div class="toast-body fw-bolder">
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
