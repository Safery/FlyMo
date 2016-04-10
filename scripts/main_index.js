var counter = 0;


// Function to send all flight details to PHP.
function FindFlights(){

	var depart_date = document.getElementById("depart_date").value;
	var return_date = document.getElementById("return_date").value;
	var from_location = document.getElementById("from_location").value;
	var to_location = document.getElementById("to_location").value;
	// Use Ajax GET method to send URL
    var xmlhttp;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if(xmlhttp.status == 200){
			   // Make the loading box appear
			   	document.getElementById("loader").style.display = "block";
			   while (counter != 101){
				   if (counter == 101){
					   break;
				   }
				   else{
					   setTimeout(change_CSS(), 1000);
					   counter = counter + 1;
				   }
			   }
			   	document.getElementById("load_text").innerHTML = "Generating Report..";
               //document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
			   // Fade out the main search box
			   setTimeout(function(){
				document.getElementById("main_area").className = "uk-animation-scale-up uk-animation-reverse";
			   }, 1000);
			   
			   // Make the response generation area appear
			   document.getElementById("result_content").className = "uk-animation-scale-up";
			   setTimeout(function(){
			   document.getElementById("result_content").style.display = "block";
			   }, 1000);
			   
			   //---------- GENERATING AJAX RESPONSE START HERE ---------------
			   	var obj = JSON.parse(xmlhttp.responseText);
				// Set the location to location data with the title
				document.getElementById("ticket_title").innerHTML = "Ticket Information - " + obj['location'];
				
				// Set the airports
				var sel_route_element = document.getElementById("routes");
				var key;
				for(key in obj['route']){
					var p = document.createElement('p');
					p.innerHTML = obj['route'][key];
					sel_route_element.appendChild(p);
				}
				
				//Set the price
				document.getElementById("price").innerHTML = "<b><font color='red'>Price: </font></b> $" + obj['price'];
			   //---------- GENERATING AJAX RESPONSE ENDS HERE ---------------
           }
           else if(xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    }
    xmlhttp.open("GET", 'php/search.php?depart_date=' + depart_date + '&return_date=' + return_date + '&from_location=' + from_location + '&to_location=' + to_location, true);
    	console.log(xmlhttp.send());
}

function change_CSS(){
	document.getElementById("downloader").style.background = "-webkit-linear-gradient(left, #4fc4f6 " + counter + "%, #50597b " + counter + "%)";
	document.getElementById("downloader").style.background = "-ms-linear-gradient(left, #4fc4f6 " + counter + "%, #50597b " + counter + "%)";
	document.getElementById("downloader").style.background = "linear-gradient(to right, #11a8ab " + counter + "%, #50597b " + counter + "%)";

	}

function Create_Graph(plots){
	var get_plot1 = parseInt(plots[0]);
	var trace2 = {
	  x: [get_plot1, 958],
	  y: [get_plot1, 958],
	  type: 'scatter'
	};

	var data = [trace2];

	var layout = {
	  xaxis: {
		type: 'scatter',
		autorange: true
	  },
	  yaxis: {
		type: 'scatter',
		autorange: true
	  }
	};

	Plotly.newPlot('myDiv', data, layout);
}


// Function to 'generate' sleep in code.
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
