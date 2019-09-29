@extends('layouts.app')
@section('content')
{{-- https://datatables.net/examples/api/multi_filter.html --}}
<style>
    thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<script>
    $(document).ready(function() {




    // https://stackoverflow.com/questions/16119693/jquery-data-table-not-working-from-second-page
    // https://stackoverflow.com/questions/12055462/handle-click-event-for-appended-elements-in-jquery

    // https://stackoverflow.com/questions/21434891/jquery-move-table-rows-to-top
    $('.oldSelected').closest('tr').each(function() {
        $(this).prependTo("#MySelection");
    });
    $('input[type="checkbox"]').each(function() {
        if($(this).prop("checked") == true && !$(this).hasClass("oldSelected")){
             $(this).click();
        }
    });
    $(document).on('click', 'input[type="checkbox"]', function(){
            var nextSpan =  $(this).next("#next_checkbox");
            var inputNb = $(this).next('#quantity');
            if($(this).prop("checked") == true){
                inputNb.val(1);
                inputNb.attr("disabled",false);
                nextSpan.html('Included');
            }else{
                nextSpan.html('');
                inputNb.val(0);
                inputNb.attr('disabled',true);
            }
            if($(this).prop("checked") == true){
                var currentRow =  $(this).closest('tr').remove().clone();
                $('#MySelection').append(currentRow);

            }
            else if($(this).prop("checked") == false){
                // currentRow.prependTo('#dtBasicExample');
                // nextSpan.fadeOut();
                // currentRow.css({'background-color': 'white'});
                var currentRow =  $(this).closest('tr').remove().clone();
                $('#dtBasicExample').prepend(currentRow);

            }
    });

    $("#trigger-modify").on('click',function(){
        $("#backBtn").click();
    });



    // Setup - add a text input to each footer cell
    $('#dtBasicExample thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="?'+title+'" />' );
    } );

    // DataTable
    var table = $('#dtBasicExample').DataTable({
        "ordering": false
    } );

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

</script>
@include('antennas.showModal_inc',['offset_table' => 1])

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
    <input type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Modifie Input" hidden />
</div>
{!! Form::close() !!}


<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center table-responsive" style="width: 60rem;">
            <div class="card">
                <div class="card-header">Check Antennas</div>
                <div class="card-body">
                    @if(count($allAntennas) > 0)
                    <h4 class="text-left">
                        Technologies
                        <i id="trigger-modify" class="btn btn-info btn-sm">
                            <i class="fas fa-cog"></i>
                            Modifie Input
                        </i>
                    </h4>
                    @include('inc.TechFullForm_inc')
                    <h3 class="text-left">Selected Antennas</h3>


                    {!! Form::open(['action' => ['AnalyserController@analyseConfigHelper'] , 'method' => 'GET',
                    'enctype' =>
                    'multipart/form-data', 'class' => 'form-prevent-multiple-submits']) !!}
                    <input type="hidden" name="previousUrl" value={{ $previousUrl }}>
                    <input type="hidden" name="previousSetIDS" value={{ implode("_",$antennasSetIds) }}>

                    <table id="MySelection"
                        class="table table-hover table-responsive-lg table-primary table-bordered table-sm"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Action</th>
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
                        </tbody>
                    </table>

                    <input type="submit" class="btn btn-primary" id="generate-link-submit" value="Proceed To analyse" />
                    {!! Form::close() !!}


                    <table id="dtBasicExample"
                        class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Include To analyser</th>
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
                            @foreach($allAntennas as $item)
                            <tr>
                                <td>
                                    @if (in_array($item->id,$antennasSetIds))
                                    <input type="checkbox" class="oldSelected" name="antennasSetIds[]"
                                        value="{{ $item->id }}" checked />
                                    <input id="quantity" type="number" name="quantity[]"
                                        value="{{ count(array_keys($antennasSetIds, $item->id)) }}" min="1"
                                        style="width: 30%" />
                                    <span id="next_checkbox"></span>
                                    @else
                                    <input type="checkbox" name="antennasSetIds[]" value="{{ $item->id }}" />
                                    <input id="quantity" type="number" class="quantity" name="quantity[]" value="0"
                                        min="1" style="width: 30%" disabled />
                                    <span id="next_checkbox"></span>
                                </td>
                                @endif
                                <td>{{ $item->model_nb }}
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
                                <th>Include To analyser</th>
                                <th>Antenna Model Number</th>
                                <th>Total Ports #</th>
                                <th>Low Band</th>
                                <th>Mid Band</th>
                                <th>High Band</th>
                                <th>Height (mm)</th>
                                <th>Unite Price ($)</th>
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
</div>

@endsection
