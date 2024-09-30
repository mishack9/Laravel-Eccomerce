<!DOCTYPE html>
<html lang="en">
   <head>
    
    @include('home.includes.css')

   </head>

   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->

        @include('home.includes.header')

         <!-- header top section start -->
    
      </div>
      <!-- banner bg main end -->
     
       


      <!-- footer section start -->
      
       @include('home.includes.footer')

      <!-- footer section end -->
     
      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html>