  <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © <a href="{{ route('dashboard') }}" target="_blank">SNI AWARD</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('peserta') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('peserta') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{ asset('peserta') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('peserta') }}/js/custom.min.js"></script>
	<script src="{{ asset('peserta') }}/js/deznav-init.js"></script>
	<script src="{{ asset('peserta') }}/vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('peserta') }}/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset('peserta') }}/vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('peserta') }}/js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>

	<!-- Calender -->
	<script src="{{ asset('peserta') }}/vendor/jqueryui/js/jquery-ui.min.js"></script>
    <script src="{{ asset('peserta') }}/vendor/moment/moment.min.js"></script>

    <script src="{{ asset('peserta') }}/vendor/fullcalendar/js/fullcalendar.min.js"></script>
    <script src="{{ asset('peserta') }}/js/plugins-init/fullcalendar-init.js"></script>
</body>
</html>