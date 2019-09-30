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

        function generateLinkToClip() {
            copyStringToClipboard("{{ URL::to('/').$AnalyseConfig_link_Example }}");
            var info = $("#link_copeid_info");
            info.slideDown(500).delay(5000).slideUp(500);
        }
        function copyStringToClipboard (str) {
                // Create new element
                var el = document.createElement('textarea');
                // Set value (string to be copied)
                el.value = str;
                // Set non-editable to avoid focus and move outside of view
                el.setAttribute('readonly', '');
                el.style = {position: 'absolute', left: '-9999px'};
                document.body.appendChild(el);
                // Select text inside element
                el.select();
                // Copy text to clipboard
                document.execCommand('copy');
                // Remove temporary element
                document.body.removeChild(el);
            }
</script>

<div class="card text-center table-responsive" style="border-width:2px;">
    <div class="card-header" style="color:#fc0703; background-color:#d6d7d4">
        <h4><b>
                Results<br>
                <button id="result_link" style="color:blue;" title="Copy Link to clipboard"
                    onclick="generateLinkToClip()">
                    <h6> <i class="fas fa-link"></i> Copy link to clipboard<h6>
                </button>

                <div id="link_copeid_info" style="display: none;">
                    <small>
                        <a href="{{ URL::to('/').$AnalyseConfig_link_Example }}">
                            Link Copied to Clipboard
                        </a>
                    </small>
                </div>
    </div>
    </b>
    </h4>
</div>
<div class="card-body">
    @if (count($AntennaSolution)> 0)
    <div class="float-left">
        @if ($isCacheAllowed)

        Pages
        @endif
        @if (count($AntennaSolution) >10)
        @if ($isCacheAllowed)

        <select name="page_selection" id="page_selection" class="form-control-sm" onchange='location =
            "{{ url()->current() . "?" }}"
            +"page="+$(this).val()+"&"
            +"{{http_build_query(Request::except("page")) }}"
            '>
            @endif
            <?php
                if($isCacheAllowed){
                    for ($i=1; $i <= $AntennaSolution->lastPage(); $i++) {
                        echo "<option value=".$i;
                        if($i == $AntennaSolution->currentPage()){
                            echo " selected";
                        }
                        echo ">".$i."</option>";
                    }
                }
            ?>
            @if ($isCacheAllowed)

        </select>
        @endif
        @endif
        @if($isCacheAllowed)
        Showing set from {{ $AntennaSolution->currentPage()*$perPage-$perPage+1 }} to
        {{ $AntennaSolution->currentPage()*$perPage-$perPage+count($AntennaSolution) }}

        <?php $confNb=$AntennaSolution->currentPage()*$perPage-$perPage+1; ?>
        @else
        Showing {{ count($AntennaSolution) }} Solutions.
        <?php $confNb=1; ?>
        @endif
    </div>
    <br>
    <br>



    {{-- @else --}}
    @if ($isCacheAllowed)

    <a class="btn btn-default btn-block toggle-pagination"><i class="fas fa-expand-arrows-alt"></i> Toggle
        Pagination</a>
    {!! $AntennaSolution->links() !!}
    @endif


    @endif

    <div class="float-left">
        {!! Form::open(['action' => ['AnalyserController@editForm'] , 'method' => 'GET', 'enctype' =>
        'multipart/form-data']) !!}
        <input type="hidden" name=technology value="<?php print base64_encode(serialize($technology)) ?>">
        <input type="hidden" name=band value="<?php print base64_encode(serialize($band)) ?>">
        <input type="hidden" name=port value="<?php print base64_encode(serialize($port)) ?>">
        <input type="hidden" name=antenna_per_sector value="<?php echo $antenna_per_sector; ?>">
        <input type="hidden" name=antenna_preferred value="<?php echo $antenna_preferred; ?>">
        <input type="hidden" name=max_height value="<?php echo $max_height; ?>">
        <button type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Modify Input">
            <i class="fas fa-backward"></i>
            Modify Input
            <i class="fas fa-cog"></i>
        </button>
        {!! Form::close() !!}
    </div>
    @if (Auth::user()->type=='admin' || Auth::user()->type=='salesman')
    <div class="float-right">
        {!! Form::open(['action' => ['AntennasController@pickAntennas'], 'method' => 'GET', 'enctype' =>
        'multipart/form-data']) !!}
        <input type="hidden" name=antennasSetIds value="">
        <input type="hidden" name="url_full_get" value={{ $AnalyseConfig_link_Example }}>
        <button type="submit" class="btn btn-primary" value="Test against Custom Antennas">
            <i class="far fa-angry"></i>
            Test against Custom Antennas
            <i class="fas fa-forward"></i>
        </button>
        {!! Form::close() !!}
    </div>
    @endif
    <br>
    <br>

    <h4>
        Form Request
    </h4>
    <div id="demo1">
        @include('inc.TechFullForm_inc')
    </div>

    @if (count($AntennaSolution) >0)



    <table id="dtBasicExample" class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
        cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Configuration #</th>
                <th># Antennas Per Sector</th>
                <th>Antenna Model Number</th>
                <th>Total Ports #</th>
                <th>Low Band</th>
                <th>Mid Band</th>
                <th>High Band</th>
                <th>Height (mm)</th>
                @if(Auth::user()->type=='admin' || Auth::user()->type=='salesman')
                <th>Unit Price ($)</th>
                @endif
                <th>Quantity</th>
                <th>Link to data sheets</th>
                @if(Auth::user()->type=='admin' || Auth::user()->type=='salesman')
                <th>Total Price ($)</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($AntennaSolution as $key => $setSolution)
            <tr>
                <?php
                        $totalPrice = 0;
                        $secondQuantity = 0;
                        $totalRow= count($setSolution);
                        $totalNbAntennas= count($setSolution);
                        $idConcat = "";
                        foreach ($setSolution as $key => $value) {
                            $totalPrice+= $value->msp_usd;
                            $idConcat.= $value->id."_";
                        }
                        $idConcat= substr($idConcat, 0, -1);
                            $firstQuantity = 1;
                            if(count($setSolution) == 2 && $setSolution[0]->id == $setSolution[1]->id )
                            {
                                unset($setSolution[1]);
                                $totalRow--;
                                $firstQuantity = 2;
                            }
                            if (count($setSolution) == 3)
                            {
                                if($setSolution[0]->id == $setSolution[1]->id)
                                {
                                    unset($setSolution[1]);
                                    $totalRow--;
                                    $firstQuantity++;
                                }
                                if($setSolution[0]->id == $setSolution[2]->id)
                                {
                                    unset($setSolution[2]);
                                    $totalRow--;
                                    $firstQuantity++;
                                }
                                if(isset($setSolution[1]) && isset($setSolution[2])
                                    && $setSolution[1]->id == $setSolution[2]->id ){
                                    unset($setSolution[2]);
                                    $secondQuantity=2;
                                    $totalRow--;
                                }
                            }
                    ?>
                <td style="vertical-align: middle;" align="center" rowspan={{ $totalRow }}>{{ $confNb++ }}
                    {{-- @if(Auth::user()->type=='admin' || Auth::user()->type=='salesman') --}}

                    <a name="AnalyseConfig"
                        href="/AnalyseConfig/Conf={{ $confNb-1 }}/Ids={{ $idConcat }}/{{ $AnalyseConfig_link }}"
                        target="_blank">
                        <i class="far fa-question-circle"></i>
                    </a>
                    {{-- @endif --}}

                </td>
                <td style="vertical-align: middle;" align="center" rowspan={{ $totalRow }}>{{  $totalNbAntennas}}</td>
                <td align="center">{{ $setSolution[0]->model_nb }}</td>
                <td align="center">{{ $setSolution[0]->total_nb_ports }}</td>
                <td align="center">{{ $setSolution[0]->ports_lt_1GH }}</td>
                <td align="center">{{ $setSolution[0]->ports_btw_1_3GH }}</td>
                <td align="center">{{ $setSolution[0]->ports_bt_3GH }}</td>
                <td align="center">{{ $setSolution[0]->height_mm }}</td>
                @if(Auth::user()->type=='admin' || Auth::user()->type=='salesman')
                <td align="center">{{ $setSolution[0]->msp_usd }}</td>
                @endif
                <td>
                    {{ $firstQuantity  }}
                </td>

                <td align="center"><a href="{{ $setSolution[0]->link_online }}">Data sheet</a></td>
                @if(Auth::user()->type=='admin')
                <td style="vertical-align: middle;" align="center" rowspan={{ $totalRow }}>{{ $totalPrice }} </td>
                @endif
            </tr>
            <?php unset($setSolution[0])?>

            @foreach ($setSolution as $item)
            <tr>
                <td align="center">{{ $item->model_nb }}</td>
                <td align="center">{{ $item->total_nb_ports }}</td>
                <td align="center">{{ $item->ports_lt_1GH }}</td>
                <td align="center">{{ $item->ports_btw_1_3GH }}</td>
                <td align="center">{{ $item->ports_bt_3GH }}</td>
                <td align="center">{{ $item->height_mm }}</td>
                @if(Auth::user()->type=='admin' || Auth::user()->type=='salesman')
                <td align="center">{{ $item->msp_usd }}</td>@endif
                <td align="center">
                    <?php
                            if($secondQuantity!= 0)
                                echo 2;
                            else {
                                echo 1;
                            }
                        ?>

                </td>
                <td align="center"><a href="{{ $item->link_online }}">Datasheet</a></td>

            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @else
    <p>Sorry, There is No solution at with given input</p>
    @endif
</div>
</div>

</div>
<br><br><br>
@endsection
