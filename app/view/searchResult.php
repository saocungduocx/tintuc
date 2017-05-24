<h1>KET QUA TIM KIEM</h1>
<div id="baitrongloai">

   <?php 
   if($listbai == 0){
      echo "<h2>Noi dung can tim khong co ket qua</h2>";
   }else{

   foreach($listbai as $row ){ ?>
   <div class="motbai">
   <img src="<?=BASE_DIR?>img/<?=$row['urlhinh']?>" align="left">
   <h4><a href="#"><?=$row['tieude']?></a></h4>
   <div class="xem">
     Xem: <?=$row['solanxem']?> . 
     Ngày đăng: <?=date('d/m/Y',strtotime($row['ngay']))?>
   </div>
   <p class="tomtat"><?=$row['tomtat']?></p>
   </div>
   <?php }
   } ?>
   <div id="thanhphantrang">
      <?=$this->bv->pageslist(BASE_DIR."baiviet/search/$tukhoa", $totalrows, 3,5, $currentpage);?>
   </div>
</div>
