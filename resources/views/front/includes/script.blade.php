

{{-- <script type="text/javascript" src="{{ asset('frontEnd/js/jquery-3.5.1.min.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script type="text/javascript" src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontEnd/js/kl-plugins.js') }}"></script>

{{-- <script type="text/javascript" src="{{ asset('frontEnd/js/jquery.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('frontEnd/js/plugins/scrollme/jquery.scrollme.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontEnd/js/plugins/_sliders/ios/jquery.iosslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontEnd/js/trigger/slider/ios/kl-ios-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontEnd/js/trigger/kl-recent-work-carousel3.js') }}"></script>
<script type="text/javascript"
	src="{{ asset('frontEnd/js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontEnd/js/trigger/kl-screenshot-box.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontEnd/js/trigger/kl-partners-carousel.js') }}"></script>


<script type="text/javascript" src="{{ asset('frontEnd/js/kl-scripts.js') }}"></script>

<script type="text/javascript" src="{{ asset('frontEnd/js/kl-custom.js') }}"></script>









  <!-- JS FILES // These should be loaded in every page -->
	{{-- <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script> --}}
	{{-- <script type="text/javascript" src="{{asset('assets/js/kl-plugins.js')}}"></script> --}}
	<!-- Required js scripts files for iCarousel slider element -->
	{{-- <script type="text/javascript" src="{{asset('assets/js/plugins/_sliders/icarousel/icarousel.packed.js')}}"></script> --}}
	<script type="text/javascript" src="{{asset('assets/js/plugins/_sliders/icarousel/jquery.mousewheel.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/_sliders/icarousel/raphael-min.js')}}"></script>
	<!-- Custom user JS codes -->
	{{-- <script type="text/javascript" src="{{asset('assets/js/kl-custom.js')}}"></script> --}}

	<!-- Modernizr script -->
	<script type="text/javascript">
		//use the modernizr load to load up external scripts. This will load the scripts asynchronously, but the order listed matters. Although it will load all scripts in parallel, it will execute them in the order listed
		Modernizr.load([
			{
				// test for media query support, if not load respond.js
				test : Modernizr.mq('only all'),
				// If not, load the respond.js file
				nope : '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js'
			}
		]);
	</script>
	<!-- CarouFredSel required js script for Partner / Featured products carousel elements -->
	{{-- <script type="text/javascript" src="{{asset('assets/js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js')}}"></script> --}}

  <!-- Custom Kallyas JS codes -->
	{{-- <script type="text/javascript" src="{{asset('assets/js/kl-scripts.js')}}"></script> --}}

	<!-- Required js trigger for Recent Work Carousel style 3 element -->
	<script type="text/javascript" src="{{asset('assets/js/trigger/kl-recent-work-carousel3.js')}}"></script>

	<!-- Required js script file for Animated sparkles element -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/sparkles.js')}}"></script>
	<!-- Required jQuery migrate plugin for Animated sparkles element -->



{{--
	<script type="text/javascript" src="{{asset('assets/js/jquery-migrate.min.js')}}"></script> --}}




	{{-- <script type="text/javascript" src="{{asset('assets/js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js')}}"></script> --}}
	<script type="text/javascript" src="{{asset('assets/js/trigger/slider/caroufredsel/circular-catalogue/kl-circular-catalogue.js')}}"></script>


	<!-- Required script for sorting (masonry) elements - Isotope filter -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/jquery.isotope.min.js')}}"></script>
	<!-- Required js trigger for Portfolio sortable element -->
	<script type="text/javascript" src="{{asset('assets/js/trigger/kl-portfolio-sortable.js')}}"></script>

<script type="text/javascript">

$(function(){
    // $('#txtSearch').on('keyup', function(){

      $('#txtSearch').keyup(function(){

				var text = $('#txtSearch').val();

				$.ajax({
					type:"GET",
					url: '/search-results',
					data: {text: text},
					success: function(data) {
						console.log(data);
						$('#result').html(data);
					}
				});
			});
  });

  function insertData() {
    var Rcate=$("#Rcate").val();
    var Rname=$("#Rname").val();
    var Remail=$("#Remail").val();
    var Rtext=$("#Rtext").val();


// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "insert-data.php",
            data: {Rcate:Rcate,Rname:Rname,Remail:Remail,Rtext:Rtext},
            dataType: "JSON",
            success: function(data) {
            $("#message").html(data);
            $("#message").addClass("alert alert-success");
            },
            error: function(err) {
            alert(err);
            }
        });
$('form').submit(function() {
  return false;
});
}

</script>
<script type="text/javascript">

  function insertData2() {
    var Rusername =$("#Rusername").val();
    var Reemail =$("#Reemail").val();
    var Rpass =$("#Rpass").val();
    var Rrepass =$("#Rrepass").val();


// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "signup.php",
            data: {Rusername:Rusername,Reemail:Reemail,Rpass:Rpass,Rrepass:Rrepass},
            dataType: JSON,
            success: function(data){
            $("#message2").html(data);
            //$("#message2").addClass("alert alert-danger");
            },
            error: function(err) {
            alert(err);
            }
        });
$('form').submit(function() {
  return false;
});
}


  function insertData3() {
    var lusername =$("#lusername").val();
    var lpassword =$("#lpassword").val();
// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "login.php",
            data: {lusername:lusername,lpassword:lpassword},
            dataType: "JSON",
            success: function(data){
			if(data === '"success"' || data === 'success'){
				window.location.href = "#"+lusername;
			}else{
				$("#message3").html(data);
			}
            },
            error: function(err) {
            alert(err);
            }
        });

$('form').submit(function() {
  return false;
});
}


  function insertData4() {
    var forgotemail =$("#forgotemail").val();
// AJAX code to send data to php file.
        $.ajax({
            type: "POST",
            url: "forgotmail.php",
            data: {forgotemail:forgotemail},
            dataType: JSON,
            success: function(data){
            $("#message3").html(data);
            //$("#message2").addClass("alert alert-danger");
            },
            error: function(err) {
			$("#message3").html(err);
            }
        });
$('form').submit(function() {
  return false;
});
}
</script>










<!-- Ajax search code -->
<!-- Ajax search code -->

<script type="application/javascript">



	$(document).ready(function(){

		  });
</script>





<!-- JS FILES // These should be loaded in every page -->
















