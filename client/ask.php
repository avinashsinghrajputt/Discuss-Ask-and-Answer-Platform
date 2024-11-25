<div class="container">
    <h1 class="center mt-2 mb-3">ASK QUESTION</h1>
    <form class="col-6 offset-sm-3" method="post" action="./server/requests.php">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter your Question" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter Description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <?php include('category.php'); ?>
        </div>
        <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>
    </form>
</div>
