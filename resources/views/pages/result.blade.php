@extends('layout.withnav')

@section('content')
<div class="pagination justify-content-center">
        {{ $products->links() }}
</div>
<div class="row">
    @if (count($products) > 0)
    @foreach ($products as $product)
        <div class="col">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold align-baseline">{{ $product->name }}</h5>
                </div>
                <img class="img-thumbnail card-img-top" style="width: 300px !important; height: 300px !important;" src="/storage/images/{{ $product->image_url }}" alt="Card image cap">
                <div class="card-body">
                    <small class="font-weight-bold card-text text-primary">Price: <span>&#8369;</span>{{ $product->price }}</small><br>
                    Description: <small class="card-text">{{ $product->description }}</small><br>
                    Stocks <small class="card-text">{{ $product->stocks }}</small><br>
                    <hr>
                        <div class="panel-footer row text-center">
                            <div class="col-sm-6 text-left">
                                <a class="align-baseline btn btn-primary" href="/products/{{ $product->id }}/edit"><span class="fas fa-edit"></span>&nbsp;Edit</a>
                            </div>
                            <br>
                            <div class="col-sm-6 text-right">
                                {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'DELETE', 'class'=>'pull-right']) !!}
                                @method('DELETE')
                                @csrf
                                {{ Form::hidden('_method', 'DELETE')}}
                                {{-- {{ Form::button('Delete', ['class' => 'btn btn-danger', 'type'=>'button', 'data-toggle'=>'modal', 'data-target'=>'#exampleModalCenter']) }} --}}
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><span class="fas fa-trash"></span>&nbsp;Delete</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Are you sure you want to delete product {{ $product->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                </div>
            </div>
            <br>
        </div>
    @endforeach
    @else
    <p class="title">No Product Found!</p>
    @endif
{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
      </button>    --}}

</div>
<div class="pagination justify-content-center">
{{ $products->links() }}
</div>
@endsection