<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
    <style>
        table{
            border:1px black solid;
            border-spacing:0px;
            margin-top:20px;
        }
        td{
            border:1px solid black;
            padding:30px;
        }
        .bg{
            background-color:black;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="data" id="" required>
        <input type="submit" name="submit" value="Generate">
    </form>
    <table>
        <?php
            if(isset($_POST['submit'])){
                $data=$_POST['data'];

                for($i=1;$i<=$data;$i++){
                    echo "<tr>";
                    for($j=1;$j<=$data;$j++){
                        if(($i+$j)%2 == 0){
                            echo "<td class='bg'></td>";
                        }else{
                            echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                }
            }
            else{
                echo "error";
            }
        ?>
    </table>
</body>
</html>