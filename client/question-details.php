<div class="container">
    <h1 class="heading center">Question Details</h1>
    <div class="row">
    <div class="col-8">
    <?php
    include("./common/db.php");
    $query= "select * from questions where id= $qid";
    $result=$conn->query($query);
    $row=$result->fetch_assoc();
    $cid=$row['category_id'];
    echo "<h4 class='margin-bottom-15 question-title'>Question: ".$row['title']."</h4>
    <p class='margin-bottom-15'>".$row['description']."</p>";
    include('./client/answers.php');
    ?>
    <form action="./server/requests.php" method="post">
        <input type="hidden" name="question_id" value="<?php echo $qid; ?>">
        <textarea name="answer" class="form-control margin-bottom-15" placeholder="Your answer..."></textarea>
        <button class="btn btn-primary margin-bottom-15">Write your answer</button>
    </form>
</div>
<div class="col-4">
    <?php
    $categoryQuery= "select name from category where id=$cid";
    $categoryResult=$conn->query($categoryQuery);
    $categoryRow=$categoryResult->fetch_assoc();
    echo "<h1 class='heading center'>".ucfirst($categoryRow['name'])."</h1>";

    $query= "select * from questions where category_id=$cid and id!=$qid";
    $result=$conn->query($query);
    foreach($result as $row){
        $title= $row['title'];
        $id= $row['id'];
        echo "<div class='row' style='padding: 10px; margin: 10px 0; border: 1px solid #333; border-radius: 5px; background-color: #fafafa; transition: background-color 0.3s;'>"
        ."<a href='?c-id=$id' style='font-size: 18px; text-decoration: none; color: #007BFF; font-weight: 400;'>$title</a>"
        ."</div>";
    }
    ?>

</div>
</div>
</div>