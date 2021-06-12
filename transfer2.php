<?php
require_once("config.php");
session_start();
if(isset($_POST['btn2'])){
    header("location:transfer.php");
}
 

if(isset($_POST['pay']))
{$amount = $_POST['amount'];
    if($_SESSION['balance'] >= $amount )
    {
        $sid = $_SESSION['id'];
        $sname = $_SESSION['name'];
        $rid = $_SESSION['reciverid'];
        $rname = $_SESSION['recivern'];
        
        $newbalance1 = $_SESSION['balance'] - $amount;
        $newbalance2 = $_SESSION['rcurrent balance'] + $amount;

        $query1 = mysqli_query($conn,"UPDATE `customers` SET `current balance` = $newbalance1 WHERE `customers`.`id` = $sid");

        if($query1){
            $query3 = mysqli_query($conn,"INSERT INTO `transfers`(`uid`,`uname`,`amount`) VALUES ('$sid','$sname',' Rs.$amount/- debited from $sname and send to $rname')");
            
        }

        $query2 = mysqli_query($conn,"UPDATE `customers` SET `current balance` = $newbalance2 WHERE `customers`.`id` = $rid");

        if($query2){
            $query4 = mysqli_query($conn,"INSERT INTO `transfers`(`uid`,`uname`,`amount`) VALUES ('$rid','$rname','Rs.$amount/- credited to $rname from $sname')");
            echo "<script type=\'text/javascript\'>
            alert('Your Transcation Successfully Done.');
            </script>";
        }
        header("location:transfer2.php");
        
    }
    else{
        echo "<script>alert(' we are anable to send money please check again and fill the correct amount  ! ');</script> ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <style>
    label{
        color:#500101;
    }
    #panal{
        background-color:#08f70440;
    }
    table{
        background-color: #54e2bb80;
    border-radius: 25px;
        }
    .btn{
        color: #ded1d1;
    border-radius: 20px;
    width: 80px;
    height: 34px;
    margin: 5px;
    background-color: #5e00c5de;
    }
    #textfield{
        border-radius: 10px;
        border-color: white;
    }
    h4{
    font-size: 1.5rem;
    background-color: #00b8ff8c;
    width: 459px;
    margin-left: 320px;
    height: 37px;
    border-radius: 12px;
    }
    </style>


   
</head>
<body>


<div id="info">
<?php
echo "<h4>". $_SESSION['name']." your Curent Balance is :-"."<font color='yellow'>"."Rs .".$_SESSION['balance']."/-"."</font>"."</h4>";
?>
</div>
</h3>
</div>
<hr>
<form action="" method="post">

<table align="center">
<tr>
    <td align="center" colspan="2"><b><font color="white"> Tranfer to :-</font></b><label for=""><b><?php echo $_SESSION['recivern']; ?></b></label></td>
</tr>

 <tr>
    <td><b><font color="white">Enter Amount</font></b></td>
    <td><input type="text" id="textfield"name="amount" ></td>
</tr> 
<tr>
    <td colspan="2" align="center">      
       <button type="submit" name="pay"class="btn btn-primary" class="btn"><b>PAY</b></button>
       <button type="submit" name="btn2" class="btn btn-primary" class="btn"><b>BACK</b></button>
    </td>
</tr>
</table>
<hr>
<table align="center" >
<tr>
<td align="center"><font color="blue"><b> -: Transaction history :- </b></font> </td>
</tr>
<tr>
<td id="panal">
<?php  
    $ttable = mysqli_query($conn,"SELECT * FROM `transfers`"); // fetch data from database
    while($data2 =  mysqli_fetch_array($ttable))
    {        
        echo "<lable id='panalval'>"."<font color='white'>".$data2['amount']."</lable>"."</font>"."<br /><hr>";
    
    } 
?>
</td>
</tr>
</table>


</form>
</body>
</html>


