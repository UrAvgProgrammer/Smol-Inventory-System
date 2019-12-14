@extends('comps.navbar')

@section('content')
<div class="card text-center">
    <div class="card-header">
           Edit Product Form
    </div>
    <div class="card-body">
        {!! Form::open(['action' => ['ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-row">
            <div class="form-group col">
                {{ Form::label('name', 'Product Name') }}
                {{ Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Product Name']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('price', 'Product Price') }}
                {{ Form::text('price',  $product->price, ['class' => 'form-control', 'placeholder' => 'Product Price']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('groups', 'Product Category') }}
                {{ Form::text('groups',  $product->groups, ['class' => 'form-control', 'placeholder' => 'Product Category']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('stocks', 'Product Stocks') }}
                {{ Form::text('stocks',  $product->stocks, ['class' => 'form-control', 'placeholder' => 'Product Stocks']) }}
            </div>
        </div>
            <div class="form-group">
                {{ Form::label('description', 'Product Description') }}
                {{ Form::textarea('description',  $product->description, ['class' => 'form-control', 'placeholder' => 'Product Description']) }}
            </div>
            <div class="form-group">
                {{ Form::label('image_url', 'Product Image') }}
                {{ Form::file('image_url') }}
            </div>
            @csrf
            @method('PUT')
            {{ Form::submit('Edit Product', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection
