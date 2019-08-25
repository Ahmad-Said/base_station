@extends('layouts.app')
@section('content')
{{-- https://stackoverflow.com/questions/25838135/how-to-make-responsive-bootstrap-3-pagination --}}
<style>

    .table tbody tr.warning {
        background-color: greenyellow !important;
        /* #f71111 */
    }

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
{{-- <script>
    $(document).ready(function () {
          $('.pagination').addClass("pagination-responsive");
          $('.pagination').attr("role","navigation");
  });
</script> --}}
@endif

{{-- <script>
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

</script> --}}




<div class="card text-center table-responsive border-dark" style="border-width:2px;">
    <div class="card-header" style="color:#fc0703; background-color:#d6d7d4">
    <h4><b>Antennas Prices</b></h4>
    </div>
    <div class="card-body">
        <br>
        <br>


        {!! Form::open(['action' => ['PricesController@store'] , 'method' => 'POST']) !!}
        <table id="pricetable" class="table table-hover table-responsive-lg  table-striped table-bordered table-sm"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Antenna Id</th>
                    <th>Price ( $ )</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($antennas as $id => $price)
                <tr class="gggg">
                    <td> {{ $id }}</td>
                    <td>
                        <input type="hidden" name='antennasId[]' value={{ $id }} >
                        <input class="dynamic" type="number" name='prices[]' min="0" max="999999" value={{ $price }} required="true">
                    </td>
                    <td class="stat">Not Changed</td>
                </tr>
                @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th>NB</th>
                <th>Set</th>
            </tr>
        </tfoot>
        </table>
        <div style="text-align:center">
                <input type="submit" id="backBtn" name="backBtn" class="btn btn-primary" value="Edit Form" />
            </div>
        {!! Form::close() !!}

    </div>
</div>

<br><br><br>


<script>
    // https://stackoverflow.com/questions/17594413/javascript-or-jquery-browser-back-button-click-detector
    // this to make on back button browser clicked to make it like edit recent form
    // (document).ready(function($) {
    //     $(document).on('change', '.dynamic', function(){
    //         alert("okkk");
    //         console.log("this");
    //         $(this).closest('td').find('.stat').html("Changed");


    //     }
        // )});

        $(".dynamic").change(function(){
            // alert("okkk");
            // console.log("this");
            $(this).closest('tr').find('.stat').html("Changed");
            // $(this).parent('tr').addClass('warning');
            $(this).parents('tr').addClass("warning");

        })
</script>
@endsection

