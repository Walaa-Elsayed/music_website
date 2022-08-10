<!DOCTYPE html>
<html lang="en">

<!-- Head section starts here -->
<?php
    require('includes/head.html');
?>
<!-- Head section ends here -->

<body>

   <!-- Header section starts here -->
   <?php
    require('includes/search_header.html');
    ?>

<!-- Header section ends here -->

<!-- Main section start here -->
    <main class="w-100" id="library">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3 pl-5 pt-5" id="left_row_select_search">

                    <h3>Find Your Choice </h3>
                    <div id='search_form'>

                        <?php
                        require('includes/form.html');
                        ?>

                    </div>
                </div>

                <div class=" col-md-9 bg-light p-5">
                    
                        <div class="row">
                            <h3> Audio Result </h3>
                        </div>

                        <div class="row">

                            <?php
                            require('includes/select_data_search.php');
                            ?>

                        </div>

                </div>

            
            </div>

        </div>

       
    </main>

<!-- Main section ends here -->


<!-- Footer section starts here -->
<?php
    require('includes/footer.html');
    ?>
<!-- Footer section ends here -->


</body>

</html>