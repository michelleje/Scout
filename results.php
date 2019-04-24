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
//      echo "all good with the db connection! ";
  }
?>
<?php
	// TO DO: Establish DB connection, submit SQL query here. Remember to check for any MySQLi errors.
	$host = "460.itpwebdev.com";
	$user = "delta";
	$pass = "uscItp2019";
	$db = "delta_scout";

	// Establish MySQL Connection.
	$mysqli = new mysqli($host, $user, $pass, $db);

	// Check for any connection errors.
	if ($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');

	// Retreive listings from DB:
	$sql_listings = "SELECT * FROM property_listings;";
	$results_listings= $mysqli->query($sql_listings);
	if ($results_listings == false)
	{
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	// Retreive space types from DB:
	$sql_spacetypes = "SELECT * FROM property_space_types;";
	$results_spacetypes= $mysqli->query($sql_spacetypes);
	if ($results_spacetypes == false)
	{
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}

	// Retreive space types from DB:
	$sql_management = "SELECT * FROM management_companies;";
	$results_management= $mysqli->query($sql_management);
	if ($results_management == false)
	{
		echo $mysqli->error;
		$mysqli->close();
		exit();
	}
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
          <a href="homepage.php"><img src="img/scoutwhite.png" style="width:8rem;"></a>
        <!--      <a class="navbar-brand" href="#">Logo Here</a>-->
<!--        <img href="homepage.php" src="img/scoutwhite.png" style="width:8rem;">-->
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
            <li class="nav-item">
              <a class="nav-link" href="mailto:jemichel@usc.edu">Contact Us</a>
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

      <!-- Filters -->
      <div>
				<form id="filters">
        <div>
          <h2>Filters</h2>

          <hr>
            <br>

				<!-- Property Type -->
				<div class="form-group" style="float:left; margin-right: 5px;">
					<select form="filters" name="property-type" id="property_type">
						<option value="" selected disabled>Property Type</option>
						<?php while($row = $results_spacetypes->fetch_assoc() ): ?>

						<option value="<?php echo $row['space_type_id']; ?>">
							<?php echo $row['type']; ?>
						</option>
						<?php endwhile; ?>
					</select>
				</div>

					<!-- Management Companies -->
					<div class="form-group" style="float:left; margin-right: 5px;">
						<select form="filters" name="management-company" id="management_company">
							<option value="" selected disabled>Management Company</option>
							<?php while($row = $results_management->fetch_assoc() ): ?>
								<option value="<?php echo $row['management_id']; ?>">
									<?php echo $row['management_name']; ?>
								</option>
							<?php endwhile; ?>
						</select>
					</div>

					<div class="form-group" style="float:left;">
						<select form="filters" name="price" id="price">
							<option value="" selected disabled>Monthly Price</option>
							<option value="500">$500 or less</option>
							<option value="1000">$1,000 or less</option>
							<option value="2000">$2,000 or less</option>
							<option value="3000">$3,000 or less</option>
							<option value="4000">$4,000 or less</option>
							<option value="5000">$5,000 or less</option>
							<option value="6000">$6,000 or less</option>
							<option value="7000">$7,000 or less</option>
							<option value="8000">$8,000 or less</option>
							<option value="9000">$9,000 or less</option>
							<option value="10000">$10,000 or less</option>
							<option value="99999">$10,000+</option>
						</select>
					</div>

				</form>
          <br>

          <div id="refresh">
            <button class="btn btn-primary btn-sm btn-sm-refresh" type="button">Refresh</button>

            <p>
            <br>
            <h2>Results for "Ellendale Place"</h2>
            <p>20 of 500</p>
            <hr>
        </div>

    <div id="refresh">
      <a href="results.html"><button class="btn btn-primary btn-sm btn-sm-refresh" type="button">Refresh</button></a>

      <p>
        <br>
        <h2>Results for "One Bedroom Apartment"</h2>
        <p>4 of 25</p>
        <hr>
    </div>

    <div id="results" class="row">
      <div id="details" class="col-7">
        <!-- <div class="row jumbotron my-0"> -->
        <!-- <div class="row my-0 gray">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <img src="img-the-centurion/centurion1.jpg" class="pic">
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
            <a href="single-listing-centurion.html">
              <h5>The Centurion</h5>
            </a>
            <p class="light-gray-text figure-caption">1248 W Adams Blvd, Los Angeles, CA 90007</p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Price: <span class="figure-caption">
                $1,000-2,000</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Duration: <span class="figure-caption"> 6-12
                Months</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Space Type: <span class="figure-caption">
                2BR2BA</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Management: <span class="figure-caption"> First
                Choice Housing</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Contact: <span class="figure-caption">
                firstchoice@gmail.com</span></p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="float-right">
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
            <br>
            <p class="light-gray-text float-right">0.75 miles from USC</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="light-gray-text float-right">10/200 Left</p>
          </div>
        </div> -->
        <?php
            $sql = "SELECT * FROM property_listings";
            $results =  $mySQL->query($sql);

              if(!$results) {
                  echo "SQL error: ". $mySQL->error;
                  exit();
              }
            echo "<h2># of Listings:".$results->num_rows."</h2>";
            while($currentrow = $results->fetch_assoc())
          
{
       echo  "<div class='row my-0 white'>
            <div class='col-lg-4 col-md-12 col-sm-12'>
            </div>
            <div class='col-lg-5 col-md-6 col-sm-12'>
              <a href='single-listing.html'><h5>".$currentrow["property_name"]."</h5></a>".
              "<p class='light-gray-text figure-caption'>".$currentrow["property_address"]."</p>".
              "<p class='' style='color: #7CBD1E; line-height: 0.25;'>Price: <span class='figure-caption'> ".$currentrow["property_price"]."</span> </p>".
              "<p class='' style='color: #7CBD1E; line-height: 0.25;'>Duration: <span class='figure-caption'>".$currentrow["property_lease_duration"]."</span> </p>".
              "<p class='' style='color: #7CBD1E; line-height: 0.25;'>Management: <span class='figure-caption'>".$currentrow["management_property_id"]."</span> </p>".
              "<p class='' style='color: #7CBD1E; line-height: 0.25;'>Contact: <span class='figure-caption'>".$currentrow["property_space_type"]."</span></p>
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
              <p class='light-gray-text float-right'>1/2 Left</p>
            </div>
          </div>"
          ;
        }
?>

        <!-- <div class="row my-0 gray">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <img src="img-gateway/gateway1.jpeg" class="pic">
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
            <a href="single-listing-gateway.html">
              <h5>University Gateway</h5>
            </a>
            <p class="light-gray-text figure-caption">200 S Figueroa Street, Los Angeles, CA 90007</p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Price: <span class="figure-caption">
                $600-1,200</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Duration: <span class="figure-caption"> 9-12
                Months</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Space Type: <span class="figure-caption">
                3BR2BA</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Management: <span class="figure-caption"> University
                Gateway</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Contact: <span class="figure-caption">
                info@livewithgw.com</span></p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="float-right">
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
            <br>
            <p class="light-gray-text float-right">0.75 miles from USC</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="light-gray-text float-right">10/200 Left</p>
          </div>
        </div>

        <div class="row my-0 white">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <img src="img-chez-ronne/chezronne1.jpg" class="pic">
          </div>
          <div class="col-lg-5 col-md-6 col-sm-12">
            <a href="single-listing-chez.html">
              <h5>Chez Ronne</h5>
            </a>
            <p class="light-gray-text figure-caption">235 28th Street, Los Angeles, CA 90007</p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Price: <span class="figure-caption">
                $1,000-2,200</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Duration: <span class="figure-caption"> 12-20
                Months</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Space Type: <span class="figure-caption">
                2BR1BA</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Management: <span class="figure-caption"> Shrine
                Housing</span> </p>
            <p class="" style="color: #7CBD1E; line-height: 0.25;">Contact: <span class="figure-caption">
                leasing@shrineplace.com</span></p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="float-right">
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star checked">&#9733;</span>
              <span class="star">&#9733;</span>
            </div>
            <br>
            <p class="light-gray-text float-right">0.75 miles from USC</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="light-gray-text float-right">10/200 Left</p>
          </div>
        </div> -->

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