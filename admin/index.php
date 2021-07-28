<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";

// Create a connection


$conn = new mysqli($servername, $username, $password, $database);


?>


<!-- for delete -->
<?php


// if(isset($_GET['delete'])){
//     $sno = $_GET['delete'];
//     $delete = true;
//     $sql = "DELETE FROM `airway` WHERE `slno` = $sno";
//     $result = mysqli_query($conn, $sql);
//     if($result){
//         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//         <strong>oops!</strong> You successfully delete the data.
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//           <span aria-hidden="true">&times;</span>
//         </button>
//       </div>';
//       }

//   }
  if(isset($_GET['delete'])){

    $sno = $_GET['delete'];
       $stmt = $conn->prepare("DELETE FROM `airway` WHERE `slno` = ?");
       $stmt->bind_param("i",$sno);
       if($stmt->execute() == false)
       die(mysql_errno($conn));

    //    echo "Record Deleted!!";
  }
  
  ?>
<html>
<head>
<Title> www.Bharat Airways.in </title> </head>
<body>

<font face="verdana" size="26" color="Green"> <U>
<h1 align="center"style="margin-top:0px;" >
Welcome to Bharat Airways 
</h1> </font> </u>
<br\>
<h2 align="center">
Address:- E\23 Atabugan (west) Boral main road (Near By Kalayan Parishad Play Ground) Pin:- 700084
</h2>




  




<?php





        $sql = $conn->prepare("SELECT * FROM `airway`");
        // $sql->bind_param();
        $sql->execute();
        $result=$sql->get_result();

         
    

?>


<table border="5"  Bordercolor="red"  width=60%  higth=60% align="center" bgcolor="silver">
<tr align="center">
<th>Slno</th>
<th>Name</th>
<th>Gender</th>
<th>Phone-Number</th>
<th>adharcard</th>
<th>Address</th>
<th>Email</th>
<th>Date</th>
<th>Action</th>
</tr>


<?php
$sno=0;
while($row=$result->fetch_assoc()){
    $sno = $sno + 1;
?>
    <tr align="center">
    <td><?php echo $sno ?></td>
    <td><?php echo $row['firstname']?></td>
    <td><?php echo $row['gender']?></td>
    <td><?php echo $row['Phone-Number']?></td>
    <td><?php echo $row['adharcard']?></td>
    <td><?php echo $row['address']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['date']?></td>
    <?php echo"
     <td>  <button class='delete btn btn-sm btn-primary' id=d".$row['slno'].">Delete</button>  </td>";?>
    </tr>


<?php
}
$sql->close();
?>


</table>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 

<script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
   
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/Bhart_Airways/admin/index.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>