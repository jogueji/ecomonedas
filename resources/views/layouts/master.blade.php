<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Ecomonedas</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles-merged.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
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
                  @guest
                      <li {{Route::currentRouteName()=='cc.index'?"class=active":''}}><a href="{{ route('cc.index') }}">Inicio</a></li>
                      <li {{Route::currentRouteName()=='cc.index'?"class=active":''}}><a href="{{ route('cc.index') }}">Centros de Acopio</a></li>
                      <li {{Route::currentRouteName()=='login'?"class=active":''}}><a href="{{ route('login') }}">Ingresar</a></li>
                      <li {{Route::currentRouteName()=='register'?"class=active":''}}><a href="{{ route('register') }}">Registrar</a></li>
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

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
    </div>{{asset('')}}
    <script src="{{asset('js/scripts.min.js')}}"></script>
    <script src="{{asset('js/main.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

  </body>
</html>
