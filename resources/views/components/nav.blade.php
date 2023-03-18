<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     @foreach ($items as $item )

      <li class="nav-item active">
        <a href="{{ route($item['route']) }}" class="nav-link {{ Route::is($item['active']) ? 'active' : ''}}">
          <i class="{{ $item['icon'] }}"></i>
          <p>
            {{ $item['title'] }}
            @if (isset($item['badge']))
            <span class="right badge badge-danger">{{ $item['badge'] }}</span>
            @endif
          </p>
        </a>
      </li>
      @endforeach
    </ul>
  </nav>





{{-- <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-globe-americas"></i>
        <p>
            Cities
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-dumbbell"></i>
        <p>
            Gyms
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cubes"></i>
        <p>
            Employees
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-globe-americas"></i>
                <p>City Managers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-dumbbell"></i>
                <p>Gym Managers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-dumbbell"></i>
                <p>General Managers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Couches</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-dumbbell"></i>
        <p>Gym Managers</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Couches</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-calendar-check"></i>
        <p>Training Sessions</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-clock"></i>
        <p>Attendance</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cubes"></i>
        <p>
            Training Packages
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Packages</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Buy Package For user</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cubes"></i>
        <p>Buy Package For user</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-money-bill-wave"></i>
        <p>Purchase History</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>Account Settings</p>
    </a>
</li>
<li class="nav-item">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="$('#logout-form').submit();"  class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
</li> --}}
