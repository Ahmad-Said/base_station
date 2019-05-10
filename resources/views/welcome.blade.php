@extends('layouts.app')
@section('content')
<script>
    function generategp (array) {
            var st='';
            var nb=2;
            array.forEach(element => {
                st+='<option value='+nb+'>'+element+'</option>';
                nb*=2;
            });
            return st;
        }

        var gp2=["2 ports","4 ports"];
        var gp3=["2 ports","4 ports"];
        var gp4=["2 ports","4 ports","8 ports"];
        var gp5=["2 ports","4 ports","8 ports","12 ports"];
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
        var gf2 = <?php echo  json_encode($band2); ?>;
        var gf3 = <?php echo  json_encode($band3); ?>;
        var gf4 = <?php echo  json_encode($band4); ?>;
        var gf5 = <?php echo  json_encode($band5); ?>;

        var stgf2=generategf(gf2);
        var stgf3=generategf(gf3);
        var stgf4=generategf(gf4);
        var stgf5=generategf(gf5);

</script>

<div class="container">
    <div class="row justify-content-center">
        {{--
        <div class="col-xs-12"> --}}
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">
                        <h4 align="center">Enter Item Details</h4>
                    </div>
                    <div class="card-body">


                        <form method="post" id="insert_form">
                            <br>
                            <div class="form-group row">
                                <label for="number_system" class="col-md-4 col-form-label text-md-right">{{ __('Number Of System') }}</label>

                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="system_number" name="system_number" min=0 max=13 value=1>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="antenna_per_sector" class="col-md-4 col-form-label text-md-right">{{ __('Max Antennas per sector') }}</label>

                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="antenna_per_sector" name="antenna_per_sector" min=1>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="max_height" class="col-md-4 col-form-label text-md-right">{{ __('Max Height') }}</label>

                                <div class="col-md-4">
                                    <input type="number" class="form-control" id="max_height" name="max_height" min=1>
                                </div>
                            </div>

                            <div class="table-repsonsive">
                                <span id="error"></span>
                                <table class="table table-bordered" id="item_table">
                                    <tr>
                                        <th>Select Unit</th>
                                        <th>Number of Port</th>
                                        <th>Frequency</th>
                                        <th><button type="button" name="add" class="btn btn-success btn-sm add float-right"><span class="fas fa-plus-circle"></span></button></th>
                                    </tr>
                                    <tr>
                                        <td><select name="technologie[]" id="technologie" class="form-control dynamic"><option value="" disabled selected>Technologie</option><option value="2">2G</option><option value="3">3G</option><option value="4">4G</option><option value="5">5G</option></select></td>
                                        <td><select name="port[]" id="port" class="form-control ports" disabled><option value="" disabled selected>Port Number</option></select></td>
                                        <td><select name="band[]" id="band" class="form-control bands" disabled><option value="" disabled selected>Frequency</option></select></td>
                                        <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-minus-circle"></span></button></td>
                                    </tr>

                                </table>
                                <div align="center">
                                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                                </div>
                            </div>
                        </form>

                        <br>

                        <script>
                            $(document).ready(function(){
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
                                    html += '<td><select name="technologie[]" id="technologie" class="form-control dynamic" ><option value="" disabled selected>Technologie</option><option value="2">2G</option><option value="3">3G</option><option value="4">4G</option><option value="5">5G</option></select></td>';
                                    html += '<td><select name="port[]" id="port" class="form-control ports" disabled><option value="" disabled selected>Port Number</option></select></td>';
                                    html += '<td><select name="band[]" id="band" class="form-control bands" disabled><option value="" disabled selected>Frequency</option></select></td>';
                                    html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-minus-circle"></span></button></td></tr>';
                                    $('#item_table').append(html);
                                    $('#error').html('');
                                };
                                $(document).on('change', '.dynamic', function(){
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

                      });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
