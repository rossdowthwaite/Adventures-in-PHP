<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php
$monthNames = Array("January", 
					"February", 
					"March", 
					"April", 
					"May", 
					"June", 
					"July", 
					"August", 
					"September", 
					"October", 
					"November", 
					"December");


	// Set the monthe and year
	if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
	if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

	// set the current month/year the the current month/year
	$cMonth = $_REQUEST["month"];
	$cYear = $_REQUEST["year"];
	 
	// set to current year
	$prev_year = $cYear;
	$next_year = $cYear;

	// set prev and next months
	$prev_month = $cMonth-1;
	$next_month = $cMonth+1;
	 
	// make sure the months/years loop properly 
	if ($prev_month == 0 ) {
	    $prev_month = 12;
	    $prev_year = $cYear - 1;
	}
	if ($next_month == 13 ) {
	    $next_month = 1;
	    $next_year = $cYear + 1;
	}
?>

<!-- TABLE 1:prev and next -->
<table id="cont">
	<tr align="center">
		<td>
			<!-- TABLE 2 -->
			<table id="nav">
				<tr>
				<td align="left"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Previous</a></td>
				<td align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Next</a></td>
				</tr>
			</table> <!-- TABLE 2 end -->
		</td>
	</tr>
	<tr>
		<td align="center">
			<!-- TABLE 3 -->
			<table width="100%" border="0" cellpadding="2" cellspacing="2">
				<tr align="center">
					<td class="month" colspan="7" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
				</tr>
				<tr>
					<td class="day">S</td>
					<td class="day">M</td>
					<td class="day">T</td>
					<td class="day">W</td>
					<td class="day">T</td>
					<td class="day">F</td>
					<td class="day">S</td>
				</tr>

			<?php 
			// Get Unix timestamp for a date
			$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
			$maxday = date("t",$timestamp);
			$thismonth = getdate ($timestamp);
			$startday = $thismonth['wday'];

			for ($i=0; $i<($maxday+$startday); $i++) {
			    if(($i % 7) == 0 ) echo "<tr>";
			    if($i < $startday) echo "<td></td>";
			    else echo "<td class='date' valign='middle'>". ($i - $startday + 1) . "</td>";
			    if(($i % 7) == 6 ) echo "</tr>";
			}
			?>

			</table> <!-- TABLE 3 end -->
		</td>
		</tr>
</table> <!-- TABLE 1 end -->

</body>
</html>

