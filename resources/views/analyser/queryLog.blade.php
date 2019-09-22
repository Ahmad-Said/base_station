@extends('layouts.app')
@section('content')
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


<h1>Queries Log</h1>
<br>
<div class="card card-body bg-light text-center">
    <div class="alert alert-info text-left">
        <i>
            <h5>
                Summary
            </h5>
            Total Nb of Queries: {{ $allCachedResult->total() }}.
            <br>
            Last Query Date: {{ $lastQueryDate }}.
        </i>
    </div>
    {{ $allCachedResult->links() }}
    <br>
    <br>
    @if(count($allCachedResult) >= 1)
    <table id="dtBasicExample" class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Query Nb#</th>
                <th>User</th>
                <th>System Tech</th>
                <th>Total ports</th>
                <th>Combinations Numbers</th>
                <th>Solution (Antennas#)</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allCachedResult as $item)
            <tr>
                <td>
                    {{ $queryNb-- }}
                    <a href="{{ $item->link }}" target="_blank"><i class="far fa-question-circle"></i></a>
                </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->tech }}</td>
                <td>{{ $item->sum_ports }}</td>
                <td>{{ $item->combination_nb }}</td>

                @if ( $item->solution_count )
                <td class="alert alert-success">

                    @else
                <td class="alert alert-danger">

                    @endif
                    {{ $item->solution_count }}
                </td>
                <td>{{ $item->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Query Nb#</th>
                <th>User</th>
                <th>System Tech</th>
                <th>Total ports</th>
                <th>Combinations Numbers</th>
                <th>Solution (Antennas#)</th>
                <th>Last Updated</th>
            </tr>
        </tfoot>
    </table>
</div>
@else
<p>No Recent Queries Found</p>

@endif
@endsection
