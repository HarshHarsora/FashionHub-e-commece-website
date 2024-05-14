<?php
       $con=mysqli_connect("localhost","root","","ecommerceweb");

       if(isset($_POST['submit']))
       {
            $name=$_POST['name'];
            $p_qty=$_POST['p_qty'];

            $qry="INSERT INTO `last_product`(`id`, `name`, `p_qty`) VALUES (null,'$name','$p_qty')";

            mysqli_query($con,$qry);
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" id="">
            </td>
        </tr>
        <tr>
            <td>product qty</td>
            <td>
                <input type="number" name="p_qty" id="">
            </td>
        </tr>
        <tr>
            <td><input type="submit"  value="submit" name="submit" id=""></td>
        </tr>
    </form>
</body>
</html>