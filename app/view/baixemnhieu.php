<div id="baixemnhieu">
<h4>Bài xem nhieu</h4>
<?php foreach ($baixn as $row) {?>
<p> <a href="<?=BASE_DIR?>baiviet/detail/<?=$row['idbv']?>"> <?=$row['tieude'];?> </a> </p>
<?php } ?>
</div>
