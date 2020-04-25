<form id="quickid" class="form-horizontal" role="form" method="POST" action="{{ route('quickregister') }}">
    {{ csrf_field() }}
    <div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #FF0000;">&times;</span></button>
    </div>
    <div><p>Заказ без оформления. Просто оставьте телефон и консультант поможет с оформлением заказа</p></div>


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
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-4 control-label">Контактный телефон</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

            @if ($errors->has('phone'))
                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
            @endif
        </div>

    </div>
    <div class="col-md-6">
        <input id="product" type="hidden"  name="productId" value="{{ $productId }}">


    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary cobzov" data-id="{!! $productId !!}" >
               Отправить
            </button>
        </div>
    </div>

</form>