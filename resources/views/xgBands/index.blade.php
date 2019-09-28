@extends('layouts.app')
@section('content')
{{-- if there is an error scroll to xg after delay --}}
@if(session('error'))
<script>
    setTimeout(() => {
    alert("Operation Failed!\nMinimum Frequency cannot be bigger than Maximum Frequency");
    }, 500);
</script>
@endisset


<div class="card text-center table-responsive border-dark" style="border-width:2px;">
    <div class="card-header" style="color:#fc0703; background-color:#d6d7d4">
        <h4><b>Antennas Bands</b></h4>
    </div>
    <div class="card-body">
        <br>
        <br>

        <?php $counter=0;?>

        @foreach($bands as $g => $band)
        <?php if($counter++ == 0) continue;?>

        <div class="card-body">
            <div class="card-header" style=" background-color:#d6d7d4">
                <a id="{{ $g }}G" name="{{ $g }}G">
                    <h4><b>{{ $g }}G</b></h4>
                </a>
            </div>
            <table id="pricetable" class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
                cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Minimum Frequecy band</th>
                        <th>Maximum Frequecy band</th>
                        <th>Radio Technology</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($band as $xg => $ban)
                    {!! Form::open(['action' => ['XgBandsController@update',$ban->id] , 'method' => 'PUT']) !!}
                    <input type="hidden" name='id' value={{ $ban->id }}>
                    <tr>
                        <td>
                            {{-- {{ $ban->bands }} --}}
                            <input type="number" name="minFreq" value="{{ $ban->minFreq }}" required="true">

                        </td>
                        <td>
                            {{-- {{ $ban->bands }} --}}
                            <input type="number" name="maxFreq" value="{{ $ban->maxFreq }}" required="true">

                        </td>
                        <td>
                            <input type="text" name="symbol" value="{{ $ban->symbol }}" required="true">
                        </td>
                        <td class="stat">
                            <input type="hidden" name="scrollAfterSubmit" value="{{ $g }}G" />
                            <input type="submit" id="Edit" name="Edit" class="btn btn-primary" value="Update" />
                        </td>
                        {!! Form::close() !!}
                        {!! Form::open(['action' => ['XgBandsController@destroy',$ban->id] , 'method' => 'Delete']) !!}
                        <td class="stat">
                            <input type="hidden" name="scrollAfterSubmit" value="{{ $g }}G" />
                            <input type="submit" id="Delete" name="Delete" class="btn btn-danger" value="Delete" />
                        </td>
                        {!! Form::close() !!}

                    </tr>

                    @endforeach
                    {!! Form::open(['action' => ['XgBandsController@store'] , 'method' => 'POST']) !!}
                    <tr>
                        <input type="hidden" name="xg" value="{{ $g }}" required="true">

                        <td>
                            <input type="number" placeholder="{{ "Example: ".$bands[0][$g]->minFreq }}" name="minFreq"
                                value="" required="true">
                        </td>
                        <td>
                            <input type="number" placeholder="{{ "Example: ".$bands[0][$g]->maxFreq }}" name="maxFreq"
                                value="" required="true">
                        </td>
                        <td>
                            <input type="text" placeholder="{!! " Example: " .$bands[0][$g]->symbol !!}" name="symbol"
                                value="" required="true">
                        </td>
                        <td colspan="2" class="stat">
                            <input type="hidden" name="scrollAfterSubmit" value="{{ $g }}G" />
                            <input type="submit" id="Add" name="Add" class="btn btn-success w-25" value="Add" />
                        </td>
                    </tr>
                    {!! Form::close() !!}

                </tbody>
            </table>
        </div>
        @endforeach
        <div style="text-align:center">
            <input type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Edit Form" />
        </div>

    </div>
</div>

<br><br><br>

@endsection
