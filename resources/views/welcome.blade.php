@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">  
                     <h4 align="center">Enter Item Details</h4></div>
                <div class="card-body">
                             
                                              
                         <form method="post" id="insert_form">
                            <br>
                             <div class="form-group row">
                                    <label for="number-system" class="col-md-4 col-form-label text-md-right">{{ __('Number Of System') }}</label>
        
                                    <div class="col-md-4">
                                        <input  type="number" class="form-control" id="system_number" name="system_number" min=0 max=13>
                                    </div>
                                </div>

                          <div class="table-repsonsive">
                           <span id="error"></span>
                           <table class="table table-bordered" id="item_table">
                            <tr>
                             <th>Enter Item Name</th>
                             <th>Enter Quantity</th>
                             <th>Select Unit</th>
                             <th>Number of Port</th>
                             <th><button type="button" name="add" class="btn btn-success btn-sm add float-right"><span class="fas fa-plus-circle"></span></button></th>
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
                                html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
                                html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
                                html += '<td><select name="technologie[]" id="technologie" class="form-control dynamic" ><option value="">Select technologie</option><option value="2g">2G</option><option value="3g">3G</option><option value="4g">4G</option></select></td>';                     
                                html += '<td><select name="port[]" id="port" class="form-control ports"><option value="">Select number of Port</option> </select></td>';
                                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-minus-circle"></span></button></td></tr>';
                                $('#item_table').append(html);
                                $('#error').html('');
                            };
                            $(document).on('change', '.dynamic', function(){                                   
                                if((this).value=="2g")
                                     $(this).closest('tr').find('.ports').html("<option>2 port</option><option>4 port</option>");
                                if((this).value=="3g"){                              
                                    $(this).closest('tr').next().find('.ports').html("<option>2 port</option><option>4 port</option><option>6 port</option>"); 
                                }
                                if((this).value=="4g")
                                    $(this).closest('tr').find('.ports').html("<option>2 port</option><option>4 port</option><option>6 port</option><option>8 port</option>");
                                });
                                  
                            $(document).on('click', '.add',function(){
                                add_to_table();
                                $('#system_number').val($('#item_table tr').length -1);
                            });
                       
                       $(document).on('click', '.remove', function(){
                        $('#error').html('');
                        $(this).closest('tr').remove();
                        var rowcount=$('#item_table tr').length;
                        $('#system_number').val(rowcount-1);
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
                
                {{ csrf_field() }}
            </div>
        </div>
    </div>
</div>   
@endsection