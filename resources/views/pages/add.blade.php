@extends('comps.navbar')

@section('content')
<div class="card text-center">
    <div class="card-header">
           Add Product Form
    </div>
    <div class="card-body">
        {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-row">
            <div class="form-group col">
                {{ Form::label('name', 'Product Name') }}
                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Product Name']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('price', 'Product Price') }}
                {{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Product Price']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('groups', 'Product Category') }}
                {{ Form::text('groups', '', ['class' => 'form-control', 'placeholder' => 'Product Category']) }}
            </div>
            <div class="form-group col">
                {{ Form::label('stocks', 'Product Stocks') }}
                {{ Form::text('stocks', '', ['class' => 'form-control', 'placeholder' => 'Product Stocks']) }}
            </div>
        </div>
            <div class="form-group">
                {{ Form::label('description', 'Product Description') }}
                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Product Description']) }}
            </div>
            <div class="form-group">
                {{ Form::label('image_url', 'Product Image') }}
                {{ Form::file('image_url') }}
            </div>
            {{ Form::button('Add Product', ['class' => 'btn btn-primary', 'type'=>'button', 'data-toggle'=>'modal', 'data-target'=>'#exampleModalCenter']) }}
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Product Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to add this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{ Form::submit('Add Product', ['class' => 'btn btn-success']) }}
                    </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
