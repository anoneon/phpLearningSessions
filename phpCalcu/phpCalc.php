<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="phpCalc.css">
</head>
<body>
    <div class="container">
        <div class="calc-body">
            <div class="title">
                PHP<br>CALCULATOR
            </div>
            <div class="data">
                <div class="form-group">
                    <form action="" method="post">
                        <div class="form-input-field">
                            <input class="op" type="text" name="num1" id="" placeholder="enter number" required>
                            <input class="op" type="text" name="num2" id="" placeholder="enter number" required>
                            <select class="op" name="selector" id="">
                                <option value="add">ADD</option>
                                <option value="sub">SUBTRACT</option>
                                <option value="mul">MULTIPLY</option>
                                <option value="div">DIVIDE</option>
                            </select>
                            <input class="op btn" type="submit" value="CALCULATE" name="submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="result">
                <p>
                    <?php
                        if(isset($_POST['submit'])){
                            $num1=$_POST['num1'];
                            $num2=$_POST['num2'];
                            $operator=$_POST['selector'];

                            switch($operator){
                                case "add":$sum=$num1+$num2;
                                    echo "The sum is {$sum}";
                                break;
                                case "sub":$sub=$num1-$num2;
                                    echo "The difference is {$sub}";
                                break;
                                case "mul":$mul=$num1*$num2;
                                   echo "The multiplication result is {$mul}";
                                break;
                                case "div":$div=$num1/$num2;
                                    echo "The division result is {$div}";
                                break;
                                default:echo "Sorry not Exist";
                            }
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>