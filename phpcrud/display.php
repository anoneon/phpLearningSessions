<?php
        include 'connection.php';

        $selectQuery = "select * from jobregistration";

        $query=mysqli_query($con,$selectQuery);
        // $rows=mysqli_num_rows($query);
?>
 
        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>

    <div class="container">
        <div class="fluid-container">
            <table class="table">
                <thead>
                    <tr class="throw">
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Degree</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Reference</th>
                        <th>Job Post</th>
                        <th colspan="2">Tool</th>
                    </tr>
                </thead>
                <tbody>
                <?php       while($res = mysqli_fetch_array($query)){
            ?>
                    <tr class="tbrow">
                        <td><?php echo $res['id'];?></td>
                        <td><?php echo $res['name'];?></td>
                        <td><?php echo $res['degree'];?></td>
                        <td><?php echo $res['mobile'];?></td>
                        <td><?php echo $res['email'];?></td>
                        <td><?php echo $res['refer'];?></td>
                        <td><?php echo $res['post'];?></td>
                        <td><a id="link" href="update.php?id=<?php echo $res['id'];?>">EDIT>></a></td> 
                        <td><a id="link" href="delete.php?id=<?php echo $res['id'];?>">DEL>></a></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
