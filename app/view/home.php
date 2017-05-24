<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <base href="<?=BASE_URL?>">
      <link href="<?=BASE_DIR?>css/c1.css" rel="stylesheet" type="text/css" />
      <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <title>Tin tuc online</title>
   </head>
   <body>
      <div id="container">
         <div id="header">
            <img src="<?=BASE_DIR?>/img/template/banner1.jpg" width="990" height="180">
            <div id="sitetitle">{SiteTitle}</div>
         </div>
         <div id="lang">
<a href="<?=BASE_URL?>vi/"> <img src="<?=BASE_DIR?>/img/template/vi.png" align=left></a>
<a href="<?=BASE_URL?>en/"> <img src="<?=BASE_DIR?>/img/template/en.jpg" align=left></a>
</div>

         <div id="menungang">
           <?php require "menu_dropdown.php";?>
         </div>
         <?php
         if($this->current_action=="index"){
         ?>
         <div id="content1"> <?php include "view/bainoibat.php"; ?> </div>
         <div id="info">
           <form action="#" method="post" name="form_search" onsubmit="this.action='<?=BASE_DIR?>baiviet/search/'+document.form_search.tukhoa.value"><!-- chen tu khoa vao thanh-->
              <input type="search" value="" name="tukhoa">
              <input type="submit" value="Tim kiem">  
           </form>
         </div>
         <div id="content2"> <?php include "view/baixemnhieu.php"?> </div>
         <?php
         }
         ?>

         <div id="content3">  </div>
         <div id="quangcao"> ]
            <a href="#"> <img src="<?=BASE_DIR?>/img/template/qc1.jpg" width="400" height="90" align=left> </a>
            <a href="#"> <img src="<?=BASE_DIR?>/img/template/qc4.gif" width="385" height="90" align=left> </a>
         </div>
         <div id="content4"> <?php
           if ($this->current_action=="detail") include "view/detail.php";
           elseif ($this->current_action=="cat") include "view/baitrongloai.php";
           elseif ($this->current_action=="search") include "view/searchResult.php";
           else include "view/baimoi.php";
                            ?>
             </div>
         <div id="footer">  </div>
      </div>
      <!--container
      <script type="text/javascript">
        function text_box(){
          var tukhoa = document.form_search.tukhoa.value;
         window.location.href="google.com";
        }
      </script>
      -->
   </body>
</html>