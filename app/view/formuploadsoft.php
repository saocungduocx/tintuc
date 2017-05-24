<?php session_start();?>
<div id="divUpload">
    <form action="" method=post enctype="multipart/form-data" name=form1 id="form1">
        <table>
        	<tr class="oh">
        		<td>Tên file: </td>
        		<td><input type="text" name="tenfile" class="txt" /></td>
        	</tr>
        	<tr class="oh">
        		<td>Mô tả</td>
        		<td><textarea name="mota" id="mota" class="txt"> </textarea></td>
        	</tr>
        	<tr class="oh">
        		<td>Chọn file: </td>
        		<td><input type="file" name="f1" class="txt" /></td>
        	</tr>
        	<tr>
        		<td colspan="2" align="center"><input type=submit name=btnUpload id=btnUpload value="Upload" ></td>
        	</tr>
        	<?php
			    if($kq==true){
$show=<<<HTML
			<tr>
        		<td colspan="2" align="center"><font color="red">Upload thanh cong</font></td>
        	</tr>
HTML;
				echo $show;
			    }
			 ?>

        </table>
    </form>
</div>

<style>
table .oh{width: 
40%;}
#divUpload{ width:500px; border:solid 1px #033}
#divUpload span { width:60px; float:left; color:#036}
#divUpload .txt { width:420px; background-color:#990; padding:3px;}
#divUpload #mota { height:80px}
#divUpload #btnUpload { background-color:#036; color:#0FC; height:30px; width:100px}
</style>