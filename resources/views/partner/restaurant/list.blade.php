@extends('partner.template.index')

@section('main_content')
<?php 
    $titleBox = "List Current Restaurant In Aiko System";
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
                    {!! Form::open(array('route' => array('post.partner.restaurant.remove'))) !!}
                    <div id="searchResult">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Promotion</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                @forelse($arrayListRestaurant as $key => $eachRestaurant)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="<?php echo "#myModal".$eachRestaurant['_id']; ?>">{{ str_limit($eachRestaurant['name'], 30) }}
                                    </a></td>
                                    <td>
                                        @foreach($eachRestaurant['emails'] as $key => $eachEmail)
                                            <p>{{ str_limit($eachEmail, 25) }}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($eachRestaurant['phones'] as $key => $eachPhone)
                                            <p>{{ str_limit($eachPhone, 25) }}</p>
                                        @endforeach
                                    </td>
                                    <td><a href="{{ route('get.partner.promotion.list', array($eachRestaurant['_id'])) }}">Chi tiết</a></td>
                                    <td><a href="{{ route('get.partner.restaurant.update', array($eachRestaurant['_id'])) }}"><i class="fa fa-edit"></i></a></td>
                                    <td><input type="checkbox" value="1" class="chooseUser" name="remove[{{ $eachRestaurant['_id'] }}]"></td>
                                </tr>
                                @include('partner.restaurant.eachRestaurant', array(
                                    'eachRestaurant'    => $eachRestaurant
                                    ))
                                @empty
                                <tr>
                                    <td colspan="12" style="text-align: center">{{ $notExistData }}</td>
                                </tr>
                                @endforelse
                                <tr>
                                    <td colspan="9" style="background-color: white"><span class="pull-right"><button type="button" id="confirmRemoveUser" class="btn btn-primary" data-toggle="modal" data-target="#remove">Xác nhận</button></span></td>
                                    @include('message.remove')
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /#result -->
                    {!! Form::close() !!}
                    <div class="box-footer pull-left" id="hiddenSearch" style="border-top: none">
                        {{-- <p><a href="" style="color: gray" class="confirm"><i class="fa fa-trash-o"></i> Xóa tất cả</a></p> --}}
                        <p style="color: gray"><strong>Tổng :</strong> {{ count($arrayListRestaurant) }} restaurants</p>
                    </div>
                </div><!-- /.box-body -->
                
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
        })
    </script>
    <script type="text/javascript" src="{{ url('public/admin/js/ajax.js') }}"></script>
   
@stop