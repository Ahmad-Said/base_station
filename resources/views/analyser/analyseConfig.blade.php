@extends('layouts.app')
@section('content')

@include('antennas.showModal_inc',['offset_table' => 1])

<div class="card text-center">
    <div class="card-header">
        Analyse Configuration
    </div>
    <div class="card-body">
        <table class="table table-light table-bordered table-striped">
            <thead>
                <tr>
                    <th>Configuration #</th>
                    <th>Antennas Per Sector #</th>
                    <th>Total System Ports #</th>
                    <th>Total Antennas Ports #</th>
                    <th>Unused ports #</th>
                    <th>Max Height #</th>
                    <th>Total Price ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $confNb }}</td>
                    <td>{{ count($AntennaSet) }}</td>
                    <td>{{ array_sum($port) }}</td>
                    <td>
                        {{ array_sum(array_pluck($AntennaSet, "total_nb_ports")) }}
                    </td>
                    @if ($unusedWastePorts == 0 )
                    <td bgcolor="#28A745" style="color: white">

                        @else
                    <td bgcolor="#DC3545" style="color: white">

                        @endif
                        {{ $unusedWastePorts }}

                    </td>
                    <td>{{ max(array_pluck($AntennaSet, "height_mm")) }}</td>
                    <td>{{ array_sum(array_pluck($AntennaSet, "msp_usd")) }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>

        {{-- Chart analysis displaying each xg belonging to which antennas --}}



        <h3 class="text-left"> AntennaSet </h3>
        <div class="table-repsonsive ">
            <span id="error"></span>
            <table class="table table-bordered" id="item_table">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Antenna Model Number</th>
                        <th>Total Ports #</th>
                        <th>Low Band</th>
                        <th>Mid Band</th>
                        <th>High Band</th>
                        <th>Height (mm)</th>
                        <th>Unite Price ($)</th>
                        <th>Link to data sheets</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($AntennaSet as $key => $AntennaItem)
                    <tr bgcolor={{ $AntennaItem->color }} style="color: {{ $AntennaItem->invColor }}">
                        <td>{{ $AntennaItem->label }}</td>
                        <td>{{ $AntennaItem->model_nb }}

                            <button type="button" class="show-info" data-toggle="modal" data-target="#show_info_modal">
                                <i class="far fa-question-circle" style="color: {{ $AntennaItem->invColor }}"></i>
                            </button>
                            <input type="hidden" id="bands_info" value={{ (json_encode($AntennaItem->Bands)) }}>
                        </td>
                        <td>{{ $AntennaItem->total_nb_ports }}</td>
                        <td>{{ $AntennaItem->ports_lt_1GH }}</td>
                        <td>{{ $AntennaItem->ports_btw_1_3GH }}</td>
                        <td>{{ $AntennaItem->ports_bt_3GH }}</td>
                        <td>{{ $AntennaItem->height_mm }}</td>
                        <td>{{ $AntennaItem->msp_usd }}</td>
                        <td>
                            @if ( $AntennaItem->invColor == "#ffffff")
                            <a href="{{ $AntennaItem->link_online }}" style="color: {{ $AntennaItem->invColor }}">
                                Data sheet</a>
                            @else

                            <a href="{{ $AntennaItem->link_online }}">
                                Data sheet</a>
                            @endif

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <br>
        <h3 class="text-left">Technology Association </h3>
        <div class=" table-repsonsive ">
            <span id=" error"></span>
            <table class="table table-bordered" id="item_table">
                <tr>
                    <th>Antennas Label</th>
                    <th>Technology</th>
                    <th>Port</th>
                    <th>Frequency</th>
                </tr>
                @foreach ($technology as $key => $Techitem)

                <tr bgcolor={{ $techToAntenna[$key]["color"] }} style="color: {{ $techToAntenna[$key]["invColor"] }}">
                    <td>{{ $techToAntenna[$key]["label"] }}</td>
                    <td>{{ $technology[$key] }}G</td>
                    <td>{{ $port[$key] }}</td>
                    <td>{{ $bandSymbols[$key] }}</td>
                </tr>

                @endforeach
            </table>
        </div>

        {!! Form::open(['action' => ['AntennasController@pickAntennas'], 'method' => 'GET', 'enctype' =>
        'multipart/form-data']) !!}
        <input type="hidden" name=antennasSetIds value="<?php print implode("_",array_pluck($AntennaSet,"id")) ?>">
        <input type="hidden" name="url_full_get" value={{ url()->full() }}>
        <div style="text-align:center">
            <input type="submit" class="btn btn-primary" value="Test against Custom Antennas" />
        </div>
        {!! Form::close() !!}

        {!! Form::open(['action' => ['AnalyserController@editForm'] , 'method' => 'GET', 'enctype' =>
        'multipart/form-data']) !!}
        <input type="hidden" name=technology value="<?php print base64_encode(serialize($technology)) ?>">
        <input type="hidden" name=band value="<?php print base64_encode(serialize($band)) ?>">
        <input type="hidden" name=port value="<?php print base64_encode(serialize($port)) ?>">
        <input type="hidden" name=antenna_per_sector value="<?php echo $antenna_per_sector; ?>">
        <input type="hidden" name=antenna_preferred value="<?php echo $antenna_preferred; ?>">
        <input type="hidden" name=max_height value="<?php echo $max_height; ?>">
        <br>
        <div style="text-align:center">
            <input type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Modifie Input" />
        </div>
        <br>
        <br>
        {!! Form::close() !!}
    </div>
</div>

@endsection
