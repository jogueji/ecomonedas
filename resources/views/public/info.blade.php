@extends('layouts.master')
@section('title', 'Sobre Ecomonedas')
@section('content')

  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Sobre Nosotros</h4>
        <h2 class="heading">Quienes Somos</h2>
      </div>

 <div class="col-md-5 probootstrap-animate">
          <p>En  Ecomonedas CR, nos satisface ser parte de un grupo de instituciones sin fines de lucro con el objetivo de promover
          el cuidado, el desarrollo y la sostenibilidad del medio ambiente.  </p>
          <p>Gracias a la iniciativa de un grupo de personas, con cnocimientos básicos en el ámbito de Gestión Ambiental, se crea
          Ecomonedas, entrando en funcionamiento a partir de 2007. Con más de diez años en el mercado, nos hemos dado cuenta
          la importancia de incentivar a las personas a colaborar en la recolección de materiales reciclables y así evitar más contaminación en nuestro país y nuestro planeta.</p>
        </div>
        <div class="col-md-5 probootstrap-animate">
          <p>Nuestras oficinas centrales, ubicadas en Barrio Escalente, cerca del centro de San José, están anuentes a recibir todo tipo
          de colaboración por parte de empresas, particulares y otras instituciones dispuestas a colaborar con esta verde causa. Te invitamos
          a ti también a colaborar. Si deseas más información de como hacerlo, no dudes en contactarnos a nuestros números ubicados en la parte posterior de esta página.</p>
          <p>Esperemos que disfrutes tu visita a la página y la vez te beneficies reciclando, nuestros llamativos cupones canjebles te estána
            esperando con muchos premios y promociones increíbles.</p>
        </div>
        <div  align="center" class="col-md-2 probootstrap-animate">
          <p><h4 class="sub-heading">Nuestros </br> Patrocinadores:</h4></p>
          <figure>
            <img src="{{asset('img/dosPinos.png')}}" height="100" width="100" alt="" class="img-responsive">
          </figure>
          <figure>
            <img src="{{asset('img/irex.png')}}" height="100" width="100" alt="" class="img-responsive">
          </figure>
      
          <figure>
            <img src="{{asset('img/waltmart.png')}}" height="100" width="100" alt="" class="img-responsive">
          </figure>
        </div>
</div>

@endsection
