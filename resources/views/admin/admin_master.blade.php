<!DOCTYPE html>
<html lang="en">
@include('admin.include.head')
<body style="padding-top: 0;">
<div id="wrapper">
    @include('admin.include.nav')
    <!-- CONTENT -->
    <div id="page-wrapper">
        {{--main content start--}}
        @yield('main-content')
        {{--main content ends--}}
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center footer2">
                    <ul class="list-inline socials">
                        <li><a class="btn btn-facebook" href="https://www.facebook.com/27colours" target="blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="btn btn-twitter" href="https://twitter.com/27colours" target="blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="btn btn-facebook" href="https://instagram.com/27colours/" target="blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <p>Copyright &copy;
                        <script type="text/javascript">
                            var currentYr = new Date();
                            var insertYr = currentYr.getFullYear();
                            document.write(insertYr);
                        </script>,
                        27Colours - All Rights Reserved.
                    </p>
                </div>
            </div>
        </div> <!-- ./ container -->
    </footer>
</div> <!-- ./ page -->

<!-- jQuery Version 2.1.3 -->
<script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('admin-assets/plugins/metisMenu/dist/metisMenu.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('admin-assets/js/sb-admin-2.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@yield('scripts')
</body>
</html>