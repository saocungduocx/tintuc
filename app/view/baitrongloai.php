<div id="baitrongloai">

    <h1><?=$tenloai_cach2?></h1>
   <?php
      if($listbai==0) {
           echo "";
      }else{

      ?>
   <?php foreach($listbai as $row ){ ?>
   <div class="motbai">
      <img src="<?=BASE_DIR?>img/<?=$row['urlhinh']?>" align="left">
      <h4><a href="<?=BASE_DIR?>/baiviet/detail/<?=$row['idbv']?>"><?=$row['tieude']?></a></h4>
      <div class="xem">
         Xem: <?=$row['solanxem']?> .
         Ngày dang: <?=date('d/m/Y',strtotime($row['ngay']))?>
      </div>
      <p class="tomtat"><?=$row['tomtat']?></p>
   </div>
   <?php }
      }?>
   <div id="thanhphantrang">
      <?=$this->bv->pageslist(BASE_DIR."baiviet/cat/$idloai", $totalrows, 3,5, $currentpage);?>
   </div>
</div>
