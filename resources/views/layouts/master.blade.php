<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>@yield('title') - Ecomonedas</title>
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.js') }}"></script>
  </head>

  <body>
    <div class="probootstrap-loader"></div>
    <header role="banner" class="probootstrap-header">
      <div class="container">
        <div class="col-md-1" align="center">
          <img src="{{asset('img/Ecomoneda.png')}}" height="100%" width="100%">
        </div>

        <div class="col-md-11" align="center">
            <a href="#" class="probootstrap-logo"><span>@yield('title') - Ecomonedas</span></a>
            <div class="mobile-menu-overlay"></div>
            <nav role="navigation" class="probootstrap-nav hidden-xs">
              <ul class="probootstrap-main-nav">
                <li {{Route::currentRouteName()=='index'?"class=active":''}}><a href="{{ route('index') }}">Inicio</a></li>
                @can ('management')
                  <li class="dropdown {{starts_with(Route::currentRouteName(), 'admin')?'active':''}}">
                      <a href="#" data-toggle="dropdown">Gestión<span class="caret"></span></a>
                      <div class="dropdown-menu">
                          <a href="{{ route('adminUser.index') }}" style="border:0px" >Usuarios</a>
                          <a href="{{ route('adminCenter.index') }}" style="border:0px">Centros</a>
                          <a href="{{ route('adminMaterial.index') }}" style="border:0px">Materiales</a>
                          <a href="{{ route('adminCoupon.index')}}" style="border:0px">Cupones</a>
                      </div>
                  </li>
                @endcan
                @can ('redeem')
                  <li {{starts_with(Route::currentRouteName(), 'redeem')?"class=active":''}}><a href="{{ route('redeem.index') }}">Canjeo materiales</a></li>
                @endcan
                @can ('buy')
                  <li {{Route::currentRouteName()=='client.wallet'?"class=active":''}}><a href="{{ route('client.wallet') }}">Billetera</a></li>
                  <li {{Route::currentRouteName()=='client.cart'?"class=active":''}}><a href="{{ route('client.cart') }}">Carrito<img src="{{asset('img/emptyCart.png')}}" height="3%" width="3%"></a></li>
                @endcan
                <li {{starts_with(Route::currentRouteName(),'cc')?"class=active":''}}><a href="{{ route('cc.index') }}">Centros</a></li>
                <li {{starts_with(Route::currentRouteName(), 'public.material')?'class=active':''}}><a href="{{ route('public.materials') }}">Materiales</a></li>
                <li {{starts_with(Route::currentRouteName(), 'public.coupons')?'class=active':''}}><a href="{{ route('public.coupons') }}">Cupones</a></li>
                  @guest
                      <li {{Route::currentRouteName()=='login'?"class=active":''}}><a href="{{ route('login') }}">Ingresar</a></li>
                      <li {{Route::currentRouteName()=='register'?"class=active":''}}><a href="{{ route('register') }}">Registrar</a></li>
                  @else
                      <li class="dropdown {{starts_with(Route::currentRouteName(), 'security')?'active':''}}">
                          <a href="#" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></span></a>
                          <div class="dropdown-menu">
                              <a href="{{ route('security.edit', ['user' => Auth::user()->id])}}" style="border:0px">Modificar</a>
                              <a href="{{ route('security.email') }}" style="border:0px">Correo</a>
                              <a href="{{ route('security.password') }}" style="border:0px">Contraseña</a>
                              <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="border:0px">Cerrar sesión</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
            </nav>

        </div>
      </div>
    </header>

    @if(Session::has('message'))
      <div class="row">
        <div class="col-md-12">
          <p class="alert alert-info">{{ Session::get('message') }}</p>{{--sesion--}}
        </div>
      </div>
    @endif

    @yield('content')

    <footer class="probootstrap-footer probootstrap-bg" style="padding:1%; background-image: url({{asset('img/slider_3.jpg')}})">
      <div class="container">
          <div class="col-md-6">
            <div class="probootstrap-footer-widget">
              <h4 class="heading">Contactenos</h4>
              <ul class="stack-link">
                <li>Telefono: <a href="tel:2555-5555">2555-5555</a></li>
                <li>Correo: <a href="mailto:info@ecomonedas.com">info@ecomonedas.com</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row copyright">
              <br/><br/><br/>
              <div class="probootstrap-footer-widget">
                <p>&copy; 2018 Ecomonedas. Diseñado por Jonathan Guerrero y Juan Carlos Soto</p>
              </div>
            </div>
          </div>
      </div>
    </footer>
      <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
      </div>
    <script src="{{asset('js/scripts.min.js')}}"></script>
    <script src="{{asset('js/main.min.js')}}"></script>
  </body>
</html>
