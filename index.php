<?php
require_once('config.php');
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
    h3{
        background-color: #757474;
    width: 327px;
    border: 2px solid rebeccapurple;
    border-radius: 30px;
    margin-left: 347px;
    }
    table{
        background-color: #54e2bb80;
    border-radius: 25px;
        }
    </style>

    <title>Bank System</title>
</head>
<body>
<h3 align="center" ><font color="white" bgcolor="black">Bank System</font></h3><hr>
<form align="center" action="viewall.php" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label><b>View All Customers</b></label><br>
            <button type="submit" class="btn btn-primary">Click</button>
        </div>
    </div>  
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