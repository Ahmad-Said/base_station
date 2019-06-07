@extends('layouts.app')
@section('content')
@if (count($AntennaSolution)== 0)
Sorry, There is No solution at with given input
@else
@php
$i =0;
@endphp
@foreach ($AntennaSolution as $setSolution)
Displaying {{ $i++ }} solution
@foreach ($setSolution as $antennaItem)
    {{ $antennaItem }}
@endforeach
@endforeach
@endif
{!! Form::open(['action' => ['AnalyserController@editForm'] , 'method' => 'GET', 'enctype' =>
'multipart/form-data']) !!}
<input type="hidden" name=technology value="<?php print base64_encode(serialize($technology)) ?>">
<input type="hidden" name=band value="<?php print base64_encode(serialize($band)) ?>">
<input type="hidden" name=port value="<?php print base64_encode(serialize($port)) ?>">
<input type="hidden" name=antenna_per_sector value="<?php echo $antenna_per_sector; ?>">
<input type="hidden" name=max_height value="<?php echo $max_height; ?>">
<div style="text-align:center">
    <input type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Edit Form" />
</div>
</div>
{!! Form::close() !!}

<script>
    // https://stackoverflow.com/questions/17594413/javascript-or-jquery-browser-back-button-click-detector
    // this to make on back button browser clicked to make it like edit recent form
    jQuery(document).ready(function($) {

        if (window.history && window.history.pushState) {

        window.history.pushState('forward', null, '');

        $(window).on('popstate', function() {
            $('#backBtn').click();
        });
        }
});
</script>
@endsection
