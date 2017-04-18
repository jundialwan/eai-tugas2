x<?php
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
	
	// echo "<br>";
	// $temp = $temp[0];
	// print_r($temp);
	
	// echo "<br>";
	// $temp = implode(" ",$temp);
	// print_r($temp);
?>

<div>
	<form name="formstudent" action="lab.php" method="get">
		<input id="student" style="width: 20vw" type="Text" name="student" placeholder="search student by name or ID">  
		<button id="btn-student">Search Student</button>
	</form>
</div>
<div>
	<form name="formcourse" action="lab.php" method="get">
		<input id="course" style="width: 20vw" type="Text" name="course" placeholder="search course by name or ID">
		<button id="btn-course">Search Course</button>
	</form>
</div>
<br>

<div>
<?php
	function find($total,$word){
		echo "<input style='border: none;font-weight: bold;' value='Find ".$total." student data for `".$word."`' type='text'>";
	}
?>
</div>

<br>
<div>
	<table id="resultstudent" style="float: left;display: inline-block;">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Student ID</th>
			<th>Birthdate</th>
			<th>Accepted Year</th>
		</thead>
		<tbody id="resstudent">
			<?php
				function search(){
					$maps_url = 'http://103.200.7.153/restws/rs_rest_services.php/student/';
					$maps_json = file_get_contents($maps_url);
					$maps_array = json_decode($maps_json,true);
					$temp = $maps_array['success']['result'];
					$word = $_GET['student'];
					$total = 0;
					for($i = 0;$i < count($temp);$i++){
						if(strpos(strtoupper($temp[$i]['name']), strtoupper($word)) !== false || strpos(strtoupper($temp[$i]['studentID']), strtoupper($word)) !== false){
							$total++;
							echo "<tr>";
							echo "<td>".$temp[$i]['id']."</td>";
							echo "<td>".$temp[$i]['name']."</td>";
							echo "<td>".$temp[$i]['gender']."</td>";
							echo "<td>".$temp[$i]['studentID']."</td>";
							echo "<td>".$temp[$i]['birthdate']."</td>";
							echo "<td>".$temp[$i]['acceptedYear']."</td>";
							echo "</tr>";
						}
					}
					find($total,$word);
				}

				if (isset($_GET['student'])) {
			    	search();
			  	}
			?>		
		</tbody>
	</table>

	<table id="resultcourse" style="float: right;">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Course ID</th>
			<th>Semester</th>
		</thead>
		<tbody id="rescourse">
			<?php
				function search2(){
					$maps_url = 'http://103.200.7.153/restws/rs_rest_services.php/courses/';
					$maps_json = file_get_contents($maps_url);
					$maps_array = json_decode($maps_json,true);
					$temp = $maps_array['success']['result'];
					$word = $_GET['course'];
					$total = 0;
					for($i = 0;$i < count($temp);$i++){
						if(strpos(strtoupper($temp[$i]['name']), strtoupper($word)) !== false || strpos(strtoupper($temp[$i]['coursesID']), strtoupper($word)) !== false){
							$total++;
							echo "<tr>";
							echo "<td>".$temp[$i]['id']."</td>";
							echo "<td>".$temp[$i]['name']."</td>";
							echo "<td>".$temp[$i]['coursesID']."</td>";
							echo "<td>".$temp[$i]['semester']."</td>";
							echo "</tr>";
						}
					}
					find2($total,$word);
				}

				if (isset($_GET['course'])) {
			    	search2();
			  	}
			?>
		</tbody>
	</table>
	<div>
	<?php
		function find2($total,$word){
			echo "<div>";
			echo "<input style='border: none;font-weight: bold;' value='Find ".$total." course data for `".$word."`' type='text'>";
			echo "</div>";
		}
	?>
	</div>
</div>
<style type="text/css">
	table, th, td {
	   border: 1px solid black;
	}
</style>