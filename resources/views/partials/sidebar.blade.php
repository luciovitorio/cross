<nav class="sidebar">
  <div class="sidebar-header">
    <a href="home" class="sidebar-brand">CT<span>FORMIGA</span> </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Home</li>
      <li class="nav-item">
        <a href="home" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Início</span>
        </a>
      </li>

      @can('is_admin')
      <li class="nav-item">
        <a href="{{route('users.index')}}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Usuários</span>
        </a>
      </li>
      @endcan

      @can('is_admin')
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
          aria-controls="emails">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Configuração</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="emails">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="alerts" class="nav-link">Alertas</a>
            </li>
            <li class="nav-item">
              <a href="blocks" class="nav-link">Bloqueios/Qtd Alunos</a>
            </li>
          </ul>
        </div>
      </li>
      @endcan

      <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link">
          <i class="link-icon" data-feather="log-out"></i>
          <span class="link-title">Sair</span>
        </a>
      </li>
    </ul>
  </div>
</nav>