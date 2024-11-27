<!DOCTYPE html>
<html lang="en"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       
         <title> @yield('title')  | {{$site_settings['site_name']}} </title>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('frontend/favicon.png')}}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/font-electro.css')}}">
        
        <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/hs.megamenu.css')}}">

        <link rel="stylesheet" href="{{asset('frontend/css/jquery.mCustomScrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-select.min.css')}}">

     
        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/noor.css')}}">

        <style>
            #content{
                min-height: 700px !important;
            }
        </style>
        @stack('style')

        



    </head>

    <body>

        <!-- ========== HEADER ========== -->
    	@include('layouts.partials.header')
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        @yield('content')
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
    	@include('layouts.partials.footer')
      
        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->
        <!-- Account Sidebar Navigation -->
    
       
        <!-- End Account Sidebar Navigation -->
        <!-- ========== END SECONDARY CONTENTS ========== -->

        <!-- Go to Top -->
        <a class="js-go-to u-go-to" href="#"
            data-position='{"bottom": 15, "right": 15 }'
            data-type="fixed"
            data-offset-top="400"
            data-compensation="#header"
            data-show-effect="slideInUp"
            data-hide-effect="slideOutDown">
            <span class="fas fa-arrow-up u-go-to__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- JS Global Compulsory -->
        <script src="{{asset('frontend/js/vendor/jquery.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery-migrate.min.js')}}"></script>
        <script src="{{asset('frontend/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
        {{-- <script src="{{asset('frontend/js/vendor/popper.js')}}"></script> --}}
        <script src="{{asset('frontend/js/vendor/bootstrap.min.js')}}"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{asset('frontend/js/vendor/appear.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/hs.megamenu.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/svg-injector.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.validate.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/typed.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/slick.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/bootstrap-select.min.js')}}"></script>
        

        <!-- JS Electro -->
        <script src="{{asset('frontend/js/hs.core.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.countdown.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.header.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.hamburgers.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.unfold.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.focus-state.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.malihu-scrollbar.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.validation.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.fancybox.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.onscroll-animation.js')}}"></script>
      
        <script src="{{asset('frontend/js/components/hs.slick-carousel.js')}}"></script>

        
        
         {{-- <script src="{{asset('frontend/js/components/hs.quantity-counter.js')}}"></script> --}}


        <script src="{{asset('frontend/js/components/hs.show-animation.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.svg-injector.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.go-to.js')}}"></script>
        <script src="{{asset('frontend/js/components/hs.selectpicker.js')}}"></script>

   

        


     
        <!-- JS Plugins Init. -->
       
        <script>


              // console.log($(".noorCartTotal").text());
              $(document).on("click",".prodcut-add-cart .noorAddToCart",function(e){
                  e.preventDefault();
                  let route = $(this).data('route');
                  $.get(route,function(data){
                      // console.log(data);
                      if(data.stock_limit){

                        var gTotal = parseFloat(data.getTotal).toFixed(2);
                        gTotal = new Intl.NumberFormat().format(gTotal)
							$(".noorCartTotal").text(gTotal); 
						    $(".noorCartTotalQuantity").text(parseInt(data.totalQuantity));
							success('Cart Added');
					}else{
						error('Out of Stock..');
					}
								
					return false;
                  }).catch(function(err){
                   
                  })
             
              })
        

          

// $(document).ready(function(){
             
// 			  $(".noorAddToCart").each(function(index) {
// 					$(this).on("click", function(e){
// 						console.log(1)
// 						e.preventDefault();
//                   let route = $(this).data('route');
//                   $.get(route,function(data){
//                       console.log(data);
                     
//                       $(".noorCartTotal").text(parseFloat(data.getTotal).toFixed(2)); 
//                       $(".noorCartTotalQuantity").text(parseInt(data.totalQuantity)); 
//                       success('Cart Added');
//                   })
                  
// 					});
// 				});
         

//           })



      $(window).on('load', function () {
          // initialization of HSMegaMenu component
          $('.js-mega-menu').HSMegaMenu({
              event: 'hover',
              direction: 'horizontal',
              pageContainer: $('.container'),
              breakpoint: 767.98,
              hideTimeOut: 0
          });
      });
      

      $(document).on('ready', function () {
          // initialization of header
          $.HSCore.components.HSHeader.init($('#header'));

          // initialization of animation
          $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

          // initialization of unfold component
          $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
              afterOpen: function () {
                  $(this).find('input[type="search"]').focus();
              }
          });

        

          // initialization of popups
          $.HSCore.components.HSFancyBox.init('.js-fancybox');

          
          // initialization of quantity counter
          // $.HSCore.components.HSQantityCounter.init('.js-quantity');

          // initialization of countdowns
          var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
              yearsElSelector: '.js-cd-years',
              monthsElSelector: '.js-cd-months',
              daysElSelector: '.js-cd-days',
              hoursElSelector: '.js-cd-hours',
              minutesElSelector: '.js-cd-minutes',
              secondsElSelector: '.js-cd-seconds'
          });

          // initialization of malihu scrollbar
          $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

          // initialization of forms
          $.HSCore.components.HSFocusState.init();

          // initialization of form validation
          $.HSCore.components.HSValidation.init('.js-validate', {
              rules: {
                  confirmPassword: {
                      equalTo: '#signupPassword'
                  }
              }
          });

            // initialization of forms
          

          // initialization of show animations
          $.HSCore.components.HSShowAnimation.init('.js-animation-link');

          // initialization of fancybox
          $.HSCore.components.HSFancyBox.init('.js-fancybox');

          // initialization of slick carousel
          $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

          // initialization of go to
          $.HSCore.components.HSGoTo.init('.js-go-to');

         

          // initialization of hamburgers
          $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

          // initialization of unfold component
          $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
              beforeClose: function () {
                  $('#hamburgerTrigger').removeClass('is-active');
              },
              afterClose: function() {
                  $('#headerSidebarList .collapse.show').collapse('hide');
              }
          });

          $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
              e.preventDefault();

              var target = $(this).data('target');

              if($(this).attr('aria-expanded') === "true") {
                  $(target).collapse('hide');
              } else {
                  $(target).collapse('show');
              }
          });

          // initialization of unfold component
          $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

          // initialization of select picker
          $.HSCore.components.HSSelectPicker.init('.js-select');
      });






  </script>

@stack('script')


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fbe379e920fc91564ca7f15/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<script type="text/javascript">



  $(document).ready(function () {
  // $(".navBtn").on("click", function (e) {
  //   $(".nav-list").toggleClass("nav-active");
  //   }).o


  $(".nav-list > li > a ").on("click", function (e) {
    $(this).next().slideToggle();
    $(".nav-list > li > a ").not(this).next().slideUp();
  })



  $(".nav-list > li > ul > li > a ").on("click", function (e) {
    
    $(this).next().slideToggle();
    $(".nav-list > li > ul > li > a ").not(this).next().slideUp();
  })


});








  </script>
  <!--End of Tawk.to Script-->

  {{-- @include('layouts.partials.snackbar') --}}

  <div id="snackbar" class="snackbar">
    <i id="icon" style="font-size:20px;padding:5px;"></i>
      <span class="snackbar"></span>
    
      <span style="cursor:pointer" onclick="this.parentElement.style.display='none'" class="">&times;</span>
    </div>


  

  <script src="{{asset('frontend/js/snackbar.js')}}"></script>

    </body>
</html>
