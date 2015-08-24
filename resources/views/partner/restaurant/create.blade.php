
 @extends('partner.template.index')

@section('bonusCss')
    <script language='javascript' src="{{ url('public/bootstrap/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
    <script language='javascript' src="{{ url('public/tools/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endsection

@section('main_content')
<?php
    $titleForm = "Create A Promotion in Restaurant";
?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $titleForm }}</h3>
                </div><!-- /.box-header -->
                     <!-- form start -->
                    @include('message.message')
                    {!! Form::open(array('route' => 'post.partner.restaurant.create', 'files' => true)) !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name',old('name','Đỗ Tuấn Anh'),array('class' => 'form-control', 'placeholder' => 'Enter name')) !!}
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            {!! Form::file('cover_photo') !!}
                            <p class="help-block">Upload restaurant's image at here</p>
                        </div>

                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('is_active', 'true', true) !!} <b>Activate</b>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('__v', 0, true) !!} <b>__V</b> 
                            </label>
                        </div>
                        

                        <div class="form-group">
                            <label>Shipping</label>
                            <div class="col-xs-11 col-xs-offset-1">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox("shipping[is_provided]", 'true', true) !!}
                                        <b>Provided</b>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Cost</label>
                                    {!! Form::text("shipping[cost]",old("shipping['cost']",'12.5'),array('class' => 'form-control', 'placeholder' => 'Enter cost')) !!}
                                </div>
                                <div class="form-group">
                                    <label>Max distance</label>
                                    {!! Form::text("shipping[max_distance]",old("shipping['max_distance']",'10'),array('class' => 'form-control', 'placeholder' => 'Enter max distance')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Meals</label>
                            <div class="col-xs-11 col-xs-offset-1">
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('meals[breakfast]', 'true', true) !!}
                                        <b>Breakfast</b>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('meals[lunch]', 'true', true) !!}
                                        <b>Lunch</b>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('meals[dinner]', 'true', true) !!}
                                        <b>Dinner</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Categories</label>
                            <div class="col-xs-11 col-xs-offset-1">
                                <label>Food Style</label>
                                <select multiple="multiple" name="categories[food_style][]" class="form-control">
                                    <option value="Lẩu" selected="selected">Lẩu</option>
                                    <option value="Nướng" selected="selected">Nướng</option>
                                    <option value="Hấp" selected="selected">Hấp</option>
                                    <option value="ABC">ABC</option>
                                </select>
                                <div class="form-group">
                                    <label>Country Style</label>
                                    <select multiple name="categories[country_style][]" class="form-control">
                                        <option value="Vietnamese" selected="selected">Vietnamese</option>
                                        <option value="USA">USA</option>
                                        <option value="Japanese" selected="selected">Japanese</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Restaurant type</label>
                                    {!! Form::text('categories[restaurant_type][]',old('categories[restaurant_type][]', 'Nhà hàng sang trọng'),array('class' => 'form-control', 'placeholder' => 'Enter restaurant type')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Information</label>
                            <div class="col-xs-11 col-xs-offset-1">
                                <div class="form-group">
                                    <label>Open hour</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="information[open_hour]" value="{{ old('information[open_hour]', '8:00 AM')}}">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Close hour</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="information[close_hour]" value="{{ old('information[close_hour]', '6:00 PM')}}">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Holiday</label>
                                    {!! Form::text('information[holiday]',old('information[holiday]', 'Tết nguyên đán'),array('class' => 'form-control', 'placeholder' => 'Enter holiday')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Capacity</label>
                                    {!! Form::number('information[capacity]',old('information[capacity]','100'),array('class' => 'form-control', 'placeholder' => 'Enter capacity')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Prepared time</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="information[prepared_time]" value="{{ old('information[prepared_time]', '20 phút') }}">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="description" class="form-control" rows="3" placeholder="Enter ..." name="information[description]">{{ old('information[description]', 'Đây là mô tả của tôi') }}</textarea>
                                </div>

                                <script type="text/javascript">
                                    CKEDITOR.replace('description'); 
                                </script>
                                
                                <div class="form-group">
                                    <label>Main Dishes</label>
                                    <select multiple name="information[main_dishes][]" class="form-control">
                                        <option value="Gà quay" selected="selected">Gà quay</option>
                                        <option value="Vịt nướng" selected="selected">Vịt nướng</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Suitable</label>
                                    {!! Form::text('information[suitable][]',old('information[suitable][]', 'Sinh nhật'),array('class' => 'form-control', 'placeholder' => 'Enter suitable')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="col-xs-11 col-xs-offset-1">
                                        <div class="form-group">
                                            <label>Lower</label>
                                            {!! Form::number('information[price][lower]',old('information[price[lower]]', '50'),array('class' => 'form-control', 'placeholder' => 'Enter lower')) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Upper</label>
                                            {!! Form::number('information[price][upper]',old('information[price][upper]', '100'),array('class' => 'form-control', 'placeholder' => 'Enter upper')) !!}
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('information[price][unit]', 'VNĐ', true) !!}
                                                <b>Unit</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pros</label>
                                    {!! Form::text('information[pros][]',old('pros', 'Nhà hàng đẹp, Vị trị thuận tiện'),array('class' => 'form-control', 'placeholder' => 'Enter pros')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Menus</label>
                                    {!! Form::file('menus') !!}
                                    <p class="help-block">Upload restaurant's menus at here</p>
                                </div>

                                <div class="form-group">
                                    <label>Photos</label>
                                    {!! Form::file('photos') !!}
                                    <p class="help-block">Upload restaurant's photos at here</p>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    {!! Form::email('email',old('email', 'hanoi@gmail.com'),array('class' => 'form-control', 'placeholder' => 'Enter email')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    {!! Form::number('phones',old('phones','0974656524'),array('class' => 'form-control', 'placeholder' => 'Enter phones')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="col-xs-11 col-xs-offset-1">
                                        <div class="form-group">
                                            <label>Number Of Department</label>
                                            {!! Form::number('address[num]',old('address[num]','543'),array('class' => 'form-control', 'placeholder' => 'Enter number')) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Road</label>
                                            {!! Form::text('address[road]',old('address[road]','Trần Quốc Hoàn'),array('class' => 'form-control', 'placeholder' => 'Enter road')) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>District</label>
                                            {!! Form::text('address[district]',old('address[district]', 'Ba Đình'),array('class' => 'form-control', 'placeholder' => 'Enter district')) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>City</label>
                                            {!! Form::text('address[city]',old('address[city]', 'Hanoi'),array('class' => 'form-control', 'placeholder' => 'Enter city')) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>Near position</label>
                                            {!! Form::text('address[near_position][]',old('near_position', 'Phạm Hùng, Lê Đức Thọ'),array('class' => 'form-control', 'placeholder' => 'Enter near position')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="box-footer">
                        <input name="confirm" class="btn btn-primary" type="submit" value="Confirm">
                    </div>                        
                    {!! Form::close() !!}
             </div>
       </div>
     </div>
 @endsection

 @section('bonusJs')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".roleUser").click(function(){
                if(!$("#admin").is(":checked") && !$("#partner").is(":checked")){
                    $("#partner").click();
                }
            })
        });
    </script>
 @endsection