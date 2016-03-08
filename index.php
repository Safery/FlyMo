
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FlyMo - Compare the cheapest flight tickets around the world!</title>

    <!-- Bootstrap core CSS -->
    <link href="boostrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="boostrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
	<link href="css/input_style.css" rel="stylesheet">


	<!-- Core JS DatePicker CSS AND Source-->
	<link rel="stylesheet" href="http://dbushell.github.io/Pikaday/css/pikaday.css">
	<script src="http://dbushell.github.io/Pikaday/pikaday.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="boostrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script>
		function showDate(date) {
			alert('The date chosen is ' + date);
		}

		function updatebox(){
			if(document.getElementById('Oneway').checked){
				document.getElementsByClassName('Return')[0].style.visibility='hidden';
			}
			else if(document.getElementById('Oneway').checked == false){
				document.getElementsByClassName('Return')[0].style.visibility='visible';
			}
			if(document.getElementById('Probability').checked == false){
				document.getElementsByClassName('Probability_Class')[0].style.visibility='hidden';
			}
			else if(document.getElementById('Probability').checked){
				document.getElementsByClassName('Probability_Class')[0].style.visibility='visible';
			}
		}
	</script>
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">FlyMo</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Current Deals!</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Search flight now!</h1>
			
			<div class="main-info">
				<div class="checkbox">
					<label><input id="Oneway" type="checkbox" name="Oneway_info" value="oneway_val" onChange="updatebox();">Oneway</label>
					<label><input id="Roundtrip" type="checkbox" name="Roundtrip_info" value="Roundtrip_val" onChange="updatebox();">Roundtrip</label>
					<label><input id="Probability" type="checkbox" name="Probability_info" value="probability_val" onChange="updatebox();">Price Probability</label>
				</div>
				
				<div class="inputs">
					<div class="dates">
						<div class="Return">
							<input type="text" id="datepicker_return" class="form-control" placeholder="Return Date">
							<script>
								var picker = new Pikaday({ field: document.getElementById('datepicker_return') });
							</script>
						</div>
						
						<div class="Departure">
							<input type="text" id="datepicker_dep" class="form-control" placeholder="Departure Date">
							<script>
								var picker = new Pikaday({ field: document.getElementById('datepicker_dep') });
							</script>					
						</div>
					</div>

					
					<div class="Probability_Class">
						<input type="text" id="ProbabilityDate" class="form-control" placeholder="Duration of Stay"></p>
					</div>
					
					<div class="input-group">
					  <span class="input-group-addon" id="From_Location_span">From</span>
					  <input id="From_Location" type="text" class="form-control" placeholder="Airport Code">

					  <span class="input-group-addon" id="To_Location_span">To</span>
					  <input type="text" id="To_Location" class="form-control" placeholder="Airport Code">
					</div>
				</div>
			</div>
  
			<p class="lead">
              <a href="#" id="search" class="btn btn-lg btn-primary">Search</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>FlyMO <a href="#">[OpenSource Link]</a> is a free to use project.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="boostrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="boostrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="boostrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
