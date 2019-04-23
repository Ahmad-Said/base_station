@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {!!$error!!}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
            <i class="far fa-check-circle"></i>
        {!!session('success')!!}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
        {!!session('error')!!}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
            <i class="fas fa-bomb"></i>
        {!!session('warning')!!}
    </div>
@endif
