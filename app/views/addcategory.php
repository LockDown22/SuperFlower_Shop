<form autocomplete="off" action="<?php echo BASE_URL?>category/insertcategory" method="POST">
    <?php
    if(isset($msg)){
        echo '<span style="color:blue;font-weight:bold;">'.$msg.'</span>';
    }
    ?>
    <table>
        <tr>
            <td>Title</td>
            <td> <input type="text" required='1' name="title"></td>
            
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="desc"></td>
            
        </tr>
        <tr>
            <td><input type="submit" name="addcategory" value="Insert"></td>
            
        </tr>
    </table>


</form>