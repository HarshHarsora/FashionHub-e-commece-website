<?php
    $con=mysqli_connect("localhost","root","","ecommerceweb");

    $hello="SELECT * FROM tbl_product ORDER BY p_qty";
    // $hello="SELECT * FROM `tbl_product`";
    $result=mysqli_query($con,$hello);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
     <tr>
        <td>Id</td>
        <td>name</td>
     </tr>



     <tr>
     <?php
     while($row=mysqli_fetch_assoc($result))
     {
     ?>
        <td>
            <?php echo $row['p_id']?>
        </td>
        <td>
            <?php echo $row['p_name']?>
        </td>
        <td>
            <?php echo $row['p_old_price']?>
        </td>
        <td>
            <?php echo $row['p_qty']?>
        </td>
     </tr>

     <?php
}
?>
    </table>
</body>
</html>