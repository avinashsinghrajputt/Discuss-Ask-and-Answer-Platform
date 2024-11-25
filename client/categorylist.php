<div class="container">
    <h1 class="heading center">Category List</h1>
    <?php
    include("./common/db.php");
    $query= "select * from category";
    $result=$conn->query($query);
    foreach($result as $row){
        $name= $row['name'];
        $id= $row['id'];
        echo "<div class='row' style='padding: 15px; margin: 10px 0; border: 2px solid #333; border-radius: 5px; background-color: #fafafa; transition: background-color 0.3s;'>"
        ."<a href='?c-id=$id' style='font-size: 24px; text-decoration: none; color: #007BFF; font-weight: 400;'>$name</a>"
        ."</div>";
    }
    ?>
</div>