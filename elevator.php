<?php
$handle = fopen('php://stdin', 'r');
$ints = explode(' ', fgets($handle));
$f = (int)$ints[0];
$s = (int)$ints[1];
$g = (int)$ints[2];
$u = (int)$ints[3];
$d = (int)$ints[4];
$count = 0;

function up($s, $g, $u, $count){
	while($s < $g){
		$s += $u;
		if($s > $g){
			$s -= $u;
			break;
		}
		$count++;
		if($s == $g){
			echo $count;
			exit;
		}

		if($s > 1000000){
			echo 'use the stairs';
			exit;
		}
	}
}


function down($s, $g, $d, $count){
	while($s > $g){
		$s -= $d;
		if($s < $g){
			$s += $d;
			break;
		}
		$count++;
		if($s == $g){
			echo $count;
			exit;
		}
	}
}

if($g > $f || $g < 1 || $f > 1000000 || $f < 1 || $s < 1 || $s > $f){
	echo 'use stairs';
	exit;
}

if($s == $g){
	echo $count;
	exit;
}

if($s < $g){
	if($u < 1 || $u >= 1000000){
		echo 'use the stairs';
		exit;
	}
	up($s, $g, $u, $count);

	if($d < 1 || $d > 1000000){
		echo 'use the stairs';
		exit;
	}

	$s -= $d;
	$count++;
	up($s, $g, $u, $count);

}else if($s > $g){
	if($d < 1 || $d > 1000000){
		echo 'use the stairs';
		exit;
	}

	down($s, $g, $d, $count);
	if($u < 1 || $u >= 1000000){
		echo 'use the stairs';
		exit;
	}
	$s += $u;
	$count++;
    down($s, $g, $d, $count);
}

echo 'use the stairs';