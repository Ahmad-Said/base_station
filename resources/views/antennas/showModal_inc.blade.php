{{-- Your table antennas list must have
    this structure:
     <th>Antenna Model Number</th>
     <th>Total Ports #</th>
     <th>Low Band</th>
     <th>Mid Band</th>
     <th>High Band</th>
     <th>Height (mm)</th>
     <th>Unit Price ($)</th>
     <th>Link to data sheets</th>

     simple button template:

      <button type="button" class="show-info" data-toggle="modal"
        data-target="#show_info_modal">
        <i class="far fa-question-circle"></i>
    </button>
    <input type="hidden" id="bands_info" value={{ (json_encode($item->Bands)) }}>

https://stackoverflow.com/questions/29739745/laravel-blade-passing-variable-with-string-through-include-causes-error
then in order to use just call laravel function @include('antennas.showModal_inc',$data)
where $data is an array associative from name as key to value
passed having a key is how much columns to skip from the begining of table
example:
@include('antennas.showModal_inc',['offset_table' => 0])
--}}

<input type="number" hidden id="offset_table" value="{{ $offset_table }}" />
<script>
    function generateTrBands(array) {
    var st='';
    array.forEach(element => {
        st+='<tr><td> '+element.min+'</td><td>'+element.max+'</td> <td>'+element.totalPorts+'</td></tr>';
    });
    return st;
}

$(document).ready(function () {
        // on modal show
        // this commented don't work on hidden field on datatable
        // $('.show-info').on('click', function (event) {
        // use this appraoch instead
        $(document).on('click', '.show-info', function(){
            var button = $(this); // button that triggered the modal
            var row = button.closest('tr');
            // get data row
            var offset_table = $("#offset_table").val();
            var model_mod  = row.children('td:eq('+offset_table+++')').text().trim();
            var total_mod  = row.children('td:eq('+offset_table+++')').text().trim();
            var low_mod    = row.children('td:eq('+offset_table+++')').text().trim();
            var mid_mod    = row.children('td:eq('+offset_table+++')').text().trim();
            var high_mod   = row.children('td:eq('+offset_table+++')').text().trim();
            var height_mod = row.children('td:eq('+offset_table+++')').text().trim();
            var price_mod  = row.children('td:eq('+offset_table+++')').text().trim();
            var link_mod   = row.children('td:eq('+offset_table+++')').html();

            // Parsing data bands
            var bands_input = button.next("#bands_info");
            var bands_array =jQuery.parseJSON(bands_input.val());
            var tr_gen = generateTrBands(bands_array);
            // Update the modal's content. We'll use jQuery here,
            // but you could use a data binding library or other methods instead.
            var modal = $('#show_info_modal');
            modal.find('#model_mod').html(model_mod);
            modal.find('#total_mod').html(total_mod);
            modal.find('#low_mod').html(low_mod);
            modal.find('#mid_mod').html(mid_mod);
            modal.find('#high_mod').html(high_mod);
            modal.find('#height_mod').html(height_mod);
            modal.find('#price_mod').html(price_mod);
            modal.find('#link_mod').html(link_mod);
            modal.find('#bands-table-mod tbody').html(tr_gen);
            // modal.find('table').htlm(generateTrBands(['hello']));
        });
    });

</script>





<!-- Attachment Modal for antennas Details- -->
<div class="modal fade right" id="show_info_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-lg modal-side modal-top-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Antennas Full Informations</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="attachment-body-content">
                <table class="table table-striped">
                    <tr>
                        <th>Model Number</th>
                        <th>Total</th>
                        <th>Low Bd</th>
                        <th>Mid Bd</th>
                        <th>High Bd</th>
                        <th>Height mm</th>
                        <th> ($)</th>
                        <th>Link</th>
                    </tr>
                    <tr>
                        <td id="model_mod"></td>
                        <td id="total_mod"></td>
                        <td id="low_mod"></td>
                        <td id="mid_mod"></td>
                        <td id="high_mod"></td>
                        <td id="height_mod"></td>
                        <td id="price_mod"></td>
                        <td id="link_mod"></td>
                    </tr>
                </table>
                <table class="table table-striped table-hover" id="bands-table-mod">
                    <thead class="thead">
                        <tr>
                            <th>Min Frequency Band</th>
                            <th>Max Frequency Band</th>
                            <th>Number of ports</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment end Modal Show antennas Details-->
