$(document).ready(function(){
    $("#search_field").keyup(function(){
        var searchPage = $("#search_page").val();
        var searchField = $("#search_field").val();
        $.ajax({
            url: base_url,
            type: "get",
            data: {dataInput:searchField},
            async: true,
            success:function(result){
                if(result == 1){
                    alert("Yêu cầu bạn gửi không phải đến từ ajax");
                }else if(result == 0){
                    $("#searchResult").html("<p class='text-center'>Vui lòng nhập từ khóa bạn muốn tìm kiếm</p><br>");
                }else if(result == 404){
                    $("#searchResult").html("<p class='text-center'>Không có kết quả trả về</p><br>");
                }else{
                    $("#searchResult").html(result);
                }
                $("#hiddenSearch, #pagination").css("display","none");
                return false;
            },
            error: function(){
                alert("Error Ajax");
                return false;
            }
        });
    })
})
