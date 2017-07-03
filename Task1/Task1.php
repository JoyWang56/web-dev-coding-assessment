<!DOCTYPE html>
<?php
date_default_timezone_set('US/Eastern');
//Today
$currentday=date('j',time());
$currentmonth=date('n',time());
$currentyear = date('Y', time());
$currentdate=date('l',time());
// print "Today:".$currentday."/".$currentmonth."/".$currentyear." ".$currentdate."<br>";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task1</title>
    <meta name="author" content="Joy">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
        	background-color:#F0FFFF;
        }
        #calendar{
        	/*width:50%;*/
            border: 2px solid black;
            
        }
        table,th,td{
       	  text-align: center;
          border: 1px solid black;
       	  /*font:16px;*/
       	  
        }
        #today{
        	background-color:#9ACD32;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12" style="padding-left:40%">
			<h1 > 
				Calendar 
			</h1>
			<h4 style="margin-left:-5%">Today: <?php echo $currentmonth?>/<?php echo $currentday?>/<?php echo $currentyear?>  Have a Nice Day !</h4>
		</div>
	<div class="row">
        <div class="col-md-2">
        </div>
		<div class="col-md-8">
			<table class="table table-responsive" id="calendar">
			    <tr>
			        <th>Sunday</th>
			        <th>Monday</th>
			        <th>Tuesday</th>
			        <th >Wednesday</th>
			        <th>Thursday</th>
			        <th>Friday</th>
			        <th>Saturday</th>
			    </tr>
			    <?php 
			        
                    // count days in one month
                    $daysinmonth[30]=[4,6,9,11];
                    $daysinmonth[31]=[1,3,5,7,8,10,12];
                    if($currentyear%4=="0" AND $currentmonth=="2"){
                	    $totaldays=29;
                    }else{
                	    for ($i=30; $i<32; $i++){
                	        for ($j=0; $j<count($daysinmonth[$i]);$j++){
                		        if ($currentmonth==$daysinmonth[$i][$j]){
                			        $totaldays=$i;
                		        } 
                	        }
                        }
                    }
                    // print $totaldays."<br>";
                    //position
                    $firstday=mktime(0,0,0,$currentmonth,1,$currentyear);
                    // $dayinweek=date('l',$firstday);
                    $position1=date('N',$firstday); 
                    //position in calendar
                    $daynum=1;
                    $lastday=mktime(0,0,0,$currentmonth,$totaldays,$currentyear);
                    $position2=date('N',$lastday);
                    // print $position2;
                    ?>
                    <tr>
                    <?php
                    // blank days at the beginning
                    for ($blanknum=0; $blanknum<$position1; $blanknum++){
                    	echo "<td></td>";
                    }

                    // valid days
                    while ($daynum<$totaldays+1){
                    	// print $daynum;
                    	$day=mktime(0,0,0,$currentmonth,$daynum,$currentyear);
                    	$dayincalendar=date('j',$day);
                    	$position=date('N',$day)+1; 
                    	// print $daynum."=>".$dayincalendar."=>".$position."<br>";
                    	$pos=($position%7)+1;
                    	if($dayincalendar==$currentday){
                    		?>
                    		<td id="today"><?php echo $dayincalendar?></td>
                    	<?php
                    	}else{
                    	?>
                    	<td><?php echo $dayincalendar?></td>
                    <?php
                        }
                    	$daynum++;                        
                        if($pos==1){
                        	echo "</tr><tr>";
                        }

                    }
                    // blank days in the end
                    for ($blanknum2=6;$blanknum2>$position2;$blanknum2--){
                    	echo "<td></td>";
                    }

			    ?>
			    </tr>

			</table>
		</div>
		<div class="col-md-2">
        </div>
	</div>

    </div>
  </body>
</html>