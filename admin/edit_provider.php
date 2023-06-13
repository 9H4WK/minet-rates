<?php 
include "includes/header.php";
include "includes/conn.php";
include "includes/functions.php";

if (isset($_GET["i"])) {

    $id = intval($_GET["i"]);

    echo $id;

    $providerQuery = $mysql->prepare("select name, options, plans, available, comments, inpatient_l, inpatient from providers where id=?");
    $providerQuery->bind_param("i",$id);
    $providerQuery->execute();
    $providerQuery->store_result();

    $id;
    $name;
    $options;
    $plans;
    $available;
    $comments;
    $inpatient_l;
    $inpatient;

    if($providerQuery->num_rows > 0){
        try {
            $providerQuery->bind_result($name, $options, $plans, $available, $comments, $inpatient_l, $inpatient);
            echo gettype($name);
            echo gettype($id);
        } catch (Throwable $th) {
            echo $th;
        }
    }else{
        echo "<div class=\"alert alert-danger\">";
        echo "<strong> Something went wrong. </strong>";
        echo "</div>";
    }
}else {
    echo "Nothing";
    $name = "No Name";
}

?>

<div>
    <?php 
        echo gettype($comments);
    ?>
</div>





<?php include "includes/footer.php"; ?>