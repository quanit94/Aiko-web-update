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
                                @forelse($arrayListUser as $key => $eachUser)
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
                                    <td colspan="9" style="text-align: center">Không tồn tại dữ liệu.</td>
                                </tr>
                                @endforelse
                                <tr>
                                    <td colspan="9" style="background-color: white"><span class="pull-right"><button type="button" id="confirmRemoveUser" class="btn btn-primary" data-toggle="modal" data-target="#remove">Xác nhận</button></span></td>
                                    @include('message.remove')
                                </tr>
                            </tbody>
                        </table>