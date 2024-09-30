<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('/admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5 text-primary">{{ Auth::user()->name }}</h1>
        <p>{{Auth::user()->userType}}</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{url('/admin/dashboard')}}"> <i class="icon-home"></i> {{__('localization.home')}} </a></li>
            <li><a href="{{route('view_catergory')}}"> <i class="icon-grid"></i> {{__('localization.catergory')}} </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i> {{__('localization.manage_product')}} </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('productAdd') }}">{{__('localization.add_product')}}</a></li>
                <li><a href="{{ route('productView') }}"> {{__('localization.view_product')}} </a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
              <li><a href="{{route('view_order')}}"> <i class="icon-grid"></i> {{__('localization.order')}} </a></li>
            </li>
    
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
      <li><a href="#dropDown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user-1"></i> {{__('localization.manage_user')}} </a>
        <ul id="dropDown" class="collapse list-unstyled ">
          <li><a href=" {{ route('userView') }} "> {{__('localization.view_user')}} </a></li>
          <li><a href="#">Page</a></li>
        </ul>
      </li>
      
    </ul>
  </nav>