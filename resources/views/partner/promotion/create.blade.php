@extends('partner.template.index')

@section('bonusCss')
    <script language='javascript' src="{{ url('public/bootstrap/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    <script language='javascript' src="{{ url('public/tools/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
   
@endsection

@section('main_content')
<?php
    $titleForm = "Create Promotion in Restaurant";
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $titleForm }}</h3>
                </div><!-- /.box-header -->

                    <!-- form start -->
                    @include('message.message')

                    {!! Form::open(array('route' => 'post.partner.promotion.create', 'files' => true)) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!!Form::hidden('item_id', $idRestaurant)!!}
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', '',array('class' => 'form-control name', 'placeholder' => 'Enter name')) !!}
                        </div>
                        <span class="report-name"></span>

                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="datetime-local" name="start_date" class="start_date"/>
                        </div>
                        <span class="report-startdate"></span>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="datetime-local" name="end_date" class="end_date"/>
                        </div>
                        <span class="report-enddate"></span>

                        <div class="form-group">
                            <label>Quantity</label>
                            {!! Form::input('number', 'quantity', '',array('class' => 'form-control quantity', 'placeholder' => 'Quantity')) !!}
                        </div>
                        <span class="report-quantity"></span>

                        <div class="form-group">
                            <label>Rate Discount</label>
                            {!! Form::input('number', 'rate_discount', '',array('class' => 'form-control rate_discount', 'placeholder' => 'Rate Discount')) !!}
                        </div>
                        <span class="report-ratediscount"></span>

                        <div class="form-group">
                            <label>Description</label>
                            {!! Form::textarea('description', 'Description about promotion of your restaurant...', array('class' => 'description', 'rows' => '3')) !!}
                        </div>
                        <span class="report-description"></span>
                        
                        <script type="text/javascript">
                            CKEDITOR.replace('description'); 
                        </script>
                        
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img" class="image"/> 
                        </div>
                        <span class="report-image"></span>
                        </div>
                    </div>


                    <div class="box-footer">
                        <input name="confirm" class="btn btn-primary" type="submit" value="Confirm" id="submit">
                    </div>               
                    <a href="{{route('get.partner.promotion.list', array('idRestaurant' => $idRestaurant))}}" class="btn btn-primary">Back to Promotion</a>         
                    {!! Form::close() !!}
             </div>
       </div>
     </div>
 @endsection

 @section('bonusJs')
    <script type="text/javascript">
        $(document).ready(function(){

            $("#submit").on('click', function(){
               
                $('.report-name').text('');
                $('.report-startdate').text('');
                $('.report-enddate').text('');
                $('.report-quantity').text('');
                $('.report-ratediscount').text('');
                $('.report-description').text('');
                $('.report-image').text('');
                $name = $('.name').val();
                $startdate = $('.start_date').val();
                $enddate = $('.end_date').val();
                $quantity = $('.quantity').val();
                $rate_discount = $('.rate_discount').val();
                $description = $('.description').val();
                $image = $('input[type=file]');
                //validate
                if($name == ''){
                    $('.report-name').text("Enter your name!");
                    $('.name').focus();
                    return false;
                }
                else if($startdate == ''){
                    $('.report-startdate').text("Enter start date!");
                    $('.start_date').focus();
                    return false;
                }
                else if($enddate == ''){
                    $('.report-enddate').text("Enter end date!");
                    $('.end_date').focus();
                    return false;
                }
                else if(new Date($enddate).getTime() <= new Date($startdate).getTime()){
                    $('.report-enddate').text("End date must be bigger than start date!");
                    $('.end_date').focus();
                    return false;
                }
                else if($quantity == ''){
                    $('.report-quantity').text("Enter quantity!");
                    $('.quantity').focus();
                    return false;
                }
                else if($rate_discount == ''){
                    $('.report-ratediscount').text("Enter rate discount!");
                    $('.rate_discount').focus();
                    return false;
                }
                else if($description == ''){
                    $('.report-ratediscount').text("Enter rate discount!");
                    $('.rate_discount').focus();
                    return false;
                }
                else if($image.val() == ''){
                            $('.report-image').text("Please choose an image!");
                            $('.image').focus();
                            return false;
                        }
                return true;
            });
            $(".roleUser").click(function(){
                if(!$("#admin").is(":checked") && !$("#partner").is(":checked")){
                    $("#partner").click();
                }
            });
            
        });
    </script>

 @endsection