@extends('layouts.app')
@section('content')
<?php $i=1 ?>
<script>
    $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
</script>

<div class="card text-center table-responsive">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if (count($AntennaSolution)> 0)
        <table id="dtBasicExample" class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NB</th>
                    <th>Set Solution</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td></td>
                    <td>
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Antenna Id</th>
                                    <th>Total Ports NB</th>
                                    <th>Height</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                        </table>

                    </td>
                </tr> --}}

                @foreach($AntennaSolution as $setSolution)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>Antenna Id</th>
                                    <th>Total Ports NB</th>
                                    <th>Height</th>
                                    <th>Link</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($setSolution as $antennaItem)
                                <tr>

                                    <td>{{ $antennaItem->antennaId }}</td>
                                    <td>{{ $antennaItem->{"Total #RF ports"} }}</td>
                                    {{-- <td>{{ $antennaItem->Bands }}</td> --}}
                                    <td>{{ $antennaItem->{"Height (mm)"} }}</td>
                                    <td><a href="{{ $antennaItem->{"Link to product datasheet"} }}">Here</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </td>

                    @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>NB</th>
                    <th>Set</th>
                </tr>
            </tfoot>
        </table>
        @else
        <p>Sorry, There is No solution at with given input</p>
        @endif
    </div>
</div>

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
