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
      echo "all good with the db connection! ";
  }
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


</style>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

       <a href="homepage.html"><img src="img/scoutwhite.png" style="width:8rem;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="results.html">Listings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="management_companies.html">Management</a>
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
    <div class="row">
    

      <div class="col-12 jumbotron my-0">
        <div class="float-right">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
        </div>

        <div class="col-3 pl-0 img-listing float-left">
          <img src="img/gateway.png" alt="">
        </div>
        <h3>University Gateway</h3>
        <p class="light-gray-text">3335 S Figueroa St, Los Angeles, CA 90007</p>
        <p class="light-gray-text">Phone: (213) 279-3367</p>
        <p class="light-gray-text">Email: management@livegw.com</p>

        <br>

        <a class="btn btn-primary btn-sm" href="results.html">View Listings</a>
      </div>

      <div class="col-12 jumbotron-white my-0">
        <div class="float-right">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>

         <div class="col-3 pl-0 img-listing float-left">
          <img src="img/stuho.jpg" alt="">
        </div>

        <h3>Stuho</h3>
        <p class="light-gray-text">2595 S Hoover St Suite C, Los Angeles, CA 90007</p>
        <p class="light-gray-text">Phone: (323) 731-1034</p>
        <p class="light-gray-text">Email: leasing@stuho.com</p>
        
        <br>

        <a class="btn btn-primary btn-sm" href="results.html">View Listings</a>
      </div>

      <div class="col-12 jumbotron my-0">
        <div class="float-right">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
        </div>

         <div class="col-3 pl-0 img-listing float-left">
          <img src="img/lorenzo.jpg" alt="">
        </div>

        <h3>Lorenzo Apartments</h3>
        <p class="light-gray-text">325 W. Adams Blvd, Los Angeles, CA 90007</p>
        <p class="light-gray-text">Phone: (213) 863-4307</p>
        <p class="light-gray-text">Email: info@thelorenzo.com</p>
        
        <br>

        <a class="btn btn-primary btn-sm" href="results.html">View Listings</a>
      </div>

      <div class="col-12 jumbotron-white my-0">
        <div class="float-right">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>

         <div class="col-3 pl-0 img-listing float-left">
          <img src="img/mosaic.png" alt="">
        </div>

        <h3>Mosaic Student Communities</h3>
        <p class="light-gray-text">1248 W Adams Blvd, Los Angeles, CA 90007</p>
        <p class="light-gray-text">Phone: (323) 733-2258</p>
        <p class="light-gray-text">Email: leasing@livewithmosaic.com</p>
        
        <br>

        <a class="btn btn-primary btn-sm" href="results.html">View Listings</a>
      </div>
    </div> <!-- .row -->


    <br>

    <nav aria-label="...">
      <ul class="pagination justify-content-center">
       <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">&larr;</a>
       </li>
       <li class="page-item active"><a class="page-link" href="#">1</a></li>
       <li class="page-item">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
       </li>
       <li class="page-item"><a class="page-link" href="#">3</a></li>
       <li class="page-item">
         <a class="page-link" href="#">&rarr;</a>
       </li>
      </ul>
    </nav>




  </div>
  <!-- /.container -->

  <!-- Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>