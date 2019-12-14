@if(count($errors)> 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops! Something went wrong!</strong>
        <br><br>
        @foreach ($errors->all() as $error)
            <ul>
                {{ $error }}
            </ul>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>
        <br><br>
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops! Something went wrong!</strong>
        <br><br>
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
