<?php
    include_once '../config.php';
$result_array = array();

$sql= "select * from post";
$result = mysqli_query($link, $sql);
$checkresult = mysqli_num_rows($result);

 $data = "";
if ($checkresult > 0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($result_array, $row);

        $data .= '<div class="col-12">
              <div class="job-list ">
                <div class="job-list-logo">
                  <img class="img-fluid" src="images/svg/01.svg" alt="">
                </div>
                <div class="job-list-details">
                  <div class="job-list-info">
                    <div class="job-list-title">
                      <h5 class="mb-0"><a href="job-detail.html">'.$row["title"].'</a></h5>
                    </div>
                    <div class="job-list-option">
                      <ul class="list-unstyled">
                        <li> <span>via</span> <a href="employer-detail.html">Fast Systems Consultants</a> </li>
                        <li><i class="fas fa-map-marker-alt pr-1"></i>Wellesley Rd, London</li>
                        <li><i class="fas fa-filter pr-1"></i>Accountancy</li>
                        <li><a class="freelance" href="#"><i class="fas fa-suitcase pr-1"></i>Freelance</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="job-list-favourite-time"> <a class="job-list-favourite order-2" href="#"><i
                      class="far fa-heart"></i></a> <span class="job-list-time order-1"><i
                      class="far fa-clock pr-1"></i>1M ago</span> </div>
              </div>
            </div>';
    } 
    $result->free();
}

/* send a JSON encded array to client */
// header('Content-type: application/json');
echo $data;

$link->close();

?>
