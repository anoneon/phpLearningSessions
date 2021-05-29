<?php

try{
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "pdopracdb";

    $conn = new PDO("mysql:host=$server; dbname=$db",$username,$password);

    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);  // default fetch mode


    //simple insert
    // $insertQ = "insert into pdotbl(name,age) values('suraj',24)";
    // $conn->query($insertQ);
    // $conn->exec($insertQ);

    // insert using named parameter
    // $name = "suraj3";
    // $age = 25;
    // $insertQ = "insert into pdotbl(name,age) values(:name,:age)";
    // $fireQ = $conn->prepare($insertQ);
    // $fireQ->bindParam(':name',$name);
    // $fireQ->bindParam(':age',$age);
    // $fireQ->execute();

    // insert using named parameter without bind
    // $name = "suraj6";
    // $age = 28;
    // $insertQ = "insert into pdotbl(name,age) values(:name,:age)";
    // $fireQ = $conn->prepare($insertQ);
    // $fireQ->execute(['name'=>$name,'age'=>$age]);

    // insert using positioned parameter
    // $name = "suraj4";
    // $age = 26;
    // $insertQ = "insert into pdotbl(name,age) values(?,?)";
    // $fireQ = $conn->prepare($insertQ);
    // $fireQ->bindParam(1,$name);
    // $fireQ->bindParam(2,$age);
    // $fireQ->execute();

    // insert using positioned parameter without bind
    // $name = "suraj5";
    // $age = 27;
    // $insertQ = "insert into pdotbl(name,age) values(?,?)";
    // $fireQ = $conn->prepare($insertQ);
    // $fireQ->execute([$name,$age]);

    // show query
    // $showQ = "select * from pdotbl";
    // $fireQ = $conn->prepare($showQ);
    // $fireQ->execute();

    //types of PDO fetch using scope resolution operator
    // $fetchQ = $fireQ->fetch(PDO::FETCH_ASSOC);  // fetch as associative array 
    // echo "<pre>";
    // print_r($fetchQ);
    // $fetchQ = $fireQ->fetch(PDO::FETCH_NUM);  // fetch as num 
    // echo "<pre>";
    // print_r($fetchQ);
    // $fetchQ = $fireQ->fetch(PDO::FETCH_OBJ);  // fetch as object 
    // echo "<pre>";
    // print_r($fetchQ);

    //fetch using while loop as objects
    // while($fetchQ = $fireQ->fetch()){
    //     echo "Name : " . $fetchQ->name . " Age : " . $fetchQ->age ."<br>";
    // };


    //fetch using associative array in foreach loop
    // $fetchQ = $fireQ->fetchAll(PDO::FETCH_ASSOC);
    // foreach($fetchQ as $val){
    //     echo "Name : " . $val['name'] . " Age : " . $val['age'] ."<br>";
    // }



    // Update
    // $name = "updated Suraj";
    // $age = 27;
    // $updateQ = "update pdotbl set name=? where age=?";
    // $fireQ = $conn->prepare($updateQ);
    // $fireQ->execute([$name,$age]);



    // Delete
    // $id = 2;
    // $deleteQ = "delete from pdotbl where id=?";
    // $fireQ = $conn->prepare($deleteQ);
    // $fireQ->execute([$id]);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}


?>