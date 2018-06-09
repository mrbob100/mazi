

@if(session('cart'))
    <div class="container101">

    <header id="header_wrapper">

        @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                {{session('status')}}
            </div>
        @endif
     <span style="font-weight:900; font-size: 24px; margin: 10px;">Ваш заказ</span> <br/>
    </header>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Код товара</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>

            @foreach(session('cart') as $item )

                <tr class="tabOwl">
                    <td> <img src="{{ asset('public/'.env('THEME')) }}/images/{{ $item['cart.img'] }}  " height="50" alt="картинка"/> </td>
                    <td>{!! $item['cart.code'] !!}    </td>
                    <td>{!! $item['cart.name'] !!}    </td>
                    <td>{!! $item['cart.qty'] !!} </td>
                    <td>{!! $item['cart.price'] !!} </td>
                    <td>{!! $item['cart.qty']*$item['cart.price'] !!} </td>
                    <td><span  data-id = "{!! $item['cart.id'] !!} "  class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4">Итого: </td>
                <td>{!! session('cardCommon.qty') !!}  </td>
            </tr>
            <tr>
                <td colspan="4">На сумму: </td>

                <td>   {!!session('cardCommon.sum') !!} </td>
                <td>{!! session('cardCommon.sum') !!}  </td>
            </tr>
            </tbody>
        </table>
    </div>
<div class="wrapper container-fluid">
    @include('auth.social')


    <form class="form-horizontal" id="contractUser" data-href="{{URL::to('contract')}}"  data-sign="29" method="POST" action="{{ route('contract') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Имя</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('secondname') ? ' has-error' : '' }}">
            <label for="secondname" class="col-md-4 control-label">Фамилия</label>

            <div class="col-md-6">
                <input id="secondname" type="text" class="form-control" name="secondname" value="{{ old('secondname') }}" required autofocus>

                @if ($errors->has('secondname'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('secondname') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-md-4 control-label">Телефон</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                @if ($errors->has('phone'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-4 control-label">Адрес</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                @if ($errors->has('address'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Пароль</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Подтвердить пароль</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>





        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary " value="Заказать">
                    Заказать
                </button>
            </div>
        </div>

    </form>

</div>

@else
    <h3>Корзина пуста</h3>
 </div>
@endif
