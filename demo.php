<form action="" method="post">
<select name="client" >

<option value="raj">raj</option>
<option value="om">om</option>

</select>

<input type="submit" name="submit">
</form>

<?php
if(isset($_POST["submit"])){
    if(!empty($_POST['client']))
    {
        $selected = $_POST['client'];
        echo $selected;
    }
    else{
        echo "please select";
    }
   
}


?>

