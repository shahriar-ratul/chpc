<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('item.index')}}" class="nav-link">Item</a>
        </li> 
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('card.index')}}" class="nav-link">Card</a>
        </li> 
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('customer.index')}}" class="nav-link">Customer</a>
        </li> 
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('service.index')}}" class="nav-link">Service</a>
        </li>  
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('service.payment')}}" class="nav-link">Make Payment</a>
        </li>        
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('service.payment.index')}}" class="nav-link">View Payment</a>
        </li>
      

      </ul>
  


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form1').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
          </a>
        </li> --}}
      </ul>
  

    </nav>
    <!-- /.navbar -->
  
    <section>
      <!-- Left Sidebar -->
  
      