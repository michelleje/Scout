
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

  // LISTINGS

  $sql_listings = "SELECT * FROM property_listings;";
  $results_listings = $mysqli->query($sql_listings);
  if ( $results_listings == false ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

  // SPACE TYPES

  $sql_space_types = "SELECT * FROM property_space_types;";
  $results_space_types = $mysqli->query($sql_space_types);
  if ( $results_space_types == false ) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

$mysqli->close();


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

  <title>SCOUT</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

  <link href="css/homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
<!--      <a class="navbar-brand" href="#">Logo Here</a>-->
       <a href="homepage.html"><img src="img/scoutwhite.png" style="width:8rem;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
<!--
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
-->
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
      <br><br><br> <br><br><br>

      <div class="maintext">
        <h1>Find your new off-campus home</h1>
      </div>
      
      <div id="search" class="text-center">

        <form action="results.php" method="GET">
      <input class="form-control" name="usersearch" type="search" placeholder="What are you looking for? Ex: Ellendale Place" aria-label="Search">
      <!-- <a href="results.html" class="btn btn-primary btn-lg">Find</a> -->
      <button class="btn btn-primary btn-lg">Find</button>

      <br>
      <br>


<!-- div class="btn-group">      
  <button id="bedrooms" class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      # of Bedrooms
    </button>
    <div class="dropdown-menu bedroom-menu">
      <a class="dropdown-item" href="#">Studio</a>
      <a class="dropdown-item" href="#">1</a>
      <a class="dropdown-item" href="#">2</a>
      <a class="dropdown-item" href="#">3</a>
      <a class="dropdown-item" href="#">4+</a>
      <a class="dropdown-item" href="#">Any</a>

    </div>

  </div> -->

     <!-- *********THIS PHP WORKS BUT NEEDS TO BE STYLED********* -->


    <select name="bedrooms">

        <option value="" selected disabled class="dropdown-item"># Bedrooms</option>

        <option value="" class="dropdown-item">Any</option>

        <option value="0" class="dropdown-item">0</option>
        <option value="1" class="dropdown-item">1</option>
        <option value="2" class="dropdown-item">2</option>
        <option value="3" class="dropdown-item">3</option>
        <option value="4" class="dropdown-item">4</option>
        <option value="5" class="dropdown-item">5</option>
        <option value="6" class="dropdown-item">6</option>
        <option value="7" class="dropdown-item">7</option>
        <option value="8" class="dropdown-item">8</option>


           

      </select>

    <!-- *********THIS PHP WORKS BUT NEEDS TO BE STYLED********* -->


        
<!-- <div class="btn-group">      
  <button id="bathrooms" class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      # of Bathrooms
    </button>
    <div class="dropdown-menu bathroom-menu">
      <a class="dropdown-item" href="#">1</a>
      <a class="dropdown-item" href="#">2</a>
      <a class="dropdown-item" href="#">3</a>
      <a class="dropdown-item" href="#">4+</a>
      <a class="dropdown-item" href="#">Any</a>
    </div>
  </div> -->



    <!-- *********THIS PHP WORKS BUT NEEDS TO BE STYLED********* -->


    <select name="bathrooms">

        <option value="" selected disabled class="dropdown-item"># Bathrooms</option>

        <option value="" class="dropdown-item">Any</option>

        <option value="0" class="dropdown-item">0</option>
        <option value="1" class="dropdown-item">1</option>
        <option value="2" class="dropdown-item">2</option>
        <option value="3" class="dropdown-item">3</option>
        <option value="4" class="dropdown-item">4</option>
        <option value="5" class="dropdown-item">5</option>
        <option value="6" class="dropdown-item">6</option>
        <option value="7" class="dropdown-item">7</option>

          

      </select>

    <!-- *********THIS PHP WORKS BUT NEEDS TO BE STYLED********* -->


        
<!-- <div class="btn-group">      
  <button id="propertytype" class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <label for="property-type" > Property Type</label>
    </button>
    <select name="property-type" id="property-type" class="dropdown-menu property-menu">

        <option class="dropdown-item" value="all"> Select a property type</option>
        <option class="dropdown-item" value="all">--------------</option> -->




    <!-- *********THIS PHP WORKS BUT NEEDS TO BE STYLED********* -->


    <select name="property_type">

        <option value="" selected disabled class="dropdown-item">Property Type</option>

        <option value="" class="dropdown-item">Any</option>

            <?php 
            while ( $row = $results_space_types->fetch_assoc() ) : 
            ?>

            <option value="<?php echo $row['space_type_id'] ?>">
              <?php echo $row['type']; ?>
            </option>

            <?php endwhile; ?>

      </select>

    <!-- *********THIS PHP WORKS BUT NEEDS TO BE STYLED********* -->

<!-- 
    
    </select>
    <div class="dropdown-menu property-menu">
      <a class="dropdown-item" href="#">House</a>
      <a class="dropdown-item" href="#">Apartment</a>
      <a class="dropdown-item" href="#">Condo</a>
      <a class="dropdown-item" href="#">Any</a>
    </div>
</div> -->
      
  
      <br>
      <br>
      <br>
      

   
    <br>

    </div> <!-- /. search div -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<!--
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
     /.container 
  </footer>
-->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script>

     $(document).ready(function(){
            $(".bedroom-menu a").click(function(){
            $("#bedrooms").text($(this).text());
            });
        });

      $(document).ready(function(){
            $(".bathroom-menu a").click(function(){
            $("#bathrooms").text($(this).text());
            });
        });

       $(document).ready(function(){
            $(".property-menu a").click(function(){
            $("#propertytype").text($(this).text());
            });
        });


  </script>

</body>

</html>
