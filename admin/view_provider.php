<?php 
include "includes/header.php";
include "includes/conn.php";
include "includes/functions.php";

if (isset($_GET["i"])) {

    $id = $_GET["i"];

    $providerQuery = $mysql->prepare("select * from providers where id=?");
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
        $providerQuery->bind_result($id, $name, $options, $plans, $available, $inpatient_l, $inpatient, $comments);
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
        echo $name;
    ?>
</div>




<?php include "includes/footer.php"; ?>