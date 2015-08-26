@extends('partner.template.index')

@section('bonusCss')
<script language='javascript' src="{{ url('public/bootstrap/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script language='javascript' src="{{ url('public/tools/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@endsection
<?php
$titleBox = "List Review Restaurant In Aiko System";
$notExistData = "Không tồn tại dữ liệu";
?>
@section('main_content')
<div class="panel panel-default">
    <div class="panel-heading">Review Restaurant</div>
    <div class="panel-body">
        @forelse($ReviewRestaurant as $key => $eachReview)
        <div class="media">
            <div class="media-left  media-middle">
                <a href="#">
                    <img class="media-object" src="{{$eachReview['photo']}}" alt="image user" height="100" width="100">
                </a>
                <address>
                    <strong>{{$eachReview['name']}}</strong><br>
                    <a href="mailto:#">first.last@example.com</a>
                </address>
            </div>
            <div class="media-body">
                <blockquote>
                    {{str_limit($eachReview['comment'],300)}}
                    <footer>Time <cite title="Source Title">{{$eachReview['timestamp']}}</cite></footer>
                </blockquote>
                <table cellpadding="0" cellspacing="0" width="133" bgcolor=#FFFFFF><tr><td><iframe src="http://www.ratingcode.com/show.php?id=144058380496&st=3&bg=FFFFFF" border="0" width="115" height="37" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" bgcolor=FFFFFF></iframe></td></tr></table>
            </div>
        </div>
        <hr>    
        @empty
        <tr>
            <td colspan="12" style="text-align: center">{{ $notExistData }}</td>
        </tr>
        @endforelse
    </div>
</div>
@endsection
@section('bonusJs')
<script type="text/javascript">
$(document).ready(function () {
    $(".roleUser").click(function () {
        if (!$("#admin").is(":checked") && !$("#partner").is(":checked")) {
            $("#partner").click();
        }
    })
});
</script>
@endsection