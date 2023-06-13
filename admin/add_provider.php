<?php 
include "includes/header.php";
include "includes/conn.php";
include "includes/functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["num"]) && isset($_POST["avail"])){
    $name = strtoupper($_POST["name"]);
    $numPlans = intval($_POST["num"]);
    $avail = strtoupper($_POST["avail"]);
    $comments = $_POST["comment"];

    try {
        $insertQuery = $mysql->prepare("INSERT INTO providers(name,options,available,comments) values(?,?,?,?)");
        $insertQuery->bind_param("ssss",$name,$numPlans,$avail,$comments);
        $insertQuery->execute();
    } catch (Throwable $th) {
        echo "Erro : " . $th;
    }
    echo "Success";   
}else {
    echo "<center>Enter Underwriter Details. </center>";
}
?>

<div class="container-fluid">
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Provider Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" required>
        </div>
        <div class="mb-3">
            <label for="num" class="form-label">Number of plans</label>
            <input type="number" min="1" max="10" class="form-control" id="num" name="num" aria-describedby="num" required>
        </div>
        <div class="mb-3">
        <label for="avail" class="form-label">Available</label>
            <select class="form-select" aria-label="Available" name="avail" id="avail">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
        </div>
        <!-- <a href="add_provider.php">
            <button type="button" class="btn btn-primary">Add Categories</button>
        <p></p>
    </a> -->
        <br>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>








<?php include "includes/footer.php";?>