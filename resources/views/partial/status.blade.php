@if(session('status'))
        <script>
            swal("{{session('status')}}", {
                icon :"success",
                timer : 3000,
            });
        </script>
@endif

@if(session('warning'))
        <script>
            swal("{{session('warning')}}", {
                icon :"warning",
                timer : 3000,
            });
        </script>
@endif

@if(session('error'))
        <script>
            swal("{{session('error')}}", {
                icon :"error",
                timer : 3000,
            });
        </script>
@endif