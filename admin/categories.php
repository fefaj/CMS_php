<?php include "includes/admin_header.php" ?>


    <div id="wrapper">

<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                        <!-- Populating category title -->
                        <!-- <div class="col-xs-6"> -->

                        <?php

                        if(isset($_POST['submit'])){

                            $cat_title = $_POST['cat_title'];

                            if($cat_title == "" || empty($cat_title)){

                            echo "this should not be empty";

                            } else {

                                

                                $query = "INSERT INTO categories(cat_tittle)";
                                $query .= "VALUES ('{$cat_title}')";

                                $create_category_query = mysqli_query($connection, $query);     

                                if(!$create_category_query){
                                    die ('query Failed' . mysql_error($connection));
                                }
                            }
                        }

                        ?>

                        <form action="" method="post" >
                            <div class="col-xs-6" class="form-group">
                                <label for="cat-title">Add Category</label>

                                <input type="text" class="form-control" name="cat_title"> 
                           <br>
                           <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                           <br>
                                <label for="cat-title">Edit Category</label>

<?php

if(isset($_GET['edit'])){
$cat_id = $_GET['edit'];

$query = "SELECT * FROM categories where cat_id = $cat_id ";
$select_categories_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_tittle'];
    ?>

<input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
  

    <?php } } ?>
                
                                
                                
                                <!-- <input type="text" class="form-control" name="cat_title"> -->
                                <br>
                                <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
                            </div>
                        </form>
                        
                        

                        <!-- <form action="" method="post" >
                            <div class="col-xs-6" class="form-group">
                                
                            </div>
                        
                        </form>
                         -->
                        
                        <div class="col-xs-6">



                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

 <?php //find all categories query

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_tittle'];
    //echo "<li><a href='#'>{$cat_title}</a></li>";
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    //deleting IDs
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a>";
    
      //       <a href='categories.php?edit={$cat_id}'>  Update</a></td>";
    //update link
    echo "<td><a href='categories.php?edit={$cat_id}'> Edit</a></td>";
    //EDIT link

    echo "</tr>";

}

?>

<?php

//delete query

if (isset($_GET['delete'])){
    $the_cat_id =  $_GET['delete'];
    
$query = "delete from categories where cat_id = {$the_cat_id} ";
$delete_query = mysqli_query($connection, $query);
header("Location: categories.php"); // refreshes a page

}
?>









                                    
                                </tbody>
                            </table>
                            


                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>
