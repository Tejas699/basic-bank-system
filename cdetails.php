<?php
session_start();
require_once("config.php");

if(isset($_POST["submit"]))
{
    if(!empty($_POST['client']))
    {
        $selected = $_POST['client'];
        
    }
    else{
        echo
        "
        <script type=\"text/javascript\">
        alert('Please Select Any entity !');
        </script>        
        ";
        header("location:viewall.php");
    }
      
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        #cbal{
            color:#fdff00;
        }
        table{
          background-color: #00b8ff85;
    border-color: 0px solid;
    border-radius: 24px;
    border-color: red;
        }
        #btn{
          border-radius: 16px;
    border-color: white;
    width: 180px;
    height: 36px;
    background-color: #ff0000b8;
        }
    </style>

    <title>All Customers</title>
</head>
<body>
<form action=""></form>
<table align="center">
<tr>
<td>
<form action="transfer.php">
<table align="center">
    <tr >
    <td align="center" colspan=4><lable><b><font color="white"> -: Account Summary :-</font></b> </lable></td>
    </tr>
  <tr>    
    <td align="center"><b><font color="white">  user ID </font></b></td>
    <td align="center"><b><font color="white">  User name </font></b></td>
    <td align="center"><b><font color="white">  Email </font></b></td>
    <td align="center"><b><font color="white">  Current balance </font></b></td>
    
  </tr>
<?php
$records = mysqli_query($conn,"SELECT `id`, `name`, `email`,`current balance` FROM `customers` WHERE `name`='$selected' "); // fetch data from database
// $_SESSION['records'] = ;
while($data =  mysqli_fetch_array($records))
{
?>
  <tr>
    <td align="center"><font color="white"><?php echo $data['id']; ?></font></td>
    <td align="center"><font color="white"><?php echo $data['name']; ?></font></td>
    <td align="center"><font color="white"><?php echo $data['email']; ?></font></td>
    <td align="center"><font color="white"><b id="cbal">Rs.<?php echo $data['current balance']; ?>/-</font></b></td>
  </tr>	
<?php
$_SESSION['id'] = $data['id'];
$_SESSION['name'] = $data['name'];
$_SESSION['balance'] = $data['current balance'];
}
?>
</table>
</td>
</tr>
<tr>
<td align="center">
  <button type="submit" id="btn" class="btn btn-primary">Transfer Money</button>
</td>
</tr>
</table>
</form>
</body>
</html>



