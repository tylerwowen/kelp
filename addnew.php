<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="Tyler Weimin Ouyang">
  <link rel="icon" href="../../favicon.ico">

  <title>KELP</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/jumbotron.css" rel="stylesheet">

  <!-- Bootstrap Form Helpers -->
    <link href="css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">KELP</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <form name="signin" class="navbar-form navbar-right" action="#" method="post" accept-charset="utf-8">
          <div class="form-group">
            <input name="username" type="text" placeholder="Email" class="form-control" required>
          </div>
          <div class="form-group">
            <input name="password" type="password" placeholder="Password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success" value="Signin">Sign in</button>
        </form>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </nav>


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Report A New Found Tag
          <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a>
          </li>
          <li class="active">New Tag</li>
        </ol>
      </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-md-8">
        <!-- Embedded Google Map -->
        <div id="input-map"></div>
      </div>
      <!-- Contact Details Column -->
      <div class="col-md-4">
        <h3>Contact Details</h3>
        <p>
          3481 Melrose Place
          <br>Beverly Hills, CA 90210
          <br>
        </p>
        <p><i class="fa fa-phone"></i>
          <abbr title="Phone">P</abbr>: (123) 456-7890</p>
        <p><i class="fa fa-envelope-o"></i>
          <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">name@example.com</a>
        </p>
        <p><i class="fa fa-clock-o"></i>
          <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
        <ul class="list-unstyled list-inline list-social-icons">
          <li>
            <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <?php

    // define variables and set to empty values
    $tagnumber = $location = $email = $notes = "";
    $emailErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $tagnumber = test_input($_POST["tagnumber"]);
      $location = test_input($_POST["location"]);
      $email = test_input($_POST["email"]);
      $notes = test_input($_POST["notes"]);

      $myfile = fopen("testfile.txt", "w") or die("Unable to open file!");;
      // test form
      fwrite($myfile, $tagnumber);
      fwrite($myfile, $location);
      fwrite($myfile, $email);
      fwrite($myfile, $notes);
      fclose($myfile);
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>

    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-md-8">
        <h3>Details</h3>
        <form name="reportTag" id="tagInfoDorm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="control-group form-group">
            <div class="controls">
              <label>Tag number:</label>
              <input name="tagnumber" type="text" class="form-control" id="tagnumber" required data-validation-required-message="Please enter the tag number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label for="location">Location:</label>
              <select name="location" class="form-control" required data-validation-required-message="Please select the beach where you found the tag">
                <option disabled>*Please select the beach where you found the tag</option>
                <option>Beach 1</option>
                <option>Beach 2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label for="time">Time:</label>
              <!-- <input type="datetime" class="form-control" id="time" required data-validation-required-message="Please choose the date you found the tag"> -->
              <div name="time" class="bfh-datepicker" data-min="04/01/2015" data-max="today" data-close="false"></div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address(Optional):</label>
              <input name="email" type="email" class="form-control" id="email">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Notes(Optional):</label>
              <textarea name="notes" rows="10" cols="100" class="form-control" id="message" maxlength="240" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary">Report Tag</button>
        </form>
      </div>

    </div>
    <!-- /.row -->


    </p>
  </div>

  <hr>

  <footer>
    <p>&copy; UCSB ERI 2015</p>
  </footer>
  </div>
  <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl9CSSyXgI9eM_M0Ocu2jH1SAd81vCJW4"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/kpmap-input.js"></script>
  <script src="js/addnew.js"></script>
  <!-- Bootstrap Form Helpers -->
  <script src="js/bootstrap-formhelpers.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
