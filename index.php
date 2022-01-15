<?php
$conn=mysqli_connect('localhost','root','','crud');
if(isset($_POST['btn'])){
    $stdname=$_POST['stdname'];
    $stdreg=$_POST['stdreg'];
    if(!empty($stdname) && !empty($stdreg)){
        $query="INSERT INTO student(stdname,stdreg) VALUE('$stdname',$stdreg) ";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "Your data submitted";
        }
    }else {
        echo "Field should not be empty";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP Crud</title>
  </head>
  <body>
      <!--Form Start -->
    <div class="container shadow m-5 p-3">
        <form action="" method="POST" class="d-flex justify-content-around">
            <input type="text" name="stdname" placeholder="Enter Your Name" class="form-control">
            <input type="number" name="stdreg" placeholder="Enter Your Registration Number" class="form-control">
            <input type="submit" value="Send" name="btn" class="btn btn-info">

        </form>

    </div>
<!--End Form -->
<!--Table Start -->
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Student Id</th>
            <th>Student Name</th>
            <th>Student Registration Number</th>
            <th></th>
            <th></th>
        </tr>
        <?php
             $query="SELECT * FROM student";
             $result=mysqli_query($conn,$query);
             if($result->num_rows>0){
                 while($rd=mysqli_fetch_assoc($result)){
                     $stdid=$rd['id'];
                     $stdname=$rd['stdname'];
                     $stdreg=$rd['stdreg'];
                 
             
        ?>
        <tr>
            <td><?php echo $stdid; ?></td>
            <td><?php echo $stdname; ?></td>
            <td><?php echo $stdreg; ?></td>
            <td></td>
            <td></td>
        </tr>
        <?php
            }
              } 
        ?>
    </table>
</div>
<!--Table End -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>