<?php
$userID = "delta";
$userPw = "uscItp2019";
$mySQL = new mysqli(
    "460.itpwebdev.com",
    $userID,
    $userPw,
    "delta_scout");

    if($mySQL->connect_errno){
      echo "ERROR ". $mySQL->connect_error;
      exit();
  }
  else{
      // echo "all good with the db connection! ";
  }

  $sql = "SELECT * FROM management_companies";
  $results =  $mySQL->query($sql);
  if( !$results ) {
           echo "SQL error: ". $mySQL->error;
           $mySQL->close();
           exit();
   };


   $results_per_page = 5;
   $current_page = 1;
   $num_results = $results->num_rows;

   $last_page = ceil($num_results / $results_per_page);

   if ($num_results == 0) {
    $last_page = 1;
  }

  if ( isset($_GET['page']) && !empty($_GET['page']) ) {
    $current_page = $_GET['page'];
  }

  if ($current_page < 1 ) {
    $current_page = 1;
  } else if ($current_page > $last_page) {
    $current_page = $last_page;
  }

  $start_index = ($current_page - 1) * $results_per_page;


  $sql = $sql . " LIMIT $start_index, $results_per_page";

  $results =  $mySQL->query($sql);
  if( !$results ) {
           echo "SQL error: ". $mySQL->error;
           $mySQL->close();
           exit();
   };


   $mySQL->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SCOUT Sample Page</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

  <!-- 5-Star Ratings -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<style>
  .checked {
    color: #7CBD1E;
  }

  .img-listing img{
    width:100%;
  }

  .page-link {
    color: #7CBD1E;
  }

  .page-link:hover {
    color: #7CBD1E;
  }

  .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #7CBD1E;
    border-color: #7CBD1E;
}

  h3 a, h3 a:hover {
    color: #096017;
  }

  .housing hr {
    border-width: 1px ;
    border-color: #A9A9AA;
  }


</style>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

       <a href="homepage.php"><img src="img/scoutwhite.png" style="width:8rem;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="results.php">Listings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="management_companies.php">Management</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">



      <!-- <input class="form-control" type="search" placeholder="Search for a specific company." aria-label="Search">
      <a href="#" class="btn btn-primary btn-lg">Find</a> -->
      <br>
      <br>
      <h2>Local Management Companies</h2>

<hr class="mb-4">


    <!-- Jumbotron Header -->
<!--     <div class="jumbotron my-4">
      <h1>Find your new off campus home</h1>
      <h2>Filters / Results / Title of Page<h2>
      <h3>Apartment / Management Company</h3>
      <p>Address Here</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus</p>
    </div> -->

    <div class="housing row mx-1 mb-4">
   
     <h2>Search Results: <?php if( $num_results == 0) : ?>
          0
        <?php else : ?>

          <?php echo $start_index + 1 ?> 
          - 
          <?php echo $start_index + $results->num_rows; ?>

          <?php endif; ?> 
          of 
          <?php echo $num_results ?>
            result(s).
          </h2>
     
     <?php while($currentrow = $results->fetch_assoc() ) : ?>

    <div class="col-12 jumbotron my-0">


      <div class="col-3 pl-0 img-listing float-left my-auto">
          <img class="imglisting-img" src="<?php echo $currentrow['management_image']; ?>" alt="">
        </div>
        <div class="col-9 ml-auto">
        <h3><a href="<?php echo $currentrow['management_website']; ?>"> <?php echo $currentrow['management_name']; ?></a></h3>
        <p class="light-gray-text"><?php echo $currentrow['management_address']; ?></p>
        <p class="light-gray-text"><?php echo $currentrow['management_phone']; ?></p>
        <p class="light-gray-text"><?php echo $currentrow['management_email']; ?></p>
        <p class="light-gray-text">Rating: <?php echo $currentrow['management_rating']; ?>/5 Stars</p>
        <a class="btn btn-primary btn-sm" href="results.html">View Listings</a>
        <br>
        </div>
      </div>
      <?php endwhile; ?>
    </div> <!-- .housing -->




    <br>

    <div class="row">
      <nav class="col-12 my-1 mx-auto" aria-label="Page navigation">
        <ul class="pagination justify-content-center">
         <li class="page-item <?php if( $current_page <= 1) { echo 'disabled'; } ?>">
            <a class="page-link" href="<?php $_GET['page'] = $current_page - 1; echo $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET) ?>">&larr; Previous</a>
         </li>
         
         <li class="page-item active">
            <a class="page-link" href=""><?php echo $current_page; ?></a>
          </li>

         <li class="page-item">
           <a class="page-link" href="<?php $_GET['page'] = $current_page + 1; echo $_SERVER['PHP_SELF'] . '?' . http_build_query($_GET) ?>">Next &rarr;</a>
         </li>
        </ul>
      </nav>
  </div> <!-- .row -->



  </div>
  <!-- /.container -->

  <!-- Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>