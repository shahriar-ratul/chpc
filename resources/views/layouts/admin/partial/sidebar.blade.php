  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('/admin/')}}/dist/img/AdminLTELogo.png" alt="CHPC Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CHPC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/admin/')}}/dist/img/male.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h6 class="d-block text-light"> {{ Auth::user()->name }} </h6>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Customers
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('customer.index')}}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customer.create')}}" class="nav-link">

                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add New Customer</p>
                </a>
              </li> 
              

            </ul>
          </li>          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-credit-card nav-icon"></i>
              <p>
                Card
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('card.index')}}" class="nav-link">
                <i class="fas fa-credit-card nav-icon"></i>
                  <p>View Card</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('card.create')}}" class="nav-link">

                  <i class="fas fa-credit-card nav-icon"></i>
                  <p>Add New Card</p>
                </a>
              </li>

            </ul>
          </li>         

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-folder-open  nav-icon"></i>
              <p>
                Item
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('item.index')}}" class="nav-link">
                <i class="fas fa-folder-open  nav-icon"></i>
                  <p>View Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('item.create')}}" class="nav-link">

                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add New Item</p>
                </a>
              </li>

            </ul>
          </li>   

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-folder-open  nav-icon"></i>
              <p>
                Service
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('service.index')}}" class="nav-link">
                <i class="fas fa-folder-open  nav-icon"></i>
                  <p>View Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service.create')}}" class="nav-link">

                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Add New Service</p>
                </a>
              </li>
             

            </ul>
          </li>         
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-shopping-bag nav-icon"></i>
              <p>
                Payment
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('service.payment.index')}}" class="nav-link">
                <i class="fas fa-shopping-bag nav-icon"></i>
                  <p>View Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service.payment')}}" class="nav-link">
                  <i class="fas fa-cart-plus  nav-icon"></i>
                  <p>Customer Payment</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-header">System</li>
 

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
                logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>