



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
     


      <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="container-fluid mb-4">
                    <h1 class="fashion_taital">Cart</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                               
                          <div class="col-lg-4 col-xl-4 col-sm-6 col-md-4">
                             <div class="box_main">
                                <h4 class="shirt_text">{{-- {{$data->product_title}} --}}</h4>
                                <p class="price_text">User data  <span style="color: #462626;"> {{-- {{$data->price}} --}}</span></p>
                                <div class="tshirt_img">{{-- <img src="/products_images/{{$data->image}}"> --}}
                                <form action="{{route('place_order')}}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Username</label>
                                        <input type="text" class="form-control" readonly id="floatingInput" name = "name" value="{{Auth::user()->name}}">
                                      
                                      </div>
                                      <div class="form-floating">
                                        <label for="floatingPassword">Rec_Address</label>
                                        <input type="text" class="form-control" readonly id="floatingPassword" name = "rec_addres" value="{{Auth::user()->address}}">
                                       
                                    </div>
                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Phone Number</label>
                                        <input type="text" class="form-control" readonly id="floatingInput" name = "phone" value="{{Auth::user()->phone}}">
                                        <?php
                                             $value = 0;
                                        ?>
                                        @foreach ($cart_data as $cartdata)
                                        <?php
                                        $value = $value + $cartdata->product->price;
                                        ?>
                                        @endforeach
                                        <input type="hidden" name="price" value="<?php echo $value ?>" id="">

                                      </div>
                                     <div class="mt-4">
                                        <button type="submit" class = "btn btn-warning text-white">Delivery</button>
                                     </div>
                                </form>
                                </div>
                                <div class="btn_main">
                                   <div class="buy_bt">{{-- <a href="{{route('addToCart', $data->id)}}">Add to cart</a> --}}</div>
                                   <div class="seemore_bt">{{-- <a href="{{route('seemore', $data->id)}}">See More</a> --}}</div>
                                </div>
                             </div>
                          </div>


                          <div class="col-lg-8 col-sm-6 col-xl-8 col-md-8">
                            <div class="box_main">
                               <h4 class="shirt_text">{{-- {{$data->product_title}} --}}</h4>
                               <p class="price_text"> Cart items  <span style="color: rgb(60, 255, 34);"> {{-- {{$data->price}} --}}</span></p>
                               <div class="tshirt_img">
                                <table class="table table-warning table-striped">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Product</th>
                                          <th scope="col">Price</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Operation</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                               <?php
                                                     $value = 0;
                                               ?>
                                     @foreach ($cart_data as $data)
                                     <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->product->product_title }}</td>
                                        <td>${{ $data->product->price }}</td>
                                        <td><img src="/products_images/{{$data->product->image}}" width="60px" alt=""></td>
                                        <td><a href="{{route('deleteCart', $data->id)}}" onclick="confirmation(event)" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                    </tr>

                                    <?php
                                       
                                       $value = $value + $data->product->price;

                                          ?>

                                             <form action="{{route('paypal')}}" method = "post" >
                                             @csrf

                                             <input type="text" value="{{$data->product->product_title}}" name="product_name" id="">

                                             <input type="text" value="{{$data->quantity}}" name="quantity" id="">

                                             <input type="text"  name="price" id="" value="<?php  echo $value  ?>">
                                     
                                    @endforeach
                                    
                                      </tbody>
                                  </table>

                                 
   
                                    <button type="submit" class = "btn btn-success">Pay with PayPal</button>
   
                                 </form>
                       

                               </div>


                               <div class="btn_main">
                                  <div class="buy_bt"><a href="#">Total price : $ <?php echo $value ?></a> </div>
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
     <!--  sweet alert cdn link -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
      integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
       crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <!-- sweet alert script -->
       <!-- sweet alert script -->
<script type="text/javascript">

   function confirmation(ev)
   {
 
     ev.preventDefault();
     var urlToRedirect = ev.currentTarget.getAttribute('href');
     console.log(urlToRedirect);
 
     swal({
      
           title: "Are You Sure You Want To Remove This Product ?",
           text: " !!!!! ",
           icon: "warning",
           buttons: true,
           dnagerMode: true,
 
     })
 
               .then((willCancel)=>{
 
                   if(willCancel)
                     {
                       window.location.href=urlToRedirect;
                     }
 
               });
 
   }
 
 </script>
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




















