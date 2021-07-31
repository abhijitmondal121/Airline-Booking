
<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "student";
  
        // Create a connection
        
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $fname = $_POST['fname'];
     
      $gender = $_POST['gender'];
      $phno = $_POST['phno'];
      $adhcard = $_POST['adhcard'];
      $address = $_POST['address'];
      $email = $_POST['email'];
        $conn = new mysqli($servername, $username, $password, $database);

      
        if($fname== '' || $gender== ''|| $phno== ''|| $adhcard== ''|| $address== '' ){
                echo"<script>alert('plz fill all the documents')</script>";
             }
      
       else {

                $sql = $conn->prepare("INSERT INTO `airway` ( `firstname`, `gender`, `Phone-Number`, `adharcard`, `address`, `email`) VALUES (?,?,?,?,?,?)");
                $sql->bind_param("ssisss",$fname,$gender,$phno,$adhcard, $address,$email);
  
                $sql->execute();
        
                if($sql){
                  header("Location:/Bhart_Airways/result.php");
                }      
            }
      
      
 
    }
   


    
?>



<html>
<head>
<Title> www.Bharat-Airways.in </title> </head>
<body>
<img src="bac.jpg" height="100px"width="100px" style="border-radius:1000px;margin-bottom:0px;">
<font face="verdana" size="26" color="Green"> <U>
<h1 align="center"style="margin-top:0px;" >
Welcome to Bharat Airways 
</h1> </font> </u>
<br\>
<br\>
<br\>
<form method="POST">
<table border="5"  Bordercolor="red"  width=60%  higth=60% align="center" bgcolor="silver">
<tr>
<td align="center"> Adhar Card No:- </td> 
<td align="center"><input type="text" name="adhcard"> </td>
</tr>
<tr>
<td align="center"> <b> Emal Address:-  </b></td> 
<td align="center"> <input type="email" name="email"> </td>
</tr>
<tr>
<td align="center">Name:- </td>
<td align="center"><input type="text" name="fname" width=40%  higth=60%> </td>
</tr>
<!-- <tr>
<td align="center"> Name:- </td> 
<td align="center"> <input type="text" name="lname"> </td>
</tr> -->
<tr>
<td align="center" > Gender:- </td> 
<td align="center"> <input type="radio" name="gender" value="Male"> Male 
    <input type="radio"  name="gender" value="Female"> Female </td>
</tr>

<tr>
<td align="center" > Phn No:- </td> 
<td align="center"> <input type="text" name="phno"> </td>
</tr>

<tr>
<td align="center"> Address:- </td> 
<td align="center"> <input type="text" name="address"> </td>
</tr>

<tr>
<td align="center"> 
<Button type="reset">  Cancel  </button></td> 

<td align="center"> 
 <Button type="submit">  Submit  </button> </td> 

</form>
</tr>
</body>
<H2 align="center">
Address:- E\23 Atabugan (west) Boral main road (Near By Kalayan Parishad Play Ground) Pin:- 700084
</h2>
</html>
