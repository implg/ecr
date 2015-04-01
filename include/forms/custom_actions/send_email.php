<? 
	$windows_value = '';
	foreach($this->fields['window_width']['values'] as $key=>$val){
		$iter = $key+1;
		$width = $val;
		$height = $this->fields['window_height']['values'][$key];
		$price = $this->fields['window_price']['values'][$key];
		$windows_value .= "<p>$iter. Размеры: $width x $height<br> Цена: $price р.</p>";
	}
	$this->fields['window_width']['mail_value'] = $windows_value;
	

?>

