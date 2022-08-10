<?php


    require('includes/dbcons.php'); // connect to database

   
             // Get all the albums from database
            $sql_select_statment = " SELECT * FROM album ";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {

                while ($row = mysqli_fetch_array($sql)) {

                    // display all the data result in website
                    require('includes/audio_card.php');
                }
            } else {

                // send message if we can not get the data
                echo 'Can not get the data! ';
            }
       ?>