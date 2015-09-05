
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
                    <div class="box-header">
                        <a href="{{route('get.partner.promotion.list', array('idRestaurant' => $idRestaurant))}}"><i class="fa fa-reply-all" style="font-size: 0.8em"></i> Back to Promotion</a>
                    </div>
                    
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
                            {!!Form::textarea('description', '', array('class'=> 'description'))!!}
                        </div>
                        <span class="report-description"></span>
                        
                        <script type="text/javascript">
                            CKEDITOR.replace('description'); 
                        </script>
                        
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img" class="image" /> 
                        </div>
                        <span class="report-image"></span>
                        </div>
                    </div>

                  
                    <div class="box-footer">
                        <input name="confirm" class="btn btn-primary" type="submit" value="Confirm" id="submit">
                    </div>               
                             
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
                $startDate = $('.start_date').val();
                $endDate = $('.end_date').val();
                $quantity = $('.quantity').val();
                $rateDiscount = $('.rate_discount').val();
                $description = CKEDITOR.instances.description.getData();
                $image = $('input[type=file]');
                //validate
                if(!validateName($name)) return false;
                if(!validateStartDate($startDate)) return false;
                if(!validateEndDate($startDate, $endDate)) return false;
                if(!validateQuantity($quantity)) return false;
                if(!validateRateDiscount($rateDiscount)) return false;
                if(!validateDescription($description)) return false;
                if(!validateImage($image)) return false;
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