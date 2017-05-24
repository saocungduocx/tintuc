<link rel="stylesheet" href="<?=BASE_URL?>css/duyetbai.css" type="text/css"/>
<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
<script> var obj;
$(document).ready(function() {

$(".btnbo").click(function(){
	idbv = $(this).attr("idbv");
	obj = $(this).parent().parent();
    console.log(obj);
	$.get("/tintuc/vi/laythongtin/cancel/"+idbv,null,duyetxong);
});

$(".btnduyet").click(function(){
  idloai = $(this).parent().children("#idloai").val();
  if (idloai == 0) { alert("Bạn chưa chọn loại tin"); return }
  idbv = $(this).attr("idbv");
  anhien = $(this).parent().children("[name='AnHien']").attr('checked');
  noibat = $(this).parent().children("[name='NoiBat']").attr('checked');
  if (anhien==true) anhien=1; else anhien=0;
  if (noibat==true) noibat=1; else noibat=0;
  obj = $(this).parent().parent();
  url="/tintuc/vi/laythongtin/chapnhanbai/"+idloai+"/"+idbv+"/"+anhien+"/"+noibat;
  $.get( url, null,duyetxong);
});

$(".btnXem").click(function(){
   idbv = $(this).attr("idbv");
  var url='/tintuc/vi/laythongtin/xem1bai/'+idbv;
  var w= window.open(url,'aa','width=800,height=700, scrollbars=yes');
  w.focus();
});

});
function duyetxong(d){
   obj.remove();
   if ($("#danhsach tr").length <=1) document.location='duyetbai/';
}
</script>



<table width="800" border="1" align="center" cellpadding="4" cellspacing="0" id="danhsach">
<tr> <th> Tiêu đề/Tóm tắt </th> <th>Action</th> </tr>
<?php
foreach ($baimoi as $row) {
?>
<tr><td>
  <p class="tieude"> <?= $row['tieude'] ?>&nbsp;
     <span>(Ngày <?= $row['ngay'] ?>, idbv: <?= $row['idbv'] ?> )</span>
  </p>
  <p class="tomtat"><?= $row['tomtat'] ?></p>
</td>
<td width="170">
<select name="idloai" id="idloai">
  <option value="0"> Chọn loại tin </option>
  <?php
    foreach ($phanloai as $loai) {
?>
  	<option value="<?= $loai['id'] ?>"> <?= $loai['ten']; ?> </option>
  <?php
    }
?>
</select> <br />
  <input name="AnHien" type="checkBox" value="<?= $row['idbv'] ?>" checked>Hiện
  <input name="NoiBat" type="checkbox" value="<?= $row['idbv'] ?>">Nổi bật<br>
  <input type=button class=btnduyet value="Duyệt"  idbv="<?= $row['idbv'] ?>">
  <input type="button" class="btnbo" value="  Bỏ  " idbv="<?= $row['idbv'] ?>">
  <input type="button" class="btnXem" value="Xem" id="btnXem" idbv="<?= $row['idbv'] ?>" >
</td></tr>
<?php
}
?>
</table>
