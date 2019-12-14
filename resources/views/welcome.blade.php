@extends('layout.app')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            Search a product
        </div>
        <div class="card-body">
            {!! Form::open(['action' => 'ProductsController@index', 'method' => 'GET']) !!}
                <div class="form-group">
                    {{ Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Search a product..']) }}
                </div>
                {{ Form::submit('Search Product', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

