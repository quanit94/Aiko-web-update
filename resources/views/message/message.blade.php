<?php
    $message = "";
?>
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
         {{--<p class="text-danger">{{ $error }}</p>--}}
         <?php
            $message[].= $error;
         ?>
    @endforeach
@endif

@if(Session::get('message_error'))
    {{--<p class="text-danger">{{ Session::get('message_error') }}</p>--}}
    <?php
         $message[].= Session::get('message_error');
    ?>
@endif

@if(Session::get('message_success'))
    {{--<p class="text-success">{{ Session::get('message_success') }}</p>--}}
    <?php
         $message[].= Session::get('message_success');
    ?>
@endif

@if($message != "")
    @section('bonusJs')
    {{--http://www.okler.net/forums/topic/auto-open-modal/--}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Message Errors</h4>
                    </div>
                    <div class="modal-body">
                        @foreach($message as $eachError)
                            <p>{{ $eachError }}</p><br>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $(window).load(function(){
                    $('#myModal').modal('show');
                });
            });
        </script>
    @stop
@endif