<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<div id="baiviet_ct">
<h4  class="tieude"><a href="#"><?=$bai['tieude']?></a></h4>
<img src="<?=BASE_DIR?>img/<?=$bai['urlhinh'];?>" align=left width=140 height=100>
<div class="xem">
Số lần xem: <?=$bai['solanxem']?>  .
Ngày đăng: <?=date('d/m/Y',strtotime($bai['ngay']))?>
</div>
<div class="tomtat"><?=$bai['tomtat']?></div> <hr>
<div id="content"><?=$bai['content']?></div>
<div align="center"> <a href="#" id="linkthemykien">Ý kiến</a> </div>
<div id="divche"></div>
<div id="divpopup"></div>
</div>
<style>
	
	#divche { width:5000px; height:5000px; background-color:#000; 
   position:absolute; z-index:9; top:0; left:0; display:none}
#divpopup{position:fixed; top:100px; left:300px; z-Index:10; width:435px; 
   height:330px; display:none; background-color:#9C3; border:solid 2px #033; 
   box-shadow:5px 5px 3px #630; text-align:center; font-size:18px;color:#F09  }

</style>
<script type="text/javascript" charset="utf-8" async defer>
$(document).ready(function(e) {
$("#linkthemykien").click(function(){
	$("#divche").show(); 
$("#divche").fadeTo(1000,0.6,hienpopup); 
	return false;	
});//click
});
function hienpopup(){	
	var L= (screen.width-$("#divpopup").width())/2;
	$("#divpopup").css("left", L + "px");
	var url = "<?=BASE_DIR?>vi/baiviet/themykien";
      $("#divpopup").load(url, null, function(){ $(this).show(); } )	
}//hienpopup

</script>

