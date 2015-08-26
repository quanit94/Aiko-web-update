<!-- Modal -->

<div class="modal fade" id="<?php echo "myModal" . $eachRestaurant['_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center font-italic" id="myModalLabel"> {!!$eachRestaurant['name']!!}</h4>
            </div>
            <div class="modal-body">
                <dl class="dl-horizontal">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media">
                                <a href="#">
                                    <img class="media-object" src="{!!$eachRestaurant['cover_photo']!!}" alt="image" height="200" width="600">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading text-center">Thông tin chi tiết</h4>                               
                                    <dl class="dl-horizontal">
                                        <dt>Menu</dt>
                                        <dd><img class="media-object" src="{!!$eachRestaurant['menus']['0']!!}" alt="image" height="200" width="200"></dd>
                                        <dt>Email</dt>
                                        <dd>{!!$eachRestaurant['emails']['0']!!}</dd>
                                        <dt>Phone</dt>
                                        <dd>{!!$eachRestaurant['phones']['0']!!}</dd>
                                        <dt>Địa chỉ</dt>
                                        <dd>{!!$eachRestaurant['address']['num']."-".$eachRestaurant['address']['road']."-".$eachRestaurant['address']['district']."-".$eachRestaurant['address']['city']!!}</dd>
                                    </dl>
                            
                            </div>
                        </div>
                    </div>

                </dl>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
