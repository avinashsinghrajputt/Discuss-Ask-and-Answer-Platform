<?php
session_start();
include('../common/db.php');
if(isset($_POST['signup'])){
    // echo "Username is ".$_POST['username']."<br>";
    // echo "email is ".$_POST['email']."<br>";
    // echo "Password is ".$_POST['password']."<br>";
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $user=$conn->prepare("Insert into `users` (`id`, `username`, `email`, `password`) values (NULL,'$username','$email','$password');");
    $result = $user->execute();

    if($result){
        echo "New User registered successfully";
        $_SESSION['user']=["user_id"=>$user->insert_id, "username"=>$username, "email"=>$email];
        header("location: /discuss");
    }
    else{
        echo "Error: ".$conn->error; 
    }

}elseif(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $username="";
    $user_id=0;
    $query= "select * from users where email='$email' and password='$password' ";
    $result=$conn->query($query);
    
    if($result->num_rows==1){
        foreach($result as $row){
            $username=$row['username'];
            $user_id=$row['id'];
        }
    }
    if($email){
        echo "User login successfully";
        $_SESSION['user']=["user_id"=>$user_id, "username"=>$username, "email"=>$email];
        header("location: /discuss");
    }
    else{
        echo "Error: ".$conn->error; 
    }
}
elseif(isset($_GET['logout'])){
    session_unset();
    header("location: /discuss");
}
elseif(isset($_POST["ask"])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $category_id=$_POST['category'];
    $user_id=$_SESSION['user']['user_id'];

    $question=$conn->prepare("Insert into `questions` (`id`, `title`, `description`, `category_id`, `user_id`) values (NULL,'$title','$description','$category_id', '$user_id')");
    $result = $question->execute();
    $question->insert_id;
    if($result){
        header("location: /discuss");
    }
    else{
        echo "Question is not added to website"; 
    }
}
else if(isset($_POST['answer'])){
    $question_id=$_POST['question_id'];
    $answer=$_POST['answer'];
    $user_id=$_SESSION['user']['user_id'];

    $query=$conn->prepare("Insert into `answers` (`id`, `answer`, `question_id`, `user_id`) values (NULL,'$answer','$question_id', '$user_id')");
    $result = $query->execute();

    if($result){
        header("location: /discuss?q-id=$question_id");
    }
    else{
        echo "Answer is not submitted"; 
    }
}
else if(isset($_GET['delete'])){
    $qid=$_GET['delete'];
    $query=$conn->prepare("delete from questions where id=$qid");
    $result = $query->execute();
    if($result){
        header("location: /discuss");
    }
    else{
        echo "Question is not deleted"; 
    }
}
else{
    echo "Invalid request";
}



?>