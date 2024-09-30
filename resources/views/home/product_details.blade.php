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
     






<div class="jewellery_section mt-5">
    <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container mt-5">
                <h1 class="fashion_taital" style="color: coral">Product Details</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      <div class="col-lg-7 col-sm-7">
                         <div class="box_main">
                            <h4 class="shirt_text">{{$details->product_title}}</h4>
                           {{--  <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p> --}}
                            <div class="jewellery_img "><img src="/products_images/{{$details->image}}" width="410px"></div>
                            {{-- <div class="btn_main">
                               <div class="buy_bt"><a href="#">Buy Now</a></div>
                               <div class="seemore_bt"><a href="#">See More</a></div>
                            </div> --}}
                         </div>
                      </div>

                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            {{-- <h4 class="shirt_text">Necklaces</h4> --}}
                            <p class="price_text">Catergory:  <span style="color: #262626;">{{ $details->catergory }}</span></p>
                            <div class="jewellery_img"><p class="price_text"> Description:  <span style="color: #262626;">{{ $details->description }}</span></p></div>
                            <div class="btn_main">
                               <div class="buy_bt"><a href="{{route('addToCart', $details->id)}}">Add to cart</a></div>
                               <div class="seemore_bt"><p class="price_text">  Price  <span style="color: #262626;">$ {{ $details->price }}</span></p></div>
                            </div>
                         </div>
                      </div>
                     
                   </div>
                </div>
             </div>
          </div>
        






       </div>
      {{--  <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
       <i class="fa fa-angle-left"></i>
       </a>
       <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
       <i class="fa fa-angle-right"></i>
       </a> --}}
       <div class="loader_main">
          <div class="loader"></div>
       </div>
    </div>
 </div>







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