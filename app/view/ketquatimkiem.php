<h1>KET QUA TIM KIEM</h1>
<div id="baitrongloai">
<?php foreach($listbai as $row ){ ?>
<div class="motbai">
<img src="<?=BASE_DIR?>img/<?=$row['urlhinh']?>" align="left">
<h4><a href="#"><?=$row['tieude']?></a></h4>
<div class="xem">
  Xem: <?=$row['solanxem']?> . 
  Ngày đăng: <?=date('d/m/Y',strtotime($row['ngay']))?>
</div>
<p class="tomtat"><?=$row['tomtat']?></p>
</div>
<?php } ?>

</div>
