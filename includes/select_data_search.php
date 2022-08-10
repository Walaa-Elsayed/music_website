<?php



$genre_input = "";
$date_input = "";

if (
    isset($_POST["album_name"]) || isset($_POST["artist_name"]) || isset($_POST["record_label"])
    || isset($_POST["genre"]) || isset($_POST["date_release"])
) {



    // Get the requested data for search
    $album_name_input =  htmlspecialchars($_POST["album_name"], ENT_QUOTES, 'UTF-8');
    $artist_name_input =  htmlspecialchars($_POST["artist_name"], ENT_QUOTES, 'UTF-8');
    $record_label_input =  htmlspecialchars($_POST["record_label"], ENT_QUOTES, 'UTF-8');
    
    
    // % character to use in like search
    if($album_name_input!=''){

        $album_name_value =  $album_name_input;
        $album_name_input = '%'.$album_name_value .'%'; 
    }

    if($artist_name_input!=''){

        $artist_name_value =  $artist_name_input;
        $artist_name_input= '%'.$artist_name_value .'%'; 
    }

    if($record_label_input!=''){

        $record_label_value =  $record_label_input;
        $record_label_input= '%'. $record_label_value .'%'; 
    }

    $genre_input = htmlspecialchars($_POST["genre"], ENT_QUOTES, 'UTF-8');
    $date_input =  htmlspecialchars($_POST["date_release"], ENT_QUOTES, 'UTF-8');
    $order_input =  htmlspecialchars($_POST["order"], ENT_QUOTES, 'UTF-8');



    require('includes/dbcons.php'); // connect to database

    if ($genre_input == 'all' && $date_input == 'all') { // genre= '' && date release = ''

        // Check if any entered value in artist name , label name and albume name 
        if (!empty($_POST["album_name"]) || !empty($_POST["artist_name"]) || !empty($_POST["record_label"])) {

            $sql_select_statment = " SELECT * FROM album WHERE 
                                                                album_name LIKE '" . $album_name_input . "'
                                                                OR artist_name LIKE '" . $artist_name_input . "'
                                                                OR record_label LIKE '" . $record_label_input . "' 
                                                                ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }


        }
        // check if for input fields value not empty  ends here

        else {  // 
            require('includes/dbcons.php'); // connect to database
            $sql_select_statment = " SELECT * FROM album ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }

        }
    } elseif ($genre_input != 'all' && $date_input == 'all') { // genr!= '' && date release = ''

        if (!empty($_POST["album_name"]) || !empty($_POST["artist_name"]) || !empty($_POST["record_label"])) {
            $sql_select_statment = " SELECT * FROM album WHERE 
                                                        ( album_name LIKE '" . $album_name_input . "'
                                                        OR artist_name LIKE '" . $artist_name_input . "'
                                                        OR record_label LIKE '" . $record_label_input . "' ) 
                                                        AND genre = '" . $genre_input . "' 
                                                        ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }



        } else {


            // if the input element not empty

            $sql_select_statment = " SELECT * FROM album WHERE genre = '" . $genre_input . "' 
            ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }


        }
    } // else if ends here

    elseif ($genre_input == 'all' && $date_input != 'all') { // genre= '' && date release != ''

        if (!empty($_POST["album_name"]) || !empty($_POST["artist_name"]) || !empty($_POST["record_label"])) {
            $sql_select_statment = " SELECT * FROM album WHERE
                                                        ( album_name LIKE '" . $album_name_input . "'
                                                        OR artist_name LIKE '" . $artist_name_input . "'
                                                        OR record_label LIKE '" . $record_label_input . "')
                                                        AND (release_date = '" . $date_input . "' )
                                                        ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }


        } else {
            $sql_select_statment = " SELECT * FROM album WHERE release_date = '" . $date_input . "' 
                                                            ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }


        }
    } // else if ends here


    else if ($genre_input != 'all' && $date_input != 'all') {

        if (!empty($_POST["album_name"]) || !empty($_POST["artist_name"]) || !empty($_POST["record_label"])) {
            $sql_select_statment = " SELECT DISTINCT * FROM album WHERE
                                                                        ( album_name LIKE '" . $album_name_input . "'
                                                                        OR artist_name LIKE '" . $artist_name_input . "' 
                                                                        OR record_label LIKE '" . $record_label_input . "')  
                                                                        AND ( genre = '" . $genre_input . "' 
                                                                        AND release_date = '" . $date_input . "') 
                                                                        ORDER BY album_name" . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }



        } // end if statment to check if we have another input data to search like album_name , artist_name or record_label

        else { // if the user just enter genre or date to check 

            $sql_select_statment = " SELECT DISTINCT * FROM album WHERE
                                                                        ( genre = '" . $genre_input . "' 
                                                                        AND release_date = '" . $date_input . "') 
                                                                        ORDER BY album_name " . $order_input . "";

            $sql = mysqli_query($con, $sql_select_statment);
            

            if ($sql) {
                if(mysqli_num_rows($sql) > 0){

                    while ($row = mysqli_fetch_array($sql)) {

                        
                        require('includes/audio_card.php');
                        
                    }} 
                    else{
                        echo '<br> Sorry, No result found !';
                    }
            } else {
                echo '<br> SQL Query error.';
                
            }
        }
    } // end if statement to check if genre not empty and date input value not empty

    // else for check genre and data value ends here





} // if ends here = to check if any input value in search form



else {

    require('includes/dbcons.php'); // connect to database
    $sql_select_statment = " SELECT * FROM album ";

    $sql = mysqli_query($con, $sql_select_statment);

    if ($sql) {
        if(mysqli_num_rows($sql) > 0){

            while ($row = mysqli_fetch_array($sql)) {

                
                require('includes/audio_card.php');
                
            }} 
            else{
                echo '<br> Sorry, No result found !';
            }
    } else {
        echo 'SQL Query error.';
        
    }
}
