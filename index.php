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
    require('includes/header.html');
    ?>

    <!-- Header section ends here -->

    <!-- Main section start here -->
    <main class="w-100 p-5" id="library">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-center py-3">
                    <h2> All Audios </h2>
                    <a href="search_page.php"> Search your music </a>
                </div>

            </div>

            <div class="row">

                <?php
                require('includes/select_all_data.php');
                ?>

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