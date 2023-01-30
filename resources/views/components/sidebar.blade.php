<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">
            <i class="fas fa-home"></i>
            Início
          </a>
        </li>
        @foreach($menus as $menu )
          
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{$menu['rota']}}">
            <i class="{{$menu['icone']}}"></i>
            {{$menu['titulo']}}
          </a>
        </li>
     
        @endforeach
      </ul>
    </div>
  </nav>