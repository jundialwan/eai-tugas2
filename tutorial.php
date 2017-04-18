<?php
	if(!isset($_SERVER['PHP_AUTH_USER'])){
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Text to send if user hits Cancel button';
		exit;
	} else {
		echo "<p>Hello ".$_SERVER['PHP_AUTH_USER']."</p>";
		echo "<p>You have entered your password.</p>";
	}
	$username = $_SERVER['PHP_AUTH_USER'];
	$password = $_SERVER['PHP_AUTH_PW'];

	$auth = base64_encode($username.':'.$password);
	
	// $aContext = array(
	// 	'http' => array(
	// 		'proxy' => 'tcp://152.118.24.10:8080',
	// 		'request_fulluri' => true,
	// 		'header' => "Proxy-Authorization: Basic $auth",
	// 	),
	// );
	// $cxContext = stream_context_create($aContext);

	// $maps_url = 'http://103.200.7.153/restws/rs_rest_services.php/student/';
	// $maps_json = file_get_contents($maps_url);
	// $maps_array = json_decode($maps_json,true);
	// $temp = $maps_array['success']['result'];
	// print_r($temp);
	
	// echo "<br>";
	// $temp = $temp[0];
	// print_r($temp);
	
	// echo "<br>";
	// $temp = implode(" ",$temp);
	// print_r($temp);
?>

<div>
	<input id="student" style="width: 20vw" type="Text" name="" placeholder="search student by name or ID">
	<button id="btn-student">Search Student</button>
</div>
<br>
<div>
	<input id="course" style="width: 20vw" type="Text" name="" placeholder="search course by name or ID">
	<button id="btn-course">Search Course</button>
</div>
<br>

<div style="float: left;margin-right: 38vw">
	<input id="total" type="text" name="" style="border: none;font-weight: bold;">
</div>

<div style="display: inline-block;">
	<input id="total2" type="text" name="" style="border: none;font-weight: bold;">
</div>

<br>
<div>
	<table id="resultstudent" style="float: left;margin-right: 10vw">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Student ID</th>
			<th>Birthdate</th>
			<th>Accepted Year</th>
		</thead>
		<tbody id="resstudent">
			
		</tbody>
	</table>

	<table id="resultcourse" style="display: inline-block;">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Course ID</th>
			<th>Semester</th>
		</thead>
		<tbody id="rescourse">
			
		</tbody>
	</table>
</div>
<style type="text/css">
	table, th, td {
	   border: 1px solid black;
	}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$("#btn-student").click(function() {
        uRl = 'https://crossorigin.me/http://103.200.7.153/restws/rs_rest_services.php/student/'; 
        $.get(uRl, function(data) {
        	var tbody = document.getElementById("resstudent");
        	tbody.remove();
        	var body = document.createElement("tbody");
        	body.setAttribute("id","resstudent");
        	$('#resultstudent').append(body);
        	data = JSON.parse(data).success;
        	var total = 0;
        	for(var i = 0;i < data.result.length;i++){
        		if(data.result[i].name.toUpperCase().includes($('#student').val().toUpperCase()) || data.result[i].studentID.toUpperCase().includes($('#student').val().toUpperCase())){
        			total++;
	        		var newtr = document.createElement("tr");
	          		var td1 = document.createElement("td");
	                td1.appendChild(document.createTextNode(data.result[i].id));
	          		var td2 = document.createElement("td");
	          		td2.appendChild(document.createTextNode(data.result[i].name));
	          		var td3 = document.createElement("td");
	          		td3.appendChild(document.createTextNode(data.result[i].gender));
	          		var td4 = document.createElement("td");
	          		td4.appendChild(document.createTextNode(data.result[i].studentID));
	          		var td5 = document.createElement("td");
	          		td5.appendChild(document.createTextNode(data.result[i].birthdate));
	          		var td6 = document.createElement("td");
	          		td6.appendChild(document.createTextNode(data.result[i].acceptedYear));
	          		newtr.append(td1);
	          		newtr.append(td2);
	          		newtr.append(td3);
	          		newtr.append(td4);
	          		newtr.append(td5);
	          		newtr.append(td6);
	          		body.append(newtr);
	          	}
        	}
        	$('#total').val('Find ' + total + ' data for "' + $('#student').val() + '"');
        });
    });

    $("#btn-course").click(function() {
        uRl = 'https://crossorigin.me/http://103.200.7.153/restws/rs_rest_services.php/courses/'; 
        $.get(uRl, function(data) {
        	var tbody = document.getElementById("rescourse");
        	tbody.remove();
        	var body = document.createElement("tbody");
        	body.setAttribute("id","rescourse");
        	$('#resultcourse').append(body);
        	data = JSON.parse(data).success;
        	var total = 0;
        	for(var i = 0;i < data.result.length;i++){
        		if(data.result[i].name.toUpperCase().includes($('#course').val().toUpperCase()) || data.result[i].coursesID.toUpperCase().includes($('#course').val().toUpperCase())){
        			total++;
	        		var newtr = document.createElement("tr");
	          		var td1 = document.createElement("td");
	                td1.appendChild(document.createTextNode(data.result[i].id));
	          		var td2 = document.createElement("td");
	          		td2.appendChild(document.createTextNode(data.result[i].name));
	          		var td3 = document.createElement("td");
	          		td3.appendChild(document.createTextNode(data.result[i].coursesID));
	          		var td4 = document.createElement("td");
	          		td4.appendChild(document.createTextNode(data.result[i].semester));
	          		newtr.append(td1);
	          		newtr.append(td2);
	          		newtr.append(td3);
	          		newtr.append(td4);
	          		body.append(newtr);
	          	}
        	}
        	$('#total2').val('Find ' + total + ' data for "' + $('#course').val() + '"');
        });
    });
</script>