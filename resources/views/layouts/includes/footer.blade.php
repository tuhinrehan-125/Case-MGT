{{-- </div> --}}
</div>
</div>
<!-- right-content ends-->

</div>
<!-- lr-section ends -->
<!-- site-footer starts -->
<div class="footer-widgets section-padding">
    <div class="container">
        <div class="row widgets justify-content-center">
            <div class="col-lg-4 col-md-4 sigle-widget" style="padding: 10px;">
                <div class="about">
                    <h3>ABOUT</h3>
                    <div class="info" style="margin-top: -8px;">
                        <p class="text-justify">Dhaka Cantonment was declared in 1952 vide Gazette Notification No 425(A)52. It was measured 430.31 acre in 1952. At present the area of Dhaka Cantonment Board is 3804.9145 Acre, which is sorrunded by Dhaka North City Corporation.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 sigle-widget" style="line-height: 8px;padding: 10px;">
                <div class="contact-info">
                    <h3>CONTACT INFORMATION</h3>
                    <div class="info">
                        <p><span>Phone </span><span>:</span> 02-9835595 (T&T), 7210 (Army) </p>
                        <p><span>Web </span><span>:</span> <a href="http://www.dcb.gov.bd/" target="_blank"> http://www.dcb.gov.bd/</a></p>
                        <p><span>Email </span><span>:</span> ceocbd@gmail.com</p>
                        <p><span>Location</span> <span>:</span> Dhaka Cantonment, Dhaka-1206</p>
                    </div>

                </div>

            </div>
            <!-- <div class="col-lg-4 col-md-4 sigle-widget">
                <div class="copyright">
                    <h3>&nbsp;</h3>
                    <p>Copyright © 2019 Dhaka Cantonment, Dhaka<br>
                        Unique Visits: 2283986</p>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="top-footer d-none">
    <div id="printable_area " class="row justify-content-center">
        <div class=" col-sm-6 col-md-2 col-lg-2">
            <p class="text-center text-white" style="font-size: 40px">Contact</p>

        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 text-white">
            <p>Dhaka Cantonment, Dhaka-1206.
                Phone : 02-9835595 (T&amp;T), 7210 (Army),
                email: ceocbd@gmail.com,
                Website: http://www.dcb.gov.bd/ <a href="http://www.dcb.gov.bd/" target="_blank"> Click Here</a>
            </p>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="copyright">
                    Copyright &copy; 2021. All rights reserved.
                </div>
            </div>

            <div class="col-lg-6">
                <div class="developedby text-right align-middle">
                    Designed and Developed by OrionisBd Team
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- site-footer ends -->
<a class="scrolltotop" href="#site-wrappper" style="display: block;">
    <i class="fa fa-angle-double-up"></i>
</a>
</div>
<!-- site-wrappper ends -->
<!-- JS Files -->
<script src="{{asset('/frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="{{asset('/frontend/customjs/custom.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="{{asset('/backend/plugins\select2\js\select2.full.min.js')}}"></script>
@yield('js')
<script>
    $(document).ready(function() {
        $('.table-data').DataTable();

        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });

        // In your Javascript (external .js resource or <script> tag)
        $('.select-opion').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>

{!! Toastr::message() !!}
@yield('js')

</body>

</html>
