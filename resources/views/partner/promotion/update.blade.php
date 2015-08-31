@extends('partner.template.index')

@section('bonusCss')
    <script language='javascript' src="{{ url('public/bootstrap/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    <script language='javascript' src="{{ url('public/tools/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endsection

@section('main_content')
<?php
    $titleForm = "Update Promotion in Restaurant";
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
                        <a href="{{route('get.partner.promotion.list', array('idRestaurant' => $idRestaurant))}}"><i class="fa fa-reply-all" style="font-size: 0.8em"></i>Back to Promotion</a>
                    </div>
                    <?php $idPromotion = $InfoPromotion['_id']; ?>
                    {!! Form::open(array('route'=> array('post.partner.promotion.update', $idPromotion), 'files' => true)) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!!Form::hidden('item_id', $idRestaurant)!!}
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', $InfoPromotion['name'],array('class' => 'form-control name', 'placeholder' => 'Enter name')) !!}
                        </div>
                        <span class="report-name"></span>

                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="datetime-local" name="start_date" class="start_date" value="{{$InfoPromotion['start_date']}}" />
                        </div>
                        <span class="report-startdate"></span>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="datetime-local" name="end_date" class="end_date" value="{{$InfoPromotion['end_date']}}" />
                        </div>
                        <span class="report-enddate"></span>

                        <div class="form-group">
                            <label>Quantity</label>
                            {!! Form::input('number', 'quantity', $InfoPromotion['quantity'],array('class' => 'form-control quantity')) !!}
                        </div>
                        <span class="report-quantity"></span>

                        <div class="form-group">
                            <label>Rate Discount</label>
                            {!! Form::input('number', 'rate_discount', $InfoPromotion['rate_discount'],array('class' => 'form-control rate_discount')) !!}
                        </div>
                        <span class="report-ratediscount"></span>

                        <div class="form-group">
                            <label>Description</label>
                            {!! Form::textarea('description', $InfoPromotion['description'], array('class' => 'description', 'rows' => '3')) !!}
                        </div>
                        <span class="report-description"></span>
                        
                        <script type="text/javascript">
                            CKEDITOR.replace('description'); 
                        </script>
                        
                        <div class="col-md-2">
                            <label>Previous Image</label>
                            <img src="{{$InfoPromotion['img']}}" style="width:100px" />
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Image</label>                        
                                <input type="file" name="img" class="image"/>
                            </div>
                        </div>
                        
                        <span class="report-image"></span>
                        </div>
                    </div>

                    <div class="box-footer">
                        <input name="confirm" class="btn btn-primary" type="submit" value="Confirm" id="confirm">
                    </div>               
                             
                    {!! Form::close() !!}
             </div>
       </div>
     </div>
 @endsection

 @section('bonusJs')
 
    <script type="text/javascript">
        $(document).ready(function(){

            $("#confirm").on('click', function(){
       
                // $('.report-name').text('');
                $('.report-startdate').text('');
                $('.report-enddate').text('');
                // $('.report-quantity').text('');
                // $('.report-ratediscount').text('');
                // $('.report-description').text('');
           
                // $name = $('.name').val();
                $startDate = $('.start_date').val();
                $endDate = $('.end_date').val();
                // $quantity = $('.quantity').val();
                // $rateDiscount = $('.rate_discount').val();
                // $description = CKEDITOR.instances.description.getData();
                // alert($name);
                //validate name
              
                // if(!validateName($name)) return false;

                // validate date
                if($startdate != '' || $enddate != ''){
                    if(!validateStartDate($startDate)) return false;
                    if(!validateEndDate($startDate, $endDate)) return false;
                }
                // validate quantity empty
                // if(!validateQuantity($quantity)) return false;
                //validate rate empty
                // if(!validateRateDiscount($rateDiscount)) return false;
                //validate description empty
                // if(!validateDescription($description)) return false;
                
             
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