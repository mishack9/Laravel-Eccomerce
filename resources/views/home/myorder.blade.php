



<!DOCTYPE html>
<html lang="en">
   <head>
    <style>
        .img
{
    width:40px;
    border-radius: 7px 5px 2px;
}
    </style>
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
     


      <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="container-fluid mb-4">
                    <h1 class="fashion_taital">Orders</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                    

                          <div class="col-lg-12 col-sm-6 col-xl-12 col-md-8">
                            <div class="box_main">
                               <h4 class="shirt_text">{{-- {{$data->product_title}} --}}</h4>
                               <p class="price_text"> Orders items  <span style="color: rgb(60, 255, 34);"> {{-- {{$data->price}} --}}</span></p>
                               <div class="tshirt_img">
                               
                                

                                <div class="table-responsive mb-5">
                                    <table class="table table-sm px-2 py-2">
                                      <thead>
                                        <tr>
                                          <th class="" scope="col">#</th>
                                          <th class="" scope="col">Customer_Name</th>
                                          <th class="" scope="col">Address</th>
                                          <th class="" scope="col">Product</th>
                                          <th class="" scope="col">Product_image</th>
                                          <th class="" scope="col">Price</th>
                                          <th class="" scope="col">phone</th>
                                          <th class="" scope="col">Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                    
                                          @foreach ($order as $data)
                                          <tr>
                                          <th scope="row">{{ $data->id }}</th>
                                          <td>{{ $data->name }}</td>
                                          <td>{{ $data->rec_addres }}</td>
                                          <td>{{ $data->product->product_title }}</td>
                                          <td class = "text-center"><img src="/products_images/{{ $data->product->image }}" alt="" class="img"></td>
                                          <td> $ {{ $data->product->price }}</td>
                                          <td>{{ $data->phone }}</td>
                                          <td class = "text-center">
                                            @if ($data->status == 'Sent')
                                                <span style="color:coral">{{ $data->status }}</span>
                                            @elseif($data->status == 'Processing')
                                                <span style="color:rgb(233, 8, 158)">{{ $data->status }}</span> 
                                            @else
                                                <span style="color:rgb(73, 170, 136)">{{ $data->status }}</span> 
                                            @endif
                                          </td>
                                        </tr>
                                        
                                          @endforeach
                                       
                                      </tbody>
                                    </table>
                            
                                   </div>

                                  {{--  <div class="text-center" style="justify-content: center; display:flex; align-items:center">
                                    {{$order->onEachSide(4)->links()}}
                                  </div> --}}

                            
                               </div>
                               <div class="btn_main">
                                  <div class="buy_bt">{{-- <a href="#">Total price : $ <</a> --}} </div>
                                  <div class="seemore_bt">{{-- <a href="{{route('seemore', $data->id)}}">See More</a> --}}</div>
                               </div>
                            </div>
                         </div>
                                 
                       
                       </div>
                    </div>
                 </div>
              </div>
            
           </div>
        {{--    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
           <i class="fa fa-angle-left"></i>
           </a>
           <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
           <i class="fa fa-angle-right"></i>
           </a> --}}
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




















