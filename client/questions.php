<div class="container">
    
    <div class="row">
    <div class="col-8"> 
    <h1 class="heading center">Questions</h1>

    <?php
    include("./common/db.php");
    if(isset($_GET["c-id"]) && $_GET["c-id"] !== 'all'){
        // $cid=$_GET['c-id'];
        $cid = intval($_GET['c-id']);
        $query= "select * from questions where category_id= $cid";
    }
    else if(isset($_GET["u-id"])){
        $uid=$_GET['u-id'];
        $query= "select * from questions where user_id= $uid";
    }
    else if(isset($_GET["latest"])){
        $query= "select * from questions order by id desc";
    }
    else if(isset($_GET["search"])){
        $query= "select * from questions where `title`  LIKE '%$search%' ";
    }
    else{
        $query= "select * from questions";
    }
    $result=$conn->query($query);
    
    $result=$conn->query($query);
    foreach($result as $row){
        $title= $row['title'];
        $id= $row['id'];
        echo "<div style=' width: full; padding: 15px; display: flex; justify-content: space-between; margin: 10px 0; border: 2px solid #333; border-radius: 5px; background-color: #fafafa; transition: background-color 0.3s; max-width: 800px; width: 100%; align-items: center;'>";
echo "<a href='?q-id=$id' class='my-question' style='font-size: 24px; text-decoration: none; color: #007BFF; font-weight: 400; margin-right: 15px;'>$title</a>";
if (isset($uid)) {
    echo " <a href='./server/requests.php?delete=$id' style='font-size: 20px; background-color: #FF7F7F;  color: red; margin-left: 10px; text-decoration: none; padding: 5px 10px; border-radius: 3px; transition: background-color 0.3s;' onmouseover='this.style.backgroundColor=\"#FF474D\"' onmouseout='this.style.backgroundColor=\"#FF474D\"'>Delete</a>";
}
echo "</div>";
    }
    ?>
        </div>

    <div class="col-4">
        <?php include('categorylist.php'); ?>

    </div>
    </div>
</div>