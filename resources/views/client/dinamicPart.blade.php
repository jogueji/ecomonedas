<div class="col-md-9">
  <div class="col-md-12" align="center">
    <h4 class="sub-heading">Lista de cupones</h4>
  </div>
  @if(count($cart)>0)
    @foreach($cart as $item)
      <div class="col-md-12">
        <div class="col-md-2">
          <br><p>{{$item['name']}}</p>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="quantity{{$item['id']}}">Cantidad</label>
            <input data-id="{{$item['id']}}" id="quantity{{$item['id']}}" type="number" value="{{$item['quantity']}}"
             step="1" min="1" class="form-control edit-modal" name="quantity{{$item['id']}}">
          </div>
        </div>
        <div class="col-md-2">
          <br><p>Subtotal: {{$item['subtotal']}}</p>
        </div>
        <div class="col-md-2">
          @if($item['quantity']>$coupons->where('id',$item['id'])->first()->stock)
            <br><p style="color:red">Excede cantidad en stock </p>
          @endif
        </div>
        <div class="col-md-2">
          <br>
          <div class="form-group">
            <a href="#" data-id="{{$item['id']}}" style="border: 1px solid red;background-color:red;" class="btn btn-primary delete-modal">
              Eliminar
            </a>
          </div>
        </div>
      </div>
    @endforeach
    <div class="col-md-12" align="center">
      <h4>Ecomonedas necesarias: {{$cart->sum('subtotal')}}</h4>
        @if ($cart->sum('subtotal')>$residue)
          <p style="color:red">No cuenta con las ecomonedas necesarias</p>
        @endif
    </div>
    @if ($cart->sum('subtotal')<$residue)
    <div class="col-md-6" align="right">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Canjear</button>
      </div>
    </div>
    <div class="col-md-6" align="left">
    @else
        <div class="col-md-12" align="center">
    @endif
  @else
    <div class="col-md-12" align="center">
      <br><h4 style="color:red">Carrito vacio</h4><br>
    </div>
  <div class="col-md-12" align="center">
  @endif
    <a class="btn btn-primary" href="{{ route('index')}}">Cancelar</a>
  </div>
</div>
<div class="col-md-3" align="center">
  <img src={{asset(count($cart)==0?'img/emptyCart.png':'img/fullCart.png')}} height="100%" width="100%">
</div>
