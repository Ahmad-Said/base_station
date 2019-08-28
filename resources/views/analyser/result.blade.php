@extends('layouts.app')
@section('content')
{{-- https://stackoverflow.com/questions/25838135/how-to-make-responsive-bootstrap-3-pagination --}}
<style>
    /* pagination-responsive */
    @media (min-width:0px) and (max-width:650px) {
        .toggle-pagination {
            display: block
        }

        .toggle-pagination.active i:before {
            content: '\2212'
        }

        .pagination-responsive {
            width: 100%;
            margin-top: 10px;
            display: none;
        }

        .pagination-responsive>li>a,
        .pagination-responsive>li>span {
            width: 100%;
            margin: 0;
            line-height: 40px;
            padding: 0;
            border-radius: 0px !important;
        }

        .pagination-responsive>li {
            float: left;
            width: 20%;
            margin-top: -1px;
            text-align: center;
        }
    }

    @media (max-width:480px) {
        .pagination-responsive>li {
            width: 33%
        }
    }

    @media (max-width:320px) {
        .pagination-responsive>li {
            width: 50%
        }
    }

    @media (min-width:651px) {
        .toggle-pagination {
            display: none
        }

        .pagination-responsive {
            display: inline-block !important
        }

    }

</style>

{{-- https://stackoverflow.com/questions/23779088/laravel-detect-mobile-tablet-and-load-correct-views --}}
@if ($agent->isMobile() && !$agent->isTablet())
{{-- // add responsive class to current pagination if it was a mobile device --}}
<script>
    $(document).ready(function () {
          $('.pagination').addClass("pagination-responsive");
          $('.pagination').attr("role","navigation");
  });
</script>
@endif

<script>
    $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');

            // show-pagination
            $('.toggle-pagination').click(function(f) {
                $(this).next('.pagination-responsive').slideToggle();
                $(this).toggleClass('active');
                f.preventDefault()
            });
        });

</script>




<div class="card text-center table-responsive" style="border-width:2px;">
    <div class="card-header" style="color:#fc0703; background-color:#d6d7d4">
    <h4><b>Results</b></h4>
    </div>
    <div class="card-body">
        @if (count($AntennaSolution)> 0)
        <div class="float-left">
            Pages
            @if (count($AntennaSolution) >10)
            <select name="page_selection" id="page_selection" class="form-control-sm" onchange='location =
            "{{ url()->current() . "?" }}"
            +"page="+$(this).val()+"&"
            +"{{http_build_query(Request::except("page")) }}"
            '
            >
                <?php
            for ($i=1; $i <= $AntennaSolution->lastPage(); $i++) {
                echo "<option value=".$i;
                if($i == $AntennaSolution->currentPage()){
                    echo " selected";
                }
                echo ">".$i."</option>";
            }
            ?>
            </select>
            @endif
            Showing set from {{ $AntennaSolution->currentPage()*100-100+1 }} to
            {{ $AntennaSolution->currentPage()*100-100+count($AntennaSolution) }}
        </div>
        <br>
        <br>



        {{-- @else --}}
        <a class="btn btn-default btn-block toggle-pagination"><i class="fas fa-expand-arrows-alt"></i> Toggle
            Pagination</a>
        {!! $AntennaSolution->links() !!}
        <br>
        <br>
        {{-- @endif --}}

        <table id="dtBasicExample" class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
            cellspacing="0"  width="100%">
            <thead>
                <tr>
                    <th>Configuration #</th>
                    <th># Antennas Par Sector</th>
                    <th>Antenna Model Number</th>
                    <th>Total Ports #</th>
                    <th>Low Band</th>
                    <th>Mid Band</th>
                    <th>High Band</th>
                    <th>Height (mm)</th>
                    <th>Unite Price</th>
                    <th>Quantity</th>
                    <th>Link to data sheets</th>
                    <th>Total Price ( $ )</th>
                </tr>
            </thead>
            <tbody>
                @foreach($AntennaSolution as $key => $setSolution)
                    <tr >
                        <td style="vertical-align: middle;" rowspan={{  count($setSolution)}}>{{ $key+1 }}</td>
                        <td style="vertical-align: middle;" rowspan={{  count($setSolution)}}>{{  count($setSolution)}}</td>
                        <td>{{ $setSolution[0]->xxx }}</td>
                        <td>{{ $setSolution[0]->{"Total #RF ports"} }}</td>
                        <td>{{ $setSolution[0]->{"#ports (<1GHz)"} }}</td>
                        <td>{{ $setSolution[0]->{"#ports (1-3GHz)"} }}</td>
                        <td>{{ $setSolution[0]->{"#ports (>3GHz )"} }}</td>
                        <td>{{ $setSolution[0]->{"Height (mm)"} }}</td>
                        <td></td>
                        <td></td>
                        <td><a href="{{ $setSolution[0]->{"Link to product datasheet"} }}">Data sheet</a></td>
                        <td style="vertical-align: middle;" rowspan={{  count($setSolution)}}></td >
                    </tr>

                    @for ( $i=1 ; $i < count($setSolution) ; $i++ )
                        <tr>
                            <td>{{ $setSolution[$i]->xxx }}</td>
                            <td>{{ $setSolution[$i]->{"Total #RF ports"} }}</td>
                            <td>{{ $setSolution[$i]->{"#ports (<1GHz)"} }}</td>
                            <td>{{ $setSolution[$i]->{"#ports (1-3GHz)"} }}</td>
                            <td>{{ $setSolution[$i]->{"#ports (>3GHz )"} }}</td>
                            <td>{{ $setSolution[$i]->{"Height (mm)"} }}</td>
                            <td>23</td>
                            <td>45</td>
                            <td><a href="{{ $setSolution[$i]->{"Link to product datasheet"} }}">Data sheet</a></td>
                        </tr>
                    @endfor
                @endforeach
            </tbody>
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
<input type="hidden" name=antenna_preferred value="<?php echo $antenna_preferred; ?>">
<input type="hidden" name=max_height value="<?php echo $max_height; ?>">
<br>
<div style="text-align:center">
    <input type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Modifie Input" />
</div>
</div>
{!! Form::close() !!}

<script>
    // https://stackoverflow.com/questions/17594413/javascript-or-jquery-browser-back-button-click-detector
    // this to make on back button browser clicked to make it like edit recent form
    jQuery(document).ready(function($) {

        $(document).on('click', '.load-link',function(e){
            if($(this).hasClass("one-time")){
                $(this).removeClass("one-time");
                $(this).html('Loading <i class="fas fa-cog fa-spin"></i> <i class="fas fa-truck-loading"></i>');
            }else{
                // https://stackoverflow.com/questions/970388/jquery-disable-a-link
                e.preventDefault();
            }
        });

        if (window.history && window.history.pushState) {

        window.history.pushState('forward', null, '');

        $(window).on('popstate', function() {
            $('#backBtn').click();
        });
        }
});
</script>
@endsection
