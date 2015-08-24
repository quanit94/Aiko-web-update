        <!-- Modal -->
        <div class="modal fade" id="<?php echo "myModal".$eachUser['_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center font-italic" id="myModalLabel">Persional Infomation User</h4>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                          <dt>ID</dt>
                          <dd>{{ $eachUser['_id'] }}</dd>
                          <dt>Name</dt>
                          <dd>{{ $eachUser['name'] }}</dd>
                          <dt>Email</dt>
                          <dd>{{ $eachUser['email'] }}</dd>
                          <dt>Description</dt>
                          <dd>{{ $eachUser['description'] }}</dd>
                          <dt>Telephone</dt>
                          <dd>{{ $eachUser['telephone'] }}</dd>
                          <dt>Role</dt>
                          @foreach($eachUser['role'] as $name => $value)
                                @if($value == 1)
                                    <dd>{{ $name }}</dd>
                                @endif
                          @endforeach
                        </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ route('get.admin.user.update', array($eachUser['_id'])) }}" type="button" class="btn btn-primary">Update</a>
                </div>
            </div>
          </div>
        </div>
