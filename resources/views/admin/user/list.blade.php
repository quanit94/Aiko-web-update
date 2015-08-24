@extends('admin.template.index')

@section('main_content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List Current Users In Aiko System</h3>
                <div class="box-tools">
                    @include('admin.search.form')
                </div>
                </div><!-- /.box-header -->
                @include('message.message')
                <div class="box-body table-responsive no-padding">
                    {!! Form::open(array('route' => array('post.admin.user.remove'))) !!}
                    <div id="searchResult">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Telephone</th>
                                    <th>Created_at</th>
                                    <th>Active</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                @forelse($arrayListUser['data'] as $key => $eachUser)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ str_limit($eachUser['name'], 10) }}</td>
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="<?php echo "#myModal".$eachUser['_id']; ?>">{{ str_limit($eachUser['email'], 25) }}</a></td>


                                    <td>{{ str_limit($eachUser['description'], 15) }}</td>
                                    <td>{{ str_limit($eachUser['telephone'], 12) }}</td>
                                    <td>{{ str_limit($eachUser['created_at'], 15) }}</td>
                                    <td>{{ str_limit($eachUser['is_active'], 15) }}</td>
                                    <td><a href="{{ route('get.admin.user.update', array($eachUser['_id'])) }}"><i class="fa fa-edit"></i></a></td>
                                    <td><input type="checkbox" value="1" class="chooseUser" name="remove[{{ $eachUser['_id'] }}]"></td>
                                </tr>
                                @include('admin.user.persion', array(
                                    'eachUser'    => $eachUser
                                    ))
                                @empty
                                <tr>
                                    <td colspan="12" style="text-align: center">Không tồn tại dữ liệu.</td>
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
                        <p style="color: gray"><strong>Tổng :</strong> {{ count($arrayListUser['data']) }} users</p>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
        <?php
            $previous = $arrayListUser['current_page'] - 1;
            $next = $arrayListUser['current_page'] + 1;
            $totalPage = $arrayListUser['total_page'];
            $currentPage = $arrayListUser['current_page'];
            $url = "admin/user/list/";
        ?>
        @include('pagination.myPagination',array(
            'previous'      =>  $previous,
            'next'          =>  $next,
            'totalPage'     =>  $totalPage,
            'currentPage'   =>  $currentPage,
            'url'           =>  $url,
        ))
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