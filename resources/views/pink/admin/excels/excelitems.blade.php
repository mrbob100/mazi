<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Import-Export Data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
</head>
<body>
<div class="container">
    <br />
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="row">
                <form action="{{route('importIt')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        {{csrf_field()}}
                        <input type="file" name="imported-file"/>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Import</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2">
            <form action="{{route('exportIt')}}" enctype="multipart/form-data">
                <button class="btn btn-success" type="submit">Export</button>
            </form>
        </div>
    </div>
    <div class="row">
        @if(count($items))
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Рубрика</td>
                    <td>Категория товара</td>
                    <td>Производитель</td>
                    <td>Наименование</td>
                    <td>Код товара</td>
                    <td>Описание</td>
                    <td>Цена</td>
                    <td>Гарантия</td>
                    <td>Наличие</td>
                    <td>Ссылка на товар</td>
                    <td>Ссылка на изображение</td>
                    <td>Дата</td>
                </tr>
                </thead>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->item_head}}</td>
                        <td>{{$item->item_cat}}</td>
                        <td>{{$item->item_company}}</td>
                        <td>{{$item->item_name}}</td>
                        <td>{{$item->item_code}}</td>
                        <td>{{$item->item_descr}}</td>
                        <td>{{$item->item_price}}</td>
                        <td>{{$item->item_term}}</td>
                        <td>{{$item->item_sclad}}</td>
                        <td>{{$item->item_linkToGood}}</td>
                        <td>{{$item->item_linkToPhoto}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
</body>
</html>