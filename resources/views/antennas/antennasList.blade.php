@extends('layouts.app')
@section('content')
{{-- https://datatables.net/examples/api/multi_filter.html --}}
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#dtBasicExample tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#dtBasicExample').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

</script>

@include('antennas.showModal_inc',['offset_table' => 0])

<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center table-responsive" style="width: 60rem;">
            <div class="card">
                <div class="card-header">Antennas</div>
                <div class="card-body">
                    @if(count($allAntennas) > 0)
                    <table id="dtBasicExample"
                        class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Antenna Model Number</th>
                                <th>Total Ports #</th>
                                <th>Low Band</th>
                                <th>Mid Band</th>
                                <th>High Band</th>
                                <th>Height (mm)</th>
                                <th>Unit Price ($)</th>
                                <th>Link to data sheets</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allAntennas as $item)
                            <tr>
                                <td>
                                    {{ $item->model_nb }}
                                    <button type="button" class="show-info" data-toggle="modal"
                                        data-target="#show_info_modal">
                                        <i class="far fa-question-circle"></i>
                                    </button>
                                    <input type="hidden" id="bands_info" value={{ (json_encode($item->Bands)) }}>
                                </td>
                                <td>
                                    {{ $item->total_nb_ports }}
                                </td>
                                <td>{{ $item->ports_lt_1GH }}</td>
                                <td>{{ $item->ports_btw_1_3GH }}</td>
                                <td>{{ $item->ports_bt_3GH }}</td>
                                <td>{{ $item->height_mm }}</td>
                                <td>{{ $item->msp_usd }}</td>
                                <td><a href="{{ $item->link_online }}">Data sheet</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Antenna Model Number</th>
                                <th>Total Ports #</th>
                                <th>Low Band</th>
                                <th>Mid Band</th>
                                <th>High Band</th>
                                <th>Height (mm)</th>
                                <th>Unit Price ($)</th>
                                <th>Link to data sheets</th>
                            </tr>
                        </tfoot>
                    </table>
                    @else
                    <p>There is not Antennas In the system.
                        <a href="/provideAntennasData"
                            class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg">
                            Trigger update
                        </a>
                    </p> @endif
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
@endsection
