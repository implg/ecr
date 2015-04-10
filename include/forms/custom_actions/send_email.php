<?php
ini_set("display_errors", 0); 
	$sess = '';
	foreach ($this->fields['sess']['value'] as $val){
		if(isset($this->fields['sess']['values'][$val])){
			$sess .= $this->fields['sess']['values'][$val]['title'].'<br>';
		}
	}
	$this->fields['sess']['mail_value'] = $sess;

	$who = '';
	foreach ($this->fields['who']['value'] as $val){
		if(isset($this->fields['who']['values'][$val])){
			$who .= $this->fields['who']['values'][$val]['title'].'<br>';
		}
	}
	$this->fields['who']['mail_value'] = $who;
	
	$this->fields['translate']['mail_value'] = $this->fields['translate']['values'][$this->fields['translate']['value'][0]]['title'];
	$this->fields['translate']['value'] = $this->fields['translate']['values'][$this->fields['translate']['value'][0]]['value'];
	
	$company = '';
	if ($this->fields['company']['value']){
		$company = $this->fields['company']['value'];
	}else{
		$company = $this->fields['member']['values'][$this->fields['member']['value']]['title'];
	}
	$this->fields['company']['value'] = $company;
	if ($this->fields['member']['value']  && $this->fields['member']['value'] == $company){
		$this->email = false;
	}