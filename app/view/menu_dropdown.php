<nav role='navigation'>
<ul>
<?php

$level1=$this->bv->getidloai(0,$this->lang);
foreach($level1 as $rows){?>
  <li>
  <a href="<?=BASE_URL?>baiviet/cat/<?=$rows['idloai']?>"><?php echo $rows['tenloai'];?></a>
    <ul>
      <?php 
      $idcha=$rows['idloai'];
      $level2=$this->bv ->getidloai($idcha,$this->lang);
      // hoi thay tham so get id
      foreach($level2 as $row2){
      ?>
      <li><a href="<?=BASE_URL?>baiviet/cat/<?=$rows['idloai']?>"><?=$row2['tenloai']?></a></li>
      <?php } ?>
    </ul> 
  </li>
  
  <?php }?>
    <div style="float: right">
      <form action="#" method="post" name="form_search" onsubmit="this.action='<?=BASE_DIR?>baiviet/search/'+document.form_search.tukhoa.value"><!-- chen tu khoa vao thanh-->
              <input type="search" value="" name="tukhoa">
              <input type="submit" value="Tim kiem">  
           </form>
    </div>
</ul>

</nav>
<style type="text/css" media="screen">
@import url(http://fonts.googleapis.com/css?family=Lato);

*, *:before, *:after{
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  font-family: 'Lato', sans-serif;
}

/*| Navigation |*/

nav{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background: #fff;
  box-shadow: 0 3px 10px -2px rgba(0,0,0,.1);
  border: 1px solid rgba(0,0,0,.1);
}
  nav ul{
    list-style: none;
    position: relative;
    float: left;
    margin-right: auto;
    display: inline-table;
  }
    nav ul li{
      float: left;
      -webkit-transition: all .2s ease-in-out;
      -moz-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
    }

    nav ul li:hover{background: rgba(0,0,0,.15);}
    nav ul li:hover > ul{display: block;}
    nav ul li{
      float: left;
      -webkit-transition: all .2s ease-in-out;
      -moz-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
    }
      nav ul li a{
        display: block; 
        padding: 30px 20px;
        color: #222; 
        font-size: .8em;
        letter-spacing: 1px;
        text-decoration: none;
        text-transform: uppercase;
      }
      nav ul ul{
        display: none;
        background: #fff;
        position: absolute; 
        top: 100%;
        box-shadow: -3px 3px 10px -2px rgba(0,0,0,.1);
        border: 1px solid rgba(0,0,0,.1);
      }
        nav ul ul li{float: none; position: relative;}
          nav ul ul li a {
            padding: 15px 30px; 
            border-bottom: 1px solid rgba(0,0,0,.05);
          }
          nav ul ul ul {
            position: absolute; 
            left: 100%; 
            top:0;
          } 
</style>