<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
      <div class="navi-wrap">
        <!-- nav -->
        <nav ui-nav class="navi clearfix">
          <ul class="nav">
            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
              <span>Navigation</span>
            </li>
            <li class="{{ Request::is('app') ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}">
                <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                <span class="font-bold">Dashboard</span>
              </a>
            </li>
            <li class="{{ Request::is('app/slider*') ? 'active' : '' }}">
              <a href="{{ route('slider.index') }}">
                <i class="glyphicon glyphicon-refresh"></i>
                <span class="font-bold">Slider</span>
              </a>
            </li>
            <li class="{{ Request::is('app/category*') ? 'active' : '' }}">
              <a href="{{ route('category.index') }}">
                <i class="glyphicon glyphicon-list"></i>
                <span class="font-bold">Cagegorys</span>
              </a>
            </li>
            <li class="{{ Request::is('app/product*') ? 'active' : '' }}">
              <a href="{{ route('product.index') }}">
                <i class="glyphicon glyphicon-info-sign"></i>
                <span class="font-bold">Products</span>
              </a>
            </li>

            

            <li class="line dk hidden-folded"></li>

            <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
              <span>Your Stuff</span>
            </li>  
            <li>
              <a href="page_profile.html">
                <i class="icon-user icon text-success-lter"></i>
                <b class="badge bg-success pull-right">30%</b>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-logout text-danger-lter"></i>
                <span>Logout</span>
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </ul>
        </nav>
        <!-- nav -->
      </div>
    </div>
</aside>