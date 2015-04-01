<?php
	// Функция принтит переменную
	function preprint($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
	
	// Функция принтит переменную в скрытый блок, плюс добавляет ее в консоль в виде джейсон объекта.
	function preprintjs ($arr) {
		$time = rand(0, 1000);
		echo '<div class="hide console_output_'.$time.'">';
			print_r($arr);
		echo '</div><script>
		console.groupCollapsed("%c%s", "font-size: 10pt", "PHP Debug");
		console.log($(".console_output_'.$time.'").text());
		console.log("••••••••••••••••••••••••••••••••••••••••••••••••••");
		console.dirxml('.json_encode($arr).');
		console.count("Count");
		console.groupEnd();</script>';
	}
?>