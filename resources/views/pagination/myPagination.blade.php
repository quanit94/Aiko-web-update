<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/29/2015
 * Time: 10:07 AM
 */
 ?>
 <div class="col-xs-12" id="pagination" style="text-align: center">
     <div class="dataTables_paginate paging_bootstrap">
         	<ul class="pagination">
         		{{--<li class="disabled"><a href="{{ url('user/list/') }}">← Previous</a></li><li class="active"><span>1</span></li><li><a href="">2</a></li><li><a href="">3</a></li><li><a href="">4</a></li><li><a href="http://localhost/Laravel/HeQuanTriCoSoDuLieu_V1/manage/user/list?page=2" rel="next">Next → </a></li>--}}
         	<?php
         	    $links = "";
         	    $previousLink = "<li><a href='".url($url.$previous)."'>← Previous</a></li>";
         	    $nextLink     = "<li><a href='".url($url.$next)."'>Next → </a></li>";
         	    if($currentPage == 1){
         	        $previousLink = "<li class='disabled'><span>← Previous</span></li>";
         	    }
                if($currentPage == $totalPage){
                    $nextLink = "<li class='disabled'><span>Next → </span></li>";
                }
            ?>
            @for($i = 1; $i <= $totalPage; $i++)
                <?php
                    if($i == $currentPage){
                        $links.= "<li  class='active'><a href='".url($url.$i)."'>".$i."</a></li>";
                    }else{
                        $links.= "<li><a href='".url($url.$i)."'>".$i."</a></li>";
                    }
                ?>
            @endfor

            <?php
                echo $previousLink.$links.$nextLink;
            ?>
         	</ul>
     </div>
 </div>