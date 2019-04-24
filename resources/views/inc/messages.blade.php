@php $but="
<span class='float-right removediv far fa-window-close' style='font-size: 180%;cursor: pointer;'> </span>";
@endphp @isset($errors)
{{-- this can be used as follow: $errors = array('helo','ewfwe','wfef'); return View('pages.test')->withErrors($errors);
--}} @foreach($errors->all() as $error)
<div class="alert alert-danger">
    {!! $but !!}
    <i class="fas fa-exclamation-circle"></i> {!! $error !!}
</div>
@endforeach @endisset @if(session('success'))
<div class="alert alert-success">
    {!! $but !!}
    <i class="far fa-check-circle"></i> {!! session('success') !!}
</div>
@endif @if(session('error'))
<div class="alert alert-danger">
    {!! $but !!}
    <i class="fas fa-exclamation-circle"></i> {!! session('error') !!}
</div>
@endif @if(session('warning'))
<div class="alert alert-warning">
    {!! $but !!}
    <i class="far fa-hand-paper"></i> {!! session('warning') !!}
</div>
@endif
<script>
    $(document).on('click', '.removediv', function(){
                                 $(this).closest('div').remove();
                                //  $('.alert').remove();
            });

</script>
