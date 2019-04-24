@php $but="
<button class='btn btn-outline-danger waves-effect float-right remove'><i class='far fa-times-circle'></i></button>"
@endphp @if(count($errors)
> 0) @foreach($errors->all() as $error)
<div class="alert alert-danger">
    {!! $but !!}
    <i class="fas fa-exclamation-circle"></i> {!!$error!!}
</div>
@endforeach @endif @if(session('success'))
<div class="alert alert-success">
    {!! $but !!}
    <i class="far fa-check-circle"></i> {!!session('success')!!}
</div>
@endif @if(session('error'))
<div class="alert alert-danger">
    {!! $but !!}
    <i class="fas fa-exclamation-circle"></i> {!!session('error')!!}
</div>
@endif @if(session('warning'))
<div class="alert alert-warning">
    {!! $but !!}
    <i class="far fa-hand-paper"></i> {!!session('warning')!!}
</div>
@endif
<script>
    $(document).on('click', '.remove', function(){
                                $('.alert').remove();
            });

</script>
