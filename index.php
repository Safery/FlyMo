<!DOCTYPE html>
<html>
    <head>
		<title></title>
        <link rel="stylesheet" href="UiKit/css/uikit.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="UiKit/js/uikit.min.js"></script>
        <!-- Autocomplete CSS -->
        <link rel="stylesheet" href="UiKit/css/components/components/autocomplete.css">
        <!-- Autocomplete Javascript -->
        <script src="UiKit/js/components/autocomplete.js"></script>
		<!-- DatePicker elements -->
		<link rel="stylesheet" href="http://dbushell.github.io/Pikaday/css/pikaday.css">
		<link rel="stylesheet" href="http://dbushell.github.io/Pikaday/css/site.css">
		<!-- Javascript file containing some scripting elements -->
        <script src="scripts/main_index.js" type="text/javascript"></script>
		<script src="http://momentjs.com/downloads/moment.min.js" type="text/javascript"></script>
		<!-- Main css element containing core effects and design -->
		<link rel="stylesheet" href="css/main.css" />
		<!-- Plotly.js -->
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    </head>	
    <body>
		<div id="wrapper">
		</div>
		<div class="main_content">
			<div class="uk-animation-scale-down" id="main_area">
				<form class="uk-form" id="main_form">
					<fieldset data-uk-margin>
						<input type="text" placeholder="Departure Date" id="depart_date">
						<input type="text" placeholder="Return Date" id="return_date">
					</fieldset>
					<fieldset data-uk-margin>
						<input type="text" placeholder="From: Airport Code" id="from_location">
						<input type="text" placeholder="To: Airport Code" id="to_location">
					</fieldset>
					<fieldset data-uk-margin id="checkbox_1">
						<label><input type="checkbox">Roundtrip</label>
					</fieldset>
					<fieldset data-uk-margin id="checkbox_2">
						<label><input type="checkbox">Oneway</label>
					</fieldset>
					<fieldset data-uk-margin id="button">
						<button class="uk-button uk-width-1-2 uk-button-primary" onClick='FindFlights()'>Search</button>
					</fieldset>
					<fieldset id="loader">
						<div class="loading block" id="loading_Blox"> <!-- LOADER -->
							<div class="progress-bar downloading" id="downloader"></div>
							<p id="load_text"><span class="icon fontawesome-cloud-download scnd-font-color"></span>Loading...</p>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<div id="result_content">
			<div class="uk-animation-scale-up" id="main_area">
				<h1 id="ticket_title"> Ticket Information </h1>
				<div id="routes"> </div>
				<p id="price"> price </p>
			</div>
		</div>
    <script src="http://dbushell.github.io/Pikaday/pikaday.js"></script>
    <script>
		// Set the range of date for date picking.
		var dept_date = new Pikaday(
		{
			field: document.getElementById('depart_date'),
			format: 'YYYY-MM-DD',
			minDate: new Date(2000, 0, 1),
			maxDate: new Date(2020, 12, 31),
			yearRange: [2000,2020],

		});
		var return_date = new Pikaday(
		{
			field: document.getElementById('return_date'),
			format: 'YYYY-MM-DD',
			minDate: new Date(2000, 0, 1),
			maxDate: new Date(2020, 12, 31),
			yearRange: [2000,2020]
		});
		
		$("#main_form").submit(function(){
			event.preventDefault();

		});

    </script>

    </body>
</html>
