@extends('admin.template.index')

@section('main_content')
<?php
    $titleBox = "Activate User In Aiko System";
    $notExistAnyData = 'Không có dữ liệu để hiển thị';
    $noUser = 'Tất cả mọi nhân viên đã được kích hoạt';
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
                    {!! Form::open(array('route' => array('post.admin.user.activate'))) !!}
                    <div id="searchResult">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="text-center">Activate</th>
                                </tr>
                                <?php
                                    $countActivatedUser = 0;
                                ?>
                                @forelse($arrayListUser as $key => $eachUser)
                                    @if($eachUser['is_active'] != 1)
                                    <?php
                                        $countActivatedUser ++;
                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ str_limit($eachUser['name'], 15) }}</td>
                                        <td>{{ str_limit($eachUser['email'], 25) }}</td>
                                        <td class="text-center"><input type="checkbox" value="1" class="chooseUser" name="activate[{{ $eachUser['_id'] }}]"></td>
                                    </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center">{{ $notExistAnyData }}.</td>
                                    </tr>
                                @endforelse
                                @if($countActivatedUser == 0)
                                    <tr>
                                        <td colspan="4" style="text-align: center">{{ $noUser }}.</td>
                                    </tr>
                                @else
                                    <tr class="whenHoverNotAnyAnimation">
                                        <td colspan="3"></td>
                                        <td class="text-center" style="background-color: white"><span><button type="button" id="confirmRemoveUser" class="btn btn-primary" data-toggle="modal" data-target="#confirm">Xác nhận</button></span></td>

                                    </tr>
                                    @include('message.confirm')
                                @endif
                            </tbody>
                        </table>
                    </div><!-- /#result -->
                    {!! Form::close() !!}
                    <div class="box-footer pull-left" id="hiddenSearch" style="border-top: none">
                        @if($countActivatedUser != 0)
                            {{-- <p><a href="" style="color: gray" class="confirm"><i class="fa fa-check"></i> Kích hoạt tất cả</a></p> --}}
                        @endif
                        <p style="color: gray"><strong>Tổng :</strong> {{ $countActivatedUser }} users</p>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
</div>
@endsection
@section("bonusJs")
    <script type="text/javascript" src="{{ url('public/admin/js/custom.js') }}"></script>
    <script type="text/javascript">
        var base_url = "<?php echo route('get.admin.search.activate'); ?>";
        $(document).ready(function(){
            $('#search_page').val('activate');
        })
    </script>
    <script type="text/javascript" src="{{ url('public/admin/js/ajax.js') }}"></script>
@stop