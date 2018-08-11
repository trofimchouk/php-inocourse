<?php
function getColorByNumber($number) {
	$color = '';
	switch ($number % 3) {
		case 0: 
			$color = 'red';
			break;
		case 1: 
			$color = 'green';
			break;
		case 2: 
			$color = 'blue';
			break;		
	}
	return $color;
}

function renderItem($index, $value) {
	$itemIndexClass = 'item__index--' . getColorByNumber($index);
	
	$result = '<span class="item list__item"><span class="item__index ' . $itemIndexClass . '">' . $index . '</span>: '
		. '<span class="item__value">' . $value . '</span></span> ';
		
	return $result;
}

function renderListOddEven($list, $even) {
	$start = $even ? '0' : '1';
	
	$result = '<div class="list">';
	for ($i=$start; $i<count($list); $i+=2) {
		$result .= renderItem($i, $list[$i]);
		$result .= '; ';
	}
	$result .= '</div>';
	
	return $result;	
}

function getFibonacciList($last) {
	if ($last == 1) {
		return [1];
	}
	
	if ($last == 2) {
		return [1,1];
	}
	
	$list = [1,1];
	for ($i=2; $i < $last - 1; $i++) {
		$list[$i] = $list[$i-1] + $list[$i-2];;
	}
	
	return $list;
}

?>
<style>
.item__index {font-weight: 700;}
.item__index--red {color: red;}
.item__index--green {color: green;}
.item__index--blue {color: blue;}
</style>
<?php
$list = getFibonacciList(20);
echo renderListOddEven($list, false);
echo renderListOddEven($list, true);
?>
