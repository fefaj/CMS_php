<div class="col-md-4">



<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>

    <form action="search.php" method="post">

    <div class="input-group">
        <!-- Search name gets catch in the $_POST -->
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <!-- Submit name gets cat in $_POST -->
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form> <!--search form end -->
    <!-- /.input-group -->
</div>




<!-- Blog Categories Well -->
<div class="well">


            <?php

                $query = "SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection,$query);

    
            ?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">


            <?php

            while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                $cat_title = $row['cat_tittle'];
                echo "<li><a href='#'>{$cat_title}</a></li>";

            }

            ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>




<!-- Side Widget Well -->


<?php include "includes/widget.php"; ?>

    
  