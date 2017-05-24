<div id="bainoibat">
  <div id="top1">
	<?php $row=$bainb[0]; ?>
	<img src="<?=BASE_DIR?>img/<?=$row['urlhinh']?>" align="left">
      <div class="tieude"> <a href="#"><?=$row['tieude'];?></a> </div>
	<div class="tomtat"><?=$row['tomtat'];?></div>
  </div>
  <div id="top3">
  <?php for($i=1;$i<count($bainb);$i++){ $row = $bainb[$i]; ?>
	<div>
	<img src="<?=BASE_DIR?>img/<?=$row['urlhinh']?>" > <br/>
	<a href="#"><?=$row['tieude']?></a>
	</div>
  <?php } //for $i?>
  </div>
</div>
