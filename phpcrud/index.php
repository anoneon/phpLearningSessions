<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'link.php' ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="mainContainer"> 
    <div class="bodyContainer">
        <div class="leftSide">
            <h1 class="leftSideHeading">My Corp.</h1>
            <P class="leftSidePara">Fill up the form with your details</P>
            <a id="link" href="display.php">CHECK</a>
        </div>
        <div class="rightSide">
            <div class="rightSideHead">
                <h1 class="rightSideHeading">Job Form</h1>
            </div>
            <div class="rightSideInput">
                <form action="" method="post">
                   
                    <div class="left">
                        <input type="text" name="name" id="" placeholder="Enter Your Name" required>
                        <input type="tel" name="mobile" id="" placeholder="Mobile Number" required>
                        <input type="text" name="refer" id="" placeholder="* AnyReference">
                    </div>
                    <div class="right">
                        <input type="text" name="degree" id="" placeholder="Qualification" required>
                        <input type="email" name="email" id="" placeholder="Mail Id" required>
                        <input type="text" name="post" id="" value="Web Developer">
                    </div>
                    
                    <input class="btn submitBtn" type="submit" name="submit" value="Register">
                </form>
            </div>

        </div>
    </div>    
    </div>
</body>
</html>
<?php
    include 'connection.php'
?>
<?php
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $degree = $_POST['degree'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $refer = $_POST['refer'];
        $post = $_POST['post'];
    

    $insertQuery = "insert into jobregistration(name,degree,mobile,email,refer,post) values('$name','$degree','$mobile','$email','$refer','$post')";

    $res = mysqli_query($con,$insertQuery);

    if($res){
        ?>
        <script>
            alert("Data inserted successfully");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("insertion unsucessful");
        </script>
        <?php
    }

    }

?>