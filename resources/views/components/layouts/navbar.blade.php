<nav class="navbar navbar-expand-lg navbar-light p-3 shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">
        <img src="https://aulab.it/img/logo-aulab-horizontal.webp" style="width:100px;" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::user()->is_admin() || Auth::user()->is_chief_editor())
                  <li><a class="dropdown-item" href="/admin">Pannello Amministratore</a></li>
                @endif
                <li><a class="dropdown-item" href="{{route('article.index')}}">Gli articoli</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                <form id="form-logout" method="post" action="{{route('logout')}}" class="d-none">@csrf</form>
            </ul>
          </li>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto Guest
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
              <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
            </ul>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>