<?php include "Include.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<title>Date</title>
</head>
<body onload="JavaScript:updateDays();">
			<div class="table">
				<table>
				<td>Year:
				<select id="dob_y" name="year" onchange="JavaScript:updateDays();">
				<?php
				$min_age = 0; 
				$max_age = 24;				  
				$start_year = date(Y) - $max_age;
				$end_year = date(Y) - $min_age;
				for ($year=$start_year; $year <= $end_year; $year++) {
				echo "\t<option value=\"$year\">$year</option>\n";}?>
				</select>
				</td>
				<td>Month:
				<select id="dob_m" name="month" onchange="JavaScript:updateDays();">
				<?php
				$info = cal_info(0);
				for ($m=1; $m<=count($info[months]); $m++) {
				echo "\t<option value=\"$m\">" . $info[months][$m] . "</option>\n";}?> 
				</select>
				</td>
				<td>Day:
					<span id="dob_d"></span>
				</td>
			</tr>
		</table>
	</div>     
    <br/><br/>
<script type="text/javascript" language="JavaScript" src="js/ajax.js"></script>
</body>
</html> 