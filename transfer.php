<?php
session_start();
require_once('config.php');

// if(isset($_POST['btn2']))
// {
//     header("location:viewall.php");
// }

if(isset($_POST['transfer']))
{
    // $amount = $_POST["amount"];
    $rid = $_POST["rid"];
    $rname = $_POST["rname"];    

    $records = mysqli_query($conn,"SELECT * FROM `customers` WHERE name ='$rname' && id = '$rid' ");
    $data =  mysqli_fetch_array($records);
    if($data['name'] === $rname && $data['id'] === $rid ){
        echo "reciver match succesfully ";
        $_SESSION['reciverid']=$data['id'];
        $_SESSION['recivern']=$data['name'];
        $_SESSION['rcurrent balance']=$data['current balance'];
        header("location:transfer2.php");            
    } 
    else{
        echo "<script>alert('plese enter correct id and name !');</script>";
        
    }   
    
    // if($_SESSION['balance'] >= $amount ){
    //     echo "you r eligible to tranfer money";
    // }
    // else{
    //     echo "you have insuffiient fund ! ";
    // }
    
    
    // if($records){
    //     echo "cool";
    // }
    // else{
    //     echo "please check one time some thing wents wrong !";
    // }
    // $rid = $_POST["rid"];
    // $rname = $_POST["rname"];
    // $amount = $_POST["amount"];
    // $_SESSION['balance'];
    // print("reciver id :".$rid) ;
    // echo "reciver name :".$rname ;
    // echo "amount you want to send :".$amount ;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    #btn{
        background-color:green;
        border-color:yellow;
        border-radius:30px;
        width :90px;
    }
    #btn2{
        background-color:blue;
        border-color:yellow;
        border-radius:30px;
        width :90px;
    }
    table{
        background-color: #00ff0873;
    border-radius: 30px;
    width: 284px;
        }
    .textfield{
        border-radius: 10px;
        border-color: white;
    }
    </style>

    <title>Tranfer Money</title>
</head>
<body align="center">


<form action="" method="post">

<table align="center">
<tr>
    <td align="center" colspan="2"><label for=""><b>Transfer to :- </b></label></td>
</tr>
<tr>
    <td><label for=""><b><font color="white">Enter ID</font></b></label></td>
    <td><input type="text"  class="textfield" name="rid" Required></td>
</tr>
<tr>
    <td><label for=""><b><font color="white">Enter Name</font></b></label></td>
    <td><input type="text" class="textfield" name="rname" Required></td>
</tr>
<!-- <tr>
    <td><label for=""><b>Enter Amount</b></label></td>
    <td><input type="text" name="amount" Required></td>
</tr> -->
<tr>
    <td colspan="2" align="center">      
       <button type="submit" name="transfer"class="btn btn-primary" id="btn"><b>Submit</b></button>
       <!-- <button type="submit" name="btn2" class="btn btn-primary" id="btn2"><b>BACK</b></button> -->
    </td>
</tr>
</table>

</form>

</body>
</html>