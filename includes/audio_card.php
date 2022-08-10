
<?php

echo '<div class="col-md-3 p-3">
                                        <div class="card w-100 p-3 justify-content-center align-items-center" >
                                        <img class="card-img-top " src="images/listen_music.jpg" alt="headphone image" style=" width: 50%; height=50%; ">
                                        <audio controls style="width:200px">
                                        <source src="audios/'.$row['play_path'].'" type="audio/mpeg">
                                          </audio>

                                          <div class="card-body text-center">
                                          <h5 class="card-title">' . $row['album_name'] . ' -  ' . $row['release_date'] . '</h5>
                                          <h6 class="card-title"> Artist Name: ' . $row['artist_name'] . '</h6>
                                          <p class="card-text">Label : ' . $row['record_label'] . '</p>
                                          <p class="card-text"> Genre : ' . $row['genre'] . '</p>
                                        

                                          </div>
                                          </div> </div>';


?>