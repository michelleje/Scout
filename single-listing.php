<?php

if ( !isset($_GET['listing_id']) || empty($_GET['listing_id'])) {
  // missing or invalid track ID
  $error = "Invalid URL";

} else {

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

  $listing_id = $_GET['listing_id'];

  $sql = "SELECT property_listings.listing_id, property_listings.property_name AS property_name, property_listings.property_price AS price, property_listings.property_address AS address, property_listings.bedrooms AS bedrooms, property_listings.bathrooms AS bathrooms,property_space_types.type AS space_type, management_companies.management_name AS management, management_companies.management_email, property_listings.image
    FROM property_listings
    LEFT JOIN management_companies
      ON management_companies.management_id = property_listings.property_management_id
      LEFT JOIN property_space_types
      ON property_space_types.space_type_id = property_listings.property_space_type_id
      WHERE listing_id = $listing_id";

  $results = $mysqli->query($sql);


  if ( $results == false ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

  $row = $results->fetch_assoc();


  $mysqli->close();


}


?>


<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137447568-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-137447568-1');
</script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
    <!-- *************TO DO: ECHO PHP PROPERTY NAME IN HERE************* -->
    </title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

  <style>

    h6 a {
      color: #096017;
      text-decoration: none;
    }

    li {
      list-style-type: none;
    }

    .space-info {
      color: #7BBD1D;
    }

    h3 {
      color: #096017;
    }

    #back a:hover {
      color: #096017;

    }

    h4 {
    color: #096017;
  }


  </style>

</head>

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
<br>
<br>
<br>

<!-- Page Content -->
<div class="container">

  <?php if ( isset($error) && !empty($error) ) : ?>

  <div class="text-danger font-italic">
          <?php echo $error; ?>
        </div>

  <?php else : ?>



  
  <br>
  <br>
  <h6 id="back"><a href="results.php">&lt Back to Results</a></h6>
  <hr>
  <br>
  <br>

  <div class="row">

    <div class="col-sm-6">
      <h4>Images</h4>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        </ol>
        <div class="carousel-inner" style="width: 80%; margin:auto">

    <!-- *************TO DO: ECHO PROPERTY IMAGES IN THESE************* -->


          <div class="carousel-item active">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="<?php echo $row['property_name']?> 1">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="'<?php echo $row['property_name']?>' 2">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="'<?php echo $row['property_name']?>' 3">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="'<?php echo $row['property_name']?>' 4">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="'<?php echo $row['property_name']?>' 5">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="'<?php echo $row['property_name']?>' 6">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-thumbnail img-fluid max-width: 100%" src='<?php echo $row['image']?>' alt="'<?php echo $row['property_name']?>' 7">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
      <br>
      <div class="text-center">
        <!-- <button type="button" class="btn btn-primary">Contact Management</button> -->

    <!-- *************TO DO: BUILD EMAIL FUNCTION WITH PHP POPULATED EMAIL ADDRESS ************* -->


        <div class="container-box rotated">
          <button type="button" id="contact-management" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><a href="mailto: leasing@stuho.com?subject=Leasing%20Inquiry&body=Hi!%20I'd%20like%20to%20learn%20more%20about%20The%20Centurion."  style="color: white"  target="_blank" >Contact Management</a></button>
        </div>

      </div>


    </div><!--col-->



    <div class="col-sm-6">
      <h4>
      <?php echo $row['property_name']?>      
      </h4>

      <p class="light-gray-text">
        
    <!-- *************TO DO: ECHO PHP ADDRESS IN HERE************* -->

      </p>


      <p><span class="space-info">Price:</span> <?php echo $row['property_name']?></p>
      
      <p><span class="space-info">Space Type:</span> <?php echo $row['bedrooms']?>BD/<?php echo $row['bathrooms']?>BA</p>
      
      <p><span class="space-info">Management:</span> <?php echo $row['management']?></p>
      
      <p><span class="space-info">Contact:</span><?php echo $row['management_email']?></p>
      
      <p><span class="space-info">Description:</span>
          <!-- *************TO DO: ECHO DESCRIPTION IN HERE************* -->
      </p>
      
      <p><span class="space-info">Amenities:</span>
        <div class="row">

    <!-- *************TO DO: ECHO AMENITIES IN HERE************* -->

          <div class="col-sm-5 container-fluid">
            <ul>
              <li>Hardwood Floors</li>
              <li>Wall Mounted AC</li>
              <li>Gated Property</li>
              <li>DPS Patrol</li>
            </ul>
          </div><!--column-->

          <div class="col-sm-5 container-fluid">
            <ul>
              <li>Laundry On Site</li>
              <li>Bike Rack</li>
              <li>Newly Renovated</li>
              <li>Bright and Well-lit</li>
            </ul>
          </div><!--column-->
        </div><!--row-->
      </p>

    </div><!--col-->

  </div><!--row-->
  <hr>
  <br>

  <div class="row">

    <div class="col-sm-6">
      <!-- <h4>Reviews</h4> -->

    <!-- *************TO DO: ECHO REVIEWS IN HERE************* -->


      <div class="jumbotron my-2">
        <h3>Jonathan L.</h3>
        <p class="light-gray-text">Management is always so quick to help! The building is located close to Trader Joes - WHICH IS AWESOME!</p>
      </div>
    </div><!--column-->

    <div class="col-sm-6">
      <div class="jumbotron my-2">
        <h3>Asia C.</h3>
        <p class="light-gray-text">The building and units are really great! You wouldn't think so by just looking at the building from the outside. So modern and upgraded. The units are spacious and I love the details.</p>
      </div>
    </div><!--column-->

  </div><!--row-->

  <div class="row">

    <div class="col-sm-6">

      <div class="jumbotron my-2">
        <h3>Michael W.</h3>
        <p class="light-gray-text">Loved this place. Great location. The people who lived there were friendly. And comfortable with me having small parties. Definitely recommend!</p>
      </div>
    </div><!--column-->

    <div class="col-sm-6">
      <div class="jumbotron my-2">
        <h3>Zune N.</h3>
        <p class="light-gray-text">The Centurion was a good place to live during my junior year. No complaints from me! Modern, sleek, and with great AC, couldn't have asked for something better.</p>
      </div>
    </div><!--column-->

  </div><!--row-->
  <hr>
  <br>
<h4>Similar Listings</h4>
<br>

    <!-- *************TO DO: ECHO PHP TEMPLATE RECS************* -->

  <div class="row text-center">

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="img-gateway/gateway1.jpeg" alt="Gateway Image 1">
        <div class="card-body">
          <h4 class="card-title">University Gateway</h4>
          <p class="card-text">2Br/2B </p>
        </div>
        <div class="card-footer">
          <a href="single-listing-gateway.html" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div><!--column-->

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="img-chez-ronne/chezronne1.jpg" alt="Chez Ronne Image 1">
        <div class="card-body">
          <h4 class="card-title">Chez Ronne</h4>
          <p class="card-text">3Br/2B </p>
        </div>
        <div class="card-footer">
          <a href="single-listing-chez.html" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div><!--column-->

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="img-the-shrine/shrine1.jpg" alt="The Shrine Image 1">
        <div class="card-body">
          <h4 class="card-title">The Shrine</h4>
          <p class="card-text">2Br/2B </p>
        </div>
        <div class="card-footer">
          <a href="single-listing-shrine.html" class="btn btn-primary">Learn More</a>
        </div>
      </div>
    </div><!--column-->

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="img-the-pad/pad1.jpg" alt="The Pad Image 1">
        <div class="card-body">
          <h4 class="card-title">The Pad</h4>
          <p class="card-text">2Br/2B </p>
        </div>
        <div class="card-footer">
          <a href="single-listing.html" class="btn btn-primary">Learn More</a>
        </div>
      </div>
  </div><!--column-->





  </div><!--row-->

  <?php endif; ?>





<br><br><br>
</div>
<!-- /.container -->

<!-- Footer -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
