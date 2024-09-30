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
      <!-- product section start -->
      
       

      <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="container">
                    <h1 class="fashion_taital">Available Products</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                                  @foreach($products as $data)
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">{{$data->product_title}}</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ {{$data->price}}</span></p>
                                <div class="tshirt_img"><img src="/products_images/{{$data->image}}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="{{route('addToCart', $data->id)}}">Add to cart</a></div>
                                   <div class="seemore_bt"><a href="{{route('seemore', $data->id)}}">See More</a></div>
                                </div>
                             </div>
                          </div>
                                  @endforeach
                   
           </div>
      
        </div>

      

     </div>
    
    
    
    
    
    <div class="mb-3 mt-3 pagination my-5 ml-4 mr-4 mx-5">
         {{$products->onEachSide(3)->links()}}
    </div>
    
    
    

      <!-- product  section end -->


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