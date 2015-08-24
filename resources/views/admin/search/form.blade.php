<form method="post" action="javascript:void(0)">
    {!! csrf_field() !!}
    <div class="input-group">
        <input type="text" id="search_field" name="search_field" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Tìm kiếm theo mã nhân viên...">
        <input type="hidden" id="search_page" name="search_page" value="0">
        <div class="input-group-btn">
            <button type="submit" name="ok" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>