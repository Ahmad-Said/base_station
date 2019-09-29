@extends('layouts.app')
@section('content')
<script>
    function generategp (array) {
            var st='';
            var i=0;
            array.forEach(element => {
                st+='<option value='+portsNb[i++]+'>'+element+'</option>';
            });
            return st;
        }

        var portsNb = [2,4,8,12];
        var gp2=["2 ports","4 ports"];
        var gp3=["2 ports","4 ports"];
        var gp4=["2 ports","4 ports","8 ports"];
        var gp5=["2 ports","4 ports","8 ports","12 ports"];
        // String group port 2 ...
        var stgp2=generategp(gp2);
        var stgp3=generategp(gp3);
        var stgp4=generategp(gp4);
        var stgp5=generategp(gp5);


        function generategf (array) {
            var st='';
            array.forEach(element => {
                st+='<option value='+element.id+'>'+element.symbol+'</option>';
            });
            return st;
        }
        var gf2 = <?php echo  json_encode($bands[2]); ?>;
        var gf3 = <?php echo  json_encode($bands[3]); ?>;
        var gf4 = <?php echo  json_encode($bands[4]); ?>;
        var gf5 = <?php echo  json_encode($bands[5]); ?>;
        // String group Frequency 2 ...
        var stgf2=generategf(gf2);
        var stgf3=generategf(gf3);
        var stgf4=generategf(gf4);
        var stgf5=generategf(gf5);

</script>
<?php
$optionsSelect ="";
for ($i=2; $i <=5 ; $i++) {
    if(count($bands[$i])>0)
         $optionsSelect.="<option value=\"$i\">".$i."G</option>";
}

?>

{{-- https://stackoverflow.com/questions/15176098/cant-span-form-over-multiple-divs --}}
{!! Form::open(['action' => ['AnalyserController@showResult'] , 'method' => 'GET', 'enctype' =>
'multipart/form-data', 'class' => 'form-prevent-multiple-submits']) !!}
<div class="container">
    <div class="row justify-content-center">
        {{--
<div class="col-xs-12"> --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 style="text-align:center">
                        Enter Item Details
                        <br>
                        <h6 style="text-align:center">
                            <button type="submit" class="" id="generate-link-submit" name="generateLinkOnly"
                                value="exist" data-toggle="tooltip" data-delay="0" data-placement="top"
                                title="Generate Link to clipboard">
                                <span class="fas fa-link"> Copy link to clipboard</span>
                                <br>
                                <i class="fas fa-spinner fa-spin" id='myspinner2' style="display: none"></i>
                                <i id="submit-text-generate-link"> </i>
                            </button>
                        </h6>
                        @isset($copyLinkToClip)
                        <input id="urlofcurentpage" type="text" class="" value={{ url()->full() }}>
                        <script>
                            /* Get the text field */
                                var copyText = document.getElementById("urlofcurentpage");

                                /* Select the text field */
                                copyText.select();
                                copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                                /* Copy the text inside the text field */
                                document.execCommand("copy");
                                copyText.classList.add("hidden");
                        </script>
                        @endif
                    </h4>
                </div>
                <div class="card-body">

                    <br>
                    <div class="form-group row">
                        <label for="number_system"
                            class="col-md-4 col-form-label text-md-right">{{ __('Number Of System *') }}</label>

                        <div class="col-md-4">
                            <input type="number" class="form-control" id="system_number" name="system_number" min="0"
                                max="13" value="1">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="antenna_per_sector"
                            class="col-md-4 col-form-label text-md-right">{{ __('Max Antennas per sector *') }}</label>

                        <div class="col-md-4">
                            <select class="form-control" id="antenna_per_sector" name="antenna_per_sector">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <label for="antenna_preferred" class="col-form-label text-md-center" hidden="true"
                                id="antenna_preferred_label">{{ __('Preferred Antennas Number') }}</label>


                            <select class="form-control" id="antenna_preferred" name="antenna_preferred" hidden="true">
                            </select>

                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="max_height"
                            class="col-md-4 col-form-label text-md-right">{{ __('Max Height (mm) (optional)') }}</label>

                        <div class="col-md-4">
                            <input type="number" class="form-control" id="max_height" name="max_height" min="1">
                        </div>
                    </div>

                    <div class="table-repsonsive ">
                        <span id="error"></span>
                        <table class="table table-bordered" id="item_table">
                            <tr>
                                <th>Select Unit</th>
                                <th>Number of Port</th>
                                <th>Frequency</th>
                                <th><button type="button" name="add"
                                        class="btn btn-success btn-sm add float-right"><span
                                            class="fas fa-plus-circle"></span></button></th>
                            </tr>
                            <?php
                                // search for given Frequency and given technology (the arrays XgBands) for the symbol
                                // array example : bands contains all technology so $bands[2] is for 2g.
                                function getBandSymbol($bandtech,$freq){
                                    foreach ($bandtech as $value) {
                                        if($value->bands == $freq )
                                            return $value->symbol;
                                    }
                                }
                                // mean i got here without previous data initialize simple one
                                if (!isset($technology)) {
                                    $html = '';
                                    $html .= '<tr>';
                                    $html .= '<td><select name="technology[]" id="technology" class="form-control dynamic" required="required"><option value="" disabled selected>Technology</option>'.$optionsSelect.'</select></td>';
                                    $html .= '<td><select name="port[]" id="port" class="form-control ports" disabled><option value="" disabled selected>Port Number</option></select></td>';
                                    $html .= '<td><select name="band[]" id="band" class="form-control bands" disabled><option value="" disabled selected>Frequency</option></select></td>';
                                    $html .= '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove float-right"><span class="fas fa-minus-circle"></span></button></td></tr>';
                                    echo $html;
                                }
                            ?>
                        </table>
                        <div style="text-align:center">
                            <button type="submit" class="btn btn-primary" id="show-result-submit" />
                            <i class="fas fa-spinner fa-spin" id='myspinner' style="display: none"></i>
                            <i id="submit-text"> Show Results </i>

                            </button>
                        </div>
                    </div>

                    <br>

                    <script>
                        $(document).ready(function(){


                            // https://www.youtube.com/watch?time_continue=187&v=gJRv2ahMzEg
                            // https://stackoverflow.com/questions/5721724/jquery-how-to-get-which-button-was-clicked-upon-form-submission
                            $('.form-prevent-multiple-submits').on('submit',function(){
                                $('#show-result-submit').attr('disabled','true');
                                var button = $("button[type=submit][clicked=true]");
                                if(button.attr('id') == 'show-result-submit'){
                                        $('#submit-text').html('Computing');
                                        $('#myspinner').show();
                                }else{
                                    $('#submit-text-generate-link').html('Generating Link');
                                    $('#myspinner2').show();
                                };
                            });
                            $("#generate-link-submit ,#show-result-submit").click(function() {
                                $('button[type="submit"]', $(this).parents("form")).removeAttr("clicked");
                                $(this).attr("clicked", "true");
                            });


                       // define a function see
                       // https://stackoverflow.com/questions/907634/is-this-how-you-define-a-function-in-jquery
                        var add_to_table=function(){
                           var rowcount=$('#item_table tr').length;
                           var error='';
                           if(rowcount > 12)
                            {
                                 error+="Number of System must be less than 12";
                                $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                                return;
                            }
                            var html = '';
                            html += '<tr>';
                                html += '<td><select name="technology[]" id="technology" class="form-control dynamic" required=required><option value="" disabled selected>Technology</option><?php echo $optionsSelect;?></select></td>';
                                html += '<td><select name="port[]" id="port" class="form-control ports" disabled><option value="" disabled selected>Port Number</option></select></td>';
                                html += '<td><select name="band[]" id="band" class="form-control bands" disabled><option value="" disabled selected>Frequency</option></select></td>';
                                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-minus-circle"></span></button></td></tr>';
                                $('#item_table').append(html);
                                $('#error').html('');
                            };
                                $(document).on('change', '.dynamic', function(){
                                    // console.log(this);
                                    toprint="";
                                    if((this).value=="2")
                                    {
                                        $(this).closest('tr').find('.ports').html(stgp2);
                                        $(this).closest('tr').find('.bands').html(stgf2);
                                    }

                                    if((this).value=="3")
                                    {
                                        $(this).closest('tr').find('.ports').html(stgp3);
                                        $(this).closest('tr').find('.bands').html(stgf3);
                                    }
                                    if((this).value=="4")
                                    {
                                        $(this).closest('tr').find('.ports').html(stgp4);
                                        $(this).closest('tr').find('.bands').html(stgf4);
                                    }
                                    if((this).value=="5")
                                    {
                                        $(this).closest('tr').find('.ports').html(stgp5);
                                        $(this).closest('tr').find('.bands').html(stgf5);
                                    }
                                    $(this).closest('tr').find('.ports').prop("disabled", false);
                                    $(this).closest('tr').find('.bands').prop("disabled", false);
                                });


                                $(document).on('click', '.add',function(){
                                    add_to_table();
                                    var rowcount=$('#item_table tr').length;
                                    $('#system_number').val(rowcount-1);
                                });

                       $(document).on('click', '.remove', function(){
                        $('#error').html('');
                        var rowcount=$('#item_table tr').length;
                        var error='';
                        if(rowcount ==2)
                        {
                            error+="Number of System must be at least 1";
                            $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                            return;
                        }

                        $(this).closest('tr').remove();
                        $('#system_number').val(rowcount-2);
                       });

                       $('#system_number').change(function(){
                             var rowcount=$('#item_table tr').length;
                            var error='';
                             if(this.value<1)
                                {
                                    error+="Number of System must be greater than 1";
                                    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                                    $('#system_number').val(1);
                                }
                                if(this.value>12)
                                {
                                    error+="Number of System must be less than 12";
                                    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                                    $('#system_number').val(12);
                                }
                            if(error=='')
                                 $('#error').html('');

                            var times=Math.abs(this.value-rowcount +1);
                             if(rowcount-1 < this.value)
                             {
                               for (let index = 0; index < times; index++) {
                                   add_to_table();
                               }
                             }
                             else
                            {
                                for (let index = 0; index < times; index++) {
                                 $('#item_table tr:last').remove();
                                }
                            }
                        });

                        $('#antenna_per_sector').change(function(){
                           var labelPref = $('#antenna_preferred_label');
                           var selecPref = $('#antenna_preferred');

                           selecPref.children().each(function(){
                               $(this).remove();
                           });
                           // https://stackoverflow.com/questions/30808723/how-to-change-attribute-hidden-in-jquery/30808762
                           if($(this).val() == 1){
                               labelPref.attr("hidden",true);
                               selecPref.attr("hidden",true);
                            }else{
                                labelPref.attr("hidden",false);
                                selecPref.attr("hidden",false);
                           }
                           // https://stackoverflow.com/questions/740195/adding-options-to-a-select-using-jquery
                           for (let i = 1; i <= $(this).val(); i++) {
                            selecPref.append($('<option>', {
                                    value: i,
                                    text : i
                                }));
                           }
                        });

                       $('#insert_form').on('submit', function(event){
                        event.preventDefault();
                        var error = '';
                        $('.item_name').each(function(){
                         var count = 1;
                         if($(this).val() == '')
                         {
                          error += "<p>Enter Item Name at "+count+" Row</p>";
                          return false;
                         }
                         count = count + 1;
                        });

                        $('.item_quantity').each(function(){
                         var count = 1;
                         if($(this).val() == '')
                         {
                          error += "<p>Enter Item Quantity at "+count+" Row</p>";
                          return false;
                         }
                         count = count + 1;
                        });

                        $('.item_unit').each(function(){
                         var count = 1;
                         if($(this).val() == '')
                         {
                          error += "<p>Select Unit at "+count+" Row</p>";
                          return false;
                         }
                         count = count + 1;
                        });
                        var form_data = $(this).serialize();
                        if(error == '')
                        {
                         $.ajax({
                          url:"insert.php",
                          method:"POST",
                          data:form_data,
                          success:function(data)
                          {
                           if(data == 'ok')
                           {
                            $('#item_table').find("tr:gt(0)").remove();
                            $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                           }
                          }
                         });
                        }
                        else
                        {
                         $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                        }
                       });

                    //   initializing data table if exist
                    var doPrevExist = <?php if (isset($technology)) echo  "true"; else echo "false" ?>;
                    if(doPrevExist)
                     {
                        var prevTechno = <?php if (isset($technology)) echo  json_encode($technology); else echo "new Array()" ?>;
                        var prevPorts = <?php if (isset($technology)) echo  json_encode($port); else echo "new Array()"  ?>;
                        var prevband = <?php if (isset($technology))echo  json_encode($band); else echo "new Array()"  ?>;
                        for (let index = 0; index < prevTechno.length; index++) {
                            add_to_table();
                            // https://stackoverflow.com/questions/314636/how-do-you-select-a-particular-option-in-a-select-element-in-jquery
                            var currentRow = $('#item_table tr:last');
                            // children return a jqury variable that accept it't method change and stuff
                            // if somehow want the html variable use ..[0]
                            // also use consol.log(variable); to get more details
                            var techselect =  currentRow.children('td:first').children('select');

                            currentRow.children('td:first').find('option[value="'+prevTechno[index]+'"]').prop('selected',true);
                            // initializing selection to corresponding technology
                            // https://stackoverflow.com/questions/22344497/call-explicitly-jquery-change-event
                            techselect.change();
                            currentRow.find('select:eq(1) option[value="'+prevPorts[index]+'"]').prop('selected',true);
                            currentRow.find('select:eq(2) option[value="'+prevband[index]+'"]').prop('selected',true);
                        }
                        // updating system count
                        var rowcount=$('#item_table tr').length;
                        $('#system_number').val(rowcount-1);

                        // update other input
                        $('#antenna_per_sector').children('option:eq(<?php if (isset($technology))echo  $antenna_per_sector-1; else echo "0";  ?>)').prop('selected',true);
                        $('#antenna_per_sector').change();
                        $('#antenna_preferred').children('option:eq(<?php if (isset($antenna_preferred))echo  $antenna_preferred-1; else echo "0";  ?>)').prop('selected',true);
                        $('#max_height').val(<?php if (isset($max_height))echo  $max_height;?>);
                     }

                    // always ensure that second row (first row in data selection) get updated
                    // this was added cause sometimes on back button using browser
                    // the first row is bad formed
                    $('#item_table tr:eq(1)').children('td:first').children('select').change();

                      });



                    // for ($i=0; $i < count($technology); $i++) {
                    //     $html = '';
                    //     $html .= '<tr>';
                    //     $html .= '<td><select readonly="readonly" name="technology[]" id="technology" class="form-control dynamic"><option value='.$technology[$i].'  selected>'.$technology[$i].'G</option></select></td>';
                    //     $html .= '<td><select readonly="readonly" name="port[]" id="port" class="form-control ports"><option value='.$port[$i].'  selected>'.$port[$i].' ports</option></select></td>';
                    //     $html .= '<td><select readonly="readonly" name="band[]" id="band" class="form-control bands"><option value='.$band[$i].'  selected>'.getBandSymbol($bands[$technology[$i]],$band[$i]).' </option></select></td>';
                    //     $html .= '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-minus-circle"></span></button></td></tr>';
                    //     echo $html;
                    // }



                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection
