<?php 
include "includes/header.php";
include "includes/conn.php";

    $providerQuery = $mysql->query("select * from providers");

?>



<section class="intro">
<div>
    <a href="add_provider.php">
        <button type="button" class="btn btn-primary">Add Provider</button>
        <p></p>
    </a>
</div>
  <div class="bg-image h-100" style="background-color: #f5f7fa;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="poptionsition: relative; height: 700px">
                  <table class="table table-strplansed mb-0">
                    <thead style="background-color: #FF0B0B;">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Plans</th>
                        <th scope="col">Options</th>
                        <th scope="col">Available</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $providerQuery = $mysql->query("select * from providers");
                        while ($row = $providerQuery->fetch_assoc()) { 
                            $id = $row["id"];
                            $name = $row["name"];
                            $options = $row["options"];
                            $plans = $row["plans"];
                            $available = $row["available"];
                            $comments = $row["comments"];
                            
                            $actionView = "<a href=\"view_provider.php?i=$id\"><button type=\"button\" class=\"btn btn-sm btn-outline-success\">View</button></a>";
                            $actionEdit = "<a href=\"edit_provider.php?i=$id\"><button type=\"button\" class=\"btn btn-sm btn-outline-info\"> Edit</button></a>";
                            $actionDelete = "<button type=\"button\" class=\"btn btn-sm btn-outline-danger\"> Delete</button>";

                            echo "<tr>";
                                echo "<td>" . $name . "</td>";
                                echo "<td>" . $options . "</td>";
                                echo "<td>" . $plans . "</td>";
                                echo "<td>" . $available . "</td>";
                                echo "<td>" . $comments . "</td>";
                                echo "<td>" . $actionView . " " . $actionEdit. " " . $actionDelete. " " . "</td>";
                            echo "</tr>";
                        }
                    ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<?php include "includes/footer.php"; ?>