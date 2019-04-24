<?php

  $host = "460.itpwebdev.com";
  $user = "delta_admin";
  $pass = "uscItp2019";
  $db = "delta_scout";



  $mysqli = new mysqli($host, $user, $pass, $db);

  if ( $mysqli->connect_errno ){
    echo $mysqli->connect_error;
    exit();
  }

	$mysqli->set_charset('utf8');

	$sql = "SELECT property_listings.listing_id, property_listings.property_name AS property_name, property_listings.property_price AS price, property_listings.property_address AS address, property_listings.bedrooms AS bedrooms, property_listings.bathrooms AS bathrooms,property_space_types.type AS space_type, management_companies.management_name AS management, management_companies.management_email, property_listings.image
    FROM property_listings
    LEFT JOIN management_companies
      ON management_companies.management_id = property_listings.property_management_id
      LEFT JOIN property_space_types
      ON property_space_types.space_type_id = property_listings.property_space_type_id
      WHERE 1=1";
	
  if ( isset( $_GET['usersearch'] ) && !empty( $_GET['usersearch']) ) {
    $usersearch = $_GET['usersearch'];
    $sql = $sql . " AND property_listings.property_name LIKE '%$usersearch%'";
  } else {
    $usersearch = "";
  }

  if ( isset( $_GET['bedrooms'] ) && !empty( $_GET['bedrooms']) ) {
    $bedrooms = $_GET['bedrooms'];
    $sql = $sql . " AND property_listings.bedrooms = $bedrooms";
  }

   if ( isset( $_GET['bathrooms'] ) && !empty( $_GET['bathrooms']) ) {
    $bathrooms = $_GET['bathrooms'];
    $sql = $sql . " AND property_listings.bathrooms = $bathrooms";
  }

  if ( isset( $_GET['property_type'] ) && !empty( $_GET['property_type']) ) {
    $property_type = $_GET['property_type'];
    $sql = $sql . " AND property_space_types.space_type_id = $property_type";
  }

  $sql = $sql . ";";

  $results = $mysqli->query($sql);


  if ( $results == false ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

  $mysqli->close();



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137447568-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-137447568-1');
  </script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SCOUT Results Page</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

  <style>
    .slidecontainer {
      width: 100px;
      /* Width of the outside container */
    }

    .slider {
      -webkit-appearance: none;
      /* Override default CSS styles */
      appearance: none;
      width: 100%;
      /* Full-width */
      height: 15px;
      /* Specified height */
      background: #d3d3d3;
      /* Grey background */
      /*outline: 1px solid gray;*/
      border-radius: 30px;
      opacity: 0.7;
      /* Set transparency (for mouse-over effects on hover) */
      -webkit-transition: .2s;
      /* 0.2 seconds transition on hover */
      transition: opacity .2s;
    }

    .slider:hover {
      opacity: 1;
      /* Fully shown on mouse-over */
    }

    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      /* Override default look */
      appearance: none;
      width: 20px;
      /* Set a specific slider handle width */
      height: 20px;
      /* Slider handle height */
      border-radius: 30px;
      background: #4CAF50;
      /* Green background */
      cursor: pointer;
      /* Cursor on hover */
    }

    .slider::-moz-range-thumb {
      width: 25px;
      /* Set a specific slider handle width */
      height: 25px;
      /* Slider handle height */
      background: #4CAF50;
      /* Green background */
      cursor: pointer;
      /* Cursor on hover */
    }

    .float-left {
      float: left;
    }

    #results {
      padding-top: 2%;
      height: 500px;
    }

    .pic {
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .checked {
      color: #7CBD1E;
    }

    .float-right {
      float: right;
    }

    .gray {
      background-color: #F3F6F7;
      padding: 20px 20px;
      margin-bottom: 2rem;
      border-radius: 0.2rem;
    }

    .white {
      background-color: #FFF;
      padding: 20px 20px;
      margin-bottom: 2rem;
      border-radius: 0.2rem;
    }

    .map-img {
      width: 100%;
    }

    #details {
      overflow: auto;
    }
  </style>

</head>

<body>
  
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <!--      <a class="navbar-brand" href="#">Logo Here</a>-->
        <img href="#" src="img/scoutwhite.png" style="width:8rem;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Listings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

		<!-- Search Bar -->
    <div class="container">
      <div id="search-bar" style="margin-bottom: 2%;">
				<form action="">
	        <input class="form-control" type="search" placeholder="Search for housing..." aria-label="Search">
	        <button type="submit" class="btn btn-primary btn-lg">Find</a>
				</form>
      </div>

      

            <p>
            <br>
            <h2>Results for "<?php echo $usersearch ?>"</h2>
            <p>20 of 500</p>
            <hr>
        </div>

    <div id="refresh">
      <a href="results.html"><button class="btn btn-primary btn-sm btn-sm-refresh" type="button">Refresh</button></a>


    <div id="results" class="row">
      <div id="details" class="col-7">
        <?php while ( $row = $results->fetch_assoc()) : ?>
            
         
    <div class='row my-0 white'>

            <div class='col-lg-4 col-md-12 col-sm-12'>
              <img src='<?php echo $row['image']?>' class="pic">
            </div> 
            <div class='col-lg-5 col-md-6 col-sm-12'>

            <a href="single-listing.php?listing_id=<?php echo $row['listing_id']; ?>">
              <h5><?php echo $row['property_name']?></h5>
            </a>

              <h6><?php echo $row['bedrooms']?>BD/<?php echo $row['bathrooms']?>BA</h6>

              <p class='light-gray-text figure-caption'><?php echo $row['address']?></p>

              <p class='' style='color: #7CBD1E; line-height: 0.25;'>Price: <span class='figure-caption'>from $<?php echo $row['price']?>/month</span> </p>


             <p class='' style='color: #7CBD1E; line-height: 0.25;'>Management: <span class='figure-caption'><?php echo $row['management']?></span> </p>
              
              <p class='' style='color: #7CBD1E; line-height: 0.25;'>Contact: <span class='figure-caption'><?php echo $row['management_email']?></span></p>

            </div>
            <div class='col-lg-3 col-md-6 col-sm-12'>
              <div class='float-right'>
                <span class='star checked'>&#9733;</span>
                <span class='star checked'>&#9733;</span>
                <span class='star checked'>&#9733;</span>
                <span class='star checked'>&#9733;</span>
                <span class='star'>&#9733;</span>
              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
            </div>
          </div>
            <?php endwhile; ?>

      </div> <!-- end details -->


      <div id="map" class="col-5">
        <img class="map-img" src="img-results/map.png" alt="">
      </div>

    </div> <!-- end results -->




  </div>


  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function () {
      $(".amenities-menu a").click(function () {
        $("#amenities").text($(this).text());
      });
    });


    $(document).ready(function () {
      $(".space-menu a").click(function () {
        $("#space").text($(this).text());
      });
    });


    $(document).ready(function () {
      $(".management-menu a").click(function () {
        $("#management").text($(this).text());
      });
    });
  </script>

</body>

</html>