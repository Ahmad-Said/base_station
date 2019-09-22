{{-- Must provide three arrays
    ordered together as
    $technology
    $port
    $bandSymbols     // use XgBands::getSymbols($technology,$band) function to generate it


    --}}


<table id="Tech" class="table table-hover table-responsive-lg table-info table-bordered table-sm" cellspacing="0"
    width="100%">
    <thead>
        <tr>
            <th>Technology</th>
            <th>Port</th>
            <th>Frequency</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($technology as $key => $Techitem)

        <tr>
            <td>{{ $technology[$key] }}G</td>
            <td>{{ $port[$key] }}</td>
            <td>{{ $bandSymbols[$key] }}</td>
        </tr>

        @endforeach
    </tbody>
</table>
