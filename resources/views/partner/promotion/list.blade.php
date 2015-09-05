@extends('partner.template.index')

@section('main_content')
<?php 
    $titleBox = "List Current Promotion In Restaurant";
    $notExistData = "Không tồn tại dữ liệu";
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $titleBox }}</h3>
                <div class="box-tools">
                    @include('admin.search.form')
                </div>
                </div><!-- /.box-header -->
                @include('message.message')

                <div class="box-body table-responsive no-padding">
                        

                    {!! Form::open(array('route' => array('post.partner.promotion.remove', $idRestaurant))) !!}

                    <div id="searchResult">
                        <div class="box-header">
                            <a href="{{route('get.partner.promotion.create', array('idRestaurant' => $idRestaurant))}}"><i class="fa fa-plus" style="font-size: 0.8em"></i> Add new promotion</a> | 

                             <a href="{{route('get.partner.restaurant.list', $idRestaurant)}}"><i class="fa fa-reply-all" style="font-size: 0.8em"></i> List Restaurant</a>
                        </div>
                        <div>
                            
                        </div>
                        <table class="table table-hover">
                            <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Quantity</th>
                                        <th>Rate Discount</th>
                                        <th>Description</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                    
                                    @forelse($ArrayListPromotion['data'] as $key => $eachPromotion)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <th>{{$eachPromotion['name']}}</th>
                                        <?php
                                            $startDate = date_create($eachPromotion['start_date']);
                                            $endDate   = date_create($eachPromotion['end_date']);
                                        ?>
                                        <th>{{date_format($startDate,"Y/m/d")}}</th>
                                        <th>{{date_format($endDate,"Y/m/d")}}</th>
                                        <th>{{$eachPromotion['quantity']}}</th>
                                        <th>{{$eachPromotion['rate_discount']}}</th>
                                        <th>{{$eachPromotion['description']}}</th>
                                        <th><a href="{{route('get.partner.promotion.update', ['idPromotion' => $eachPromotion['_id']])}}"><i class="fa fa-edit"></i></a></th>
                                        <th><input type="checkbox" class="chooseUser" name="remove[{{ $eachPromotion['_id'] }}]"></th>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" style="text-align: center">{{ $notExistData }}</td> 
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        
                        <div class="box-footer pull-right" id="Submit">
                            <input type="submit" id="submit" value="Submit" class="btn btn-primary" />
                        </div>
                    </div><!-- /#result -->
                    {!! Form::close() !!}
                    <div class="box-footer pull-left" id="hiddenSearch" style="border-top: none">
                         <!-- <p><a href="" style="color: gray" class="confirm"><i class="fa fa-trash-o"></i> Xóa tất cả</a></p> -->
                        <p style="color: gray"><strong>Tổng :</strong> {{ count($ArrayListPromotion['data']) }} promotions</p>

                    </div>
                    
                
                </div><!-- /.box-body -->
                <div class="box-header pull-left">
                    
                </div>  
                
            </div>
        </div>
</div>
@endsection

@section("bonusJs")
    <script type="text/javascript" src="{{ url('public/admin/js/custom.js') }}"></script>

    <script type="text/javascript">
        var base_url = "<?php echo route('get.admin.search.list'); ?>";
        $(document).ready(function(){
            $('#search_page').val('list');

        
            $('#submit').on('click', function(){
                $check = $('.chooseUser').is(":checked");
                if(!$check){
                    alert("Not promotion is selected!");
                    return false;
                }
                return confirm("Are you sure?");
            });
        })
    </script>
    <script type="text/javascript" src="{{ url('public/admin/js/ajax.js') }}"></script>
@stop