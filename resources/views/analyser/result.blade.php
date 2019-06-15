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




<div class="card text-center table-responsive">
    <div class="card-header">
        Results
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
        <br>........................................................................................

        {{-- @endif --}}

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

                @foreach($AntennaSolution as $key => $setSolution)
                <tr>
                    <td>{{ $key+1 }}</td>
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
                                    {{-- <td>{{ $antennaItem->Bands }}
                    </td> --}}
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
<input type="hidden" name=antenna_preferred value="<?php echo $antenna_preferred; ?>">
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
