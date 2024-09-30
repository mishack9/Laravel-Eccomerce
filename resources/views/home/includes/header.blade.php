<div class="container">
    <div class="header_section_top">
       <div class="row">
          <div class="col-sm-12">
             <div class="custom_menu">
                <ul>
                   <li><a href="#">Best Sellers</a></li>
                   <li><a href="#">Gift Ideas</a></li>
                   <li><a href="#">New Releases</a></li>
                   <li><a href="#">Today's Deals</a></li>
                   <li><a href="#">Customer Service</a></li>
                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>


     
         <!-- logo section start -->
      
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html">{{-- <img src="{{ asset('images/logo.png') }}"> --}}</a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->


          <!-- header section start -->
<div class="header_section">
    <div class="container">
       <div class="containt_main">
          <div id="mySidenav" class="sidenav">
             <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             <a href="{{url('/')}}">Home</a>
             <a href="{{ route('AllProduct') }}">Products</a>
             <a href="">Feature</a>
             <a href="{{ route('contactus') }}">Contact</a>
             <a href="">About Us</a>
          </div>
          <span class="toggle_icon" onclick="openNav()"><img src="{{asset('images/toggle-icon.png')}}"></span>
          <div class="dropdown">
             <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
             </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               @foreach ($catergory as $data)
                  <a class="dropdown-item" href="#">{{$data->catergory_title}}</a>
               @endforeach
             </div>
          </div>
          <div class="main">
             <!-- Another variation with a button -->
                 <form action="{{route('searchProduct')}}" method="get">
                  @csrf
             <div class="input-group">
                <input type="text" name = "search" class="form-control" placeholder="Search this blog">
                <div class="input-group-append">
                   <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                   <i class="fa fa-search"></i>
                   </button>
                </div>
             </div>
            </form>
          </div>
          <div class="header_box">
             <div class="lang_box ">
                <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                <img src="{{ asset('images/flag-uk.png') }}" alt="flag" class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu ">
                   <a href="#" class="dropdown-item">
                   <img src="images/flag-france.png" class="mr-2" alt="flag">
                   French
                   </a>
                </div>
             </div>
             <div class="login_menu">
                <ul>

                  @if (Route::has('login'))
                     @auth
                   
                   <li class="mx-4 ml-4"><a href="{{route('myCart')}}">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>{{$cart_count}}
                      <span class="padding_10">Cart</span></a>
                   </li>

                   <li class="mx-4 ml-4"><a href="{{route('myOrder')}}">
                     <i class="fa fa-mark" aria-hidden="true"></i>
                     <span class="padding_10">Orders</span></a>
                  </li>

                   <li class="mx-4 ml-4">
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="Logout" name="" id="">
                     </form>
                   </li>

                   @else

                   <li class="mx-4 ml-4"><a href="{{ route('register') }}">
                     <i class="fa fa-users" aria-hidden="true"></i>
                     <span class="padding_10">Register</span></a>
                  </li>
                   <li class="mx-4 ml-4"><a href="{{ route('login') }}">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span class="padding_10">Login</span></a>
                   </li>
     
                   @endauth
                   @endif

                </ul>
             </div>
          </div>
       </div>
    </div>
 </div>
          <!-- header section end -->


           <!-- banner section start -->
           <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
   
            <!-- banner section end -->
