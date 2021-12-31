
        <!-- jQuery  -->
        <script src="{{ asset('assets/en/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/en/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/en/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/en/js/detect.js') }}"></script>
        <script src="{{ asset('assets/en/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/en/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/en/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/en/js/waves.js') }}"></script>
        <script src="{{ asset('assets/en/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/en/js/jquery.scrollTo.min.js') }}"></script>
        @toastr_js
        @toastr_render
        <!--Morris Chart-->
        {{-- <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script> --}}
        <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

        <!-- dashboard js -->
        {{-- <script src="{{ asset('assets/en/pages/dashboard.int.js') }}"></script> --}}

        @yield('js')
        <!-- App js -->
        <script src="{{ asset('assets/en/js/app.js') }}"></script>
{{-- image preview --}}
<script>
    $(".img").change(function(){
        if(this.files && this.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $(".img-preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
