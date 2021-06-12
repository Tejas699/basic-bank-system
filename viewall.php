<?php 
session_start();
require_once("config.php");

$records = mysqli_query($conn,"SELECT * FROM `customers`"); // fetch data from database
// while($data =  mysqli_fetch_array($records)){    
//     echo $data["name"];
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table{
        background-color: grey;
    border-radius: 14px;
    height: 83px;
    width: 287px;
    }
    #btn{
        background-color: #00c1d8;
    color: #000000;
    border-radius: 30px;
    height: 36px;
    }
    #dropdown{
        border-radius: 11px;
    height: 34px;
    width: 127px;
    margin-left: 16px;
    }
    </style>
    <title>All Customers</title>
</head>
<body>

<form method="post" action="cdetails.php">
    <table align="center">
        <tr >
            <td align="center" colspan=2><b><font color="white">Select and View one 
Customer </font> </b></td>
        </tr>
        <tr>
            <td>
            
            <select id="dropdown" name="client">
            <option disabled selected>--Select--</option>
            <?php 
                while($data =  mysqli_fetch_array($records)){    
                    echo "<option value='".$data['name']."'>".$data['name']."</option>";
                }
            ?>            
            </select>
            
            </td>
            <td>
            <button type="submit" id="btn" name="submit" class="btn btn-primary">View Info</button>
            </td>
        </tr>
    </table>

</form>

</body>
</html>



