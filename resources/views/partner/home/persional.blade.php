<div class="modal fade profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Persional Infomation</h4>
            </div>
            <div class="modal-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt><dd>{{ $perInfo['name'] }}</dd>
                    <dt>Email</dt><dd>{{ $perInfo['email'] }}</dd>
                    <dt>Description</dt><dd>{{ $perInfo['description'] }}</dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
    </div>
</div>