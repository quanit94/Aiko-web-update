 <?php
     $titleBox = "Activate User In Aiko System";
     $notExistAnyData = 'Không có dữ liệu để hiển thị';
     $noUser = 'Tất cả mọi nhân viên đã được kích hoạt';
 ?>
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