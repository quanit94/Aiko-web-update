
@extends('partner.template.index')

@section('bonusCss')
<script language='javascript' src="{{ url('public/bootstrap/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script language='javascript' src="{{ url('public/tools/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endsection

@section('main_content')
<?php
$titleForm = "Update A Restaurant In Aiko System";
$id = $restaurantOld['data']['_id'];
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ $titleForm }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            @include('message.message')
            {!! Form::open(array('route' => array('post.partner.restaurant.update',$id),'files' => true)) !!}
            <div class="box-body">

                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name',old('name',$restaurantOld['data']['name']),array('class' => 'form-control', 'placeholder' => 'Enter name')) !!}
                </div>

                <div class="form-group">

                    <label>Image</label>
                    <img class="media-object" src="{!!$restaurantOld['data']['cover_photo']!!}" alt="image" height="200" width="200"></br>
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

                            {!! Form::text("shipping[cost]",old("shipping['cost']",$restaurantOld['data']['shipping']['cost']),['class' => 'form-control', 'placeholder' => 'Enter cost']) !!}
                        </div>
                        <div class="form-group">
                            <label>Max distance</label>

                            {!! Form::text("shipping[max_distance]",old("shipping['max_distance']",$restaurantOld['data']['shipping']['max_distance']),['class' => 'form-control', 'placeholder' => 'Enter max distance']) !!}
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
                            <?php
                            for ($i = 0; $i < count($restaurantOld['data']['categories']['food_style']); $i++) {
                                $op = $restaurantOld['data']['categories']['food_style'][$i];
                                echo "<option value='op' selected='selected'>$op</option>";
                            }
                            ?>
                        </select>
                        <div class="form-group">
                            <label>Country Style</label>
                            <select multiple name="categories[country_style][]" class="form-control">
                                <?php
                                for ($i = 0; $i < count($restaurantOld['data']['categories']['country_style']); $i++) {
                                    $op = $restaurantOld['data']['categories']['country_style'][$i];
                                    echo "<option value='op' selected='selected'>$op</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">

                            <label>Restaurant type</label>
                            {!! Form::text('categories[restaurant_type][]',old('categories[restaurant_type][]', implode(',',$restaurantOld['data']['categories']['restaurant_type'])),array('class' => 'form-control', 'placeholder' => 'Enter restaurant type')) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Information</label>
                    <div class="col-xs-11 col-xs-offset-1">
                        <div class="form-group">
                            <label>Open hour</label>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="information[open_hour]" value="{{ old('information[open_hour]', $restaurantOld['data']['information']['open_hour'])}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Close hour</label>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="information[close_hour]" value="{{ old('information[close_hour]', $restaurantOld['data']['information']['close_hour'])}}">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Holiday</label>
                            {!! Form::text('information[holiday]',old('information[holiday]', $restaurantOld['data']['information']['holiday']),array('class' => 'form-control', 'placeholder' => 'Enter holiday')) !!}
                        </div>

                        <div class="form-group">
                            <label>Capacity</label>
                            {!! Form::number('information[capacity]',old('information[capacity]',$restaurantOld['data']['information']['capacity']),array('class' => 'form-control', 'placeholder' => 'Enter capacity')) !!}
                        </div>

                        <div class="form-group">
                            <label>Prepared time</label>
                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="information[prepared_time]" value="{{ old('information[prepared_time]', $restaurantOld['data']['information']['prepared_time']) }}">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="description" class="form-control" rows="3" placeholder="Enter ..." name="information[description]">{{ old('information[description]', $restaurantOld['data']['information']['description']) }}</textarea>
                        </div>

                        <script type="text/javascript">
                            CKEDITOR.replace('description');
                        </script>

                        <div class="form-group">
                            <label>Main Dishes</label>
                            <select multiple name="information[main_dishes][]" class="form-control">
                                <?php
                                for ($i = 0; $i < count($restaurantOld['data']['information']['main_dishes']); $i++) {
                                    $op = $restaurantOld['data']['information']['main_dishes'][$i];
                                    echo "<option value='op' selected='selected'>$op</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Suitable</label>
                            {!! Form::text('information[suitable][]',old('information[suitable][]',implode(',',$restaurantOld['data']['information']['main_dishes'])),array('class' => 'form-control', 'placeholder' => 'Enter suitable')) !!}
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <div class="col-xs-11 col-xs-offset-1">
                                <div class="form-group">
                                    <label>Lower</label>
                                    {!! Form::number('information[price][lower]',old('information[price[lower]]', $restaurantOld['data']['information']['price']['lower']),array('class' => 'form-control', 'placeholder' => 'Enter lower')) !!}
                                </div>
                                <div class="form-group">
                                    <label>Upper</label>
                                    {!! Form::number('information[price][upper]',old('information[price][upper]', $restaurantOld['data']['information']['price']['upper']),array('class' => 'form-control', 'placeholder' => 'Enter upper')) !!}
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('information[price][unit]', $restaurantOld['data']['information']['price']['unit'], true) !!}
                                        <b>Unit</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::text('information[pros][]',old('pros',implode(',',$restaurantOld['data']['information']['pros'])),array('class' => 'form-control', 'placeholder' => 'Enter pros')) !!}
                        </div>

                        <div class="form-group">
                            <label>Menus</label>
                            <img class="media-object" src="{!!$restaurantOld['data']['menus'][0]!!}" alt="image" height="200" width="200"></br>
                            {!! Form::file('menus') !!}
                            <p class="help-block">Upload restaurant's menus at here</p>
                        </div>

                        <div class="form-group">
                            <label>Photos</label>
                            <img class="media-object" src="{!!$restaurantOld['data']['photos'][0]!!}" alt="image" height="200" width="200"></br>
                            {!! Form::file('photos') !!}
                            <p class="help-block">Upload restaurant's photos at here</p>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email',old('email',implode(',',$restaurantOld['data']['emails'])),array('class' => 'form-control', 'placeholder' => 'Enter email')) !!}
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            {!! Form::number('phones',old('phones',implode(',',$restaurantOld['data']['phones'])),array('class' => 'form-control', 'placeholder' => 'Enter phones')) !!}
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <div class="col-xs-11 col-xs-offset-1">
                                <div class="form-group">
                                    <label>Number Of Department</label>
                                    {!! Form::number('address[num]',old('address[num]',$restaurantOld['data']['address']['num']),array('class' => 'form-control', 'placeholder' => 'Enter number')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Road</label>
                                    {!! Form::text('address[road]',old('address[road]',$restaurantOld['data']['address']['road']),array('class' => 'form-control', 'placeholder' => 'Enter road')) !!}
                                </div>

                                <div class="form-group">
                                    <label>District</label>
                                    {!! Form::text('address[district]',old('address[district]', $restaurantOld['data']['address']['district']),array('class' => 'form-control', 'placeholder' => 'Enter district')) !!}
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    {!! Form::text('address[city]',old('address[city]', $restaurantOld['data']['address']['city']),array('class' => 'form-control', 'placeholder' => 'Enter city')) !!}
                                </div>

                                <div class="form-group">
                                    <label>Near position</label>
                                    {!! Form::text('address[near_position][]',old('near_position', implode(',',$restaurantOld['data']['address']['near_position'])),array('class' => 'form-control', 'placeholder' => 'Enter near position')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="box-footer">
                <input name="confirm" class="btn btn-primary" type="submit" value="Update">
            </div>                        
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('bonusJs')
<script type="text/javascript">
    $(document).ready(function () {
        $(".roleUser").click(function () {
            if (!$("#admin").is(":checked") && !$("#partner").is(":checked")) {
                $("#partner").click();
            }
        })
    });
</script>
@endsection
