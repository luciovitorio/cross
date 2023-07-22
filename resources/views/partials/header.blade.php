<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          @if (session('photo'))
          <img class="wd-50 ht-50 rounded-circle" src="{{asset('storage/'.session('photo'))}}" />
          @else
          <img class="wd-50 ht-50 rounded-circle" src="{{asset('assets/images/users/default/user.png')}}" />
          @endif

        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              @if (session('photo'))
              <img class="wd-80 ht-80 rounded-circle" src="{{asset('storage/'.session('photo'))}}" />
              @else
              <img class="wd-80 ht-80 rounded-circle" src="{{asset('assets/images/users/default/user.png')}}" />
              @endif
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">
                {{session('name')}}
              </p>
              <p class="tx-12 text-muted">
                {{session('email')}}
              </p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Editar Perfil</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="{{route('logout')}}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Sair</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>