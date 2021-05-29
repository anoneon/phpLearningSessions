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
                <?php
                    include 'connection.php';

                    $idGet=$_GET['id'];
                    
                    $showQuery="select * from jobregistration where id={$idGet}";
                    $show=mysqli_query($con,$showQuery);
                    $showFetch = mysqli_fetch_array($show);
                    
                    if(isset($_POST['update'])){
                        $name = $_POST['name'];
                        $degree = $_POST['degree'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $refer = $_POST['refer'];
                        $post = $_POST['post'];
                    
                
                        $updateQuery = "update jobregistration set name='$name',degree='$degree',mobile='$mobile',email='$email',refer='$refer',post='$post' where id={$idGet}";
                    
                        $update = mysqli_query($con,$updateQuery);
                    
                        if($update){
                            
                            ?>
                            <script>
                                alert("Data inserted successfully");
                            </script>

                            <?php header('location:display.php');
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
                    <div class="left">
                        <input type="text" name="name" id="" placeholder="Enter Your Name" value="<?php echo $showFetch['name'];?>" required>
                        <input type="tel" name="mobile" id="" placeholder="Mobile Number" value="<?php echo $showFetch['mobile'];?>" required>
                        <input type="text" name="refer" id="" placeholder="* AnyReference" value="<?php echo $showFetch['refer'];?>">
                    </div>
                    <div class="right">
                        <input type="text" name="degree" id="" placeholder="Qualification" value="<?php echo $showFetch['degree'];?>" required>
                        <input type="email" name="email" id="" placeholder="Mail Id" value="<?php echo $showFetch['email'];?>" required>
                        <input type="text" name="post" id="" placeholder="Post" value="<?php echo $showFetch['post'];?>" >
                    </div>
                    
                    <input class="btn submitBtn" type="submit" name="update" value="Update">
                </form>
            </div>

        </div>
    </div>    
    </div>
</body>
</html>