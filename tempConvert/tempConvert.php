<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Conversion</title>
    <link rel="stylesheet" href="tempConvert.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Temperature Converter</h1>
        </div>
        <div class="calculatorBox">
            <div class="form-group">    
                <form action="" method="post">
                        <input class="input-field" type="text" name="input" id="" placeholder="enter">
                        <label for="unit1">Celcius</label>
                        <input type="radio" name="units" id="unit1" value="cel">
                        <label for="unit2">Farenheit</label>
                        <input type="radio" name="units" id="unit2" value="feh">
                        <input class="btn" type="submit" name="submit" value="Convert">
                </form>
                <div>
                    <p>
                        <?php
                            if(isset($_POST['submit'])){
                                $num = $_POST['input'];
                                $temp = $_POST['units'];
                                if($temp=="cel"){
                                    $cel=($num-32)*(5/9);
                                    echo "temperature in celsius is {$cel}";             
                                }
                                else{

                                    $feh=((9/5)*$num)+32;
                                    echo "temperature in fahrenheit is {$feh}";
                                }
                            }
                        ?>
                    </p>
                </div>
            </div>             
        </div>
    </div>
</body>
</html>