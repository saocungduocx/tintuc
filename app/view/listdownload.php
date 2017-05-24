
<div id="download">
<?php foreach($listdl as $r ){ ?>
   <h4><?=$r['tenfile'];?> . Số lần tải: <?=$r['solandown'];?> &nbsp;
   <?php if ($r['url']!="" && file_exists('../tailieu/'.$r['url'])==true ){?>
        <a href="/tintuc/vi/download/down1/<?=$r['iddl'];?>">Tải file</a>
   <?php }?>
   </h4>
   <p><?=$r['mota'];?></p>
<?php }?>
</div>
