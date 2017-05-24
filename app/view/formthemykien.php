<div id="divthemykien">
<form name="formykien" method="post" action="" id="formykien">
<div id="tieudeguiykien">Gui y kien cua ban</div>
  <p><span>Họ Tên</span> <input type="text" name="hoten" class="text"> </p>
  <p><span>Tiêu Đề</span> <input type="text" name="tieude" class="text"> </p>
  <p><span>Nội Dung</span>
    <textarea name="noidung" id="noidung" cols="45" rows="5"></textarea> </p>
  <p align="center">
    <input type="button" id="guiykien" name="guiykien" value="Gửi Ý Kiến">
    <input type="button" id="khongguiykien" value="Bỏ qua">
  </p>
</form>
</div>

<style>
	#tieudeguiykien{font-size:16px; text-transform:uppercase;
color:#000; font-weight:bold;}
#formykien{ width:550px; background:#fff; border:1px solid #ccc; margin:0px; }
#formykien p span{ float:left; width:80px; color:red;	
font-size:14px; font-weight:bold;}
.text{width:445px; background: #CF6; border:none; height:22px; 
border:1px solid #ccc;}
#noidung{ width:445px; height:120px; border:none; outline:none; resize:none;
	border:1px solid #ccc; background:#CF6;}
#guiykien, #khongguiykien{ background:#033; width:140px; height:30px;
		border:solid 1px #003333;color:#0F9; margin:10px 0px 10px 0px; }

</style>
<script type="text/javascript">
	$("#guiykien").click(function(){
	var data = $("#formykien").serialize(); 
	$.post("<?=BASE_DIR?>vi/baiviet/themykien",data, 
		  function(d) { $("#divthemykien").html(d);} 
	);		
	return false;
});
$("#khongguiykien").click(function(){
	$("#divpopup").slideUp();		
	$("#divche").hide();
});

</script>