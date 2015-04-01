<?
	
	
	$check = $this->fields['PROPERTY.CHECK']['value'];
	
	if ($check){
		$this->fields['PROPERTY.CHECK']['mail_value'] = "Да";
	}else{
		$this->fields['PROPERTY.CHECK']['mail_value'] = "Нет";
	}
	
	CModule::IncludeModule('iblock');
	
	
	
	
	if ($this->fields['PROPERTY.RECEPT']['value']){
		
		
		$this->fields['PROPERTY.SECTION'] = array(
			'type' => 'text',
			'value' => 'Рецепты',
		);
		$filter = array(
			'IBLOCK_ID' => 16,
			'ID' => $this->fields['PROPERTY.RECEPT']['value']
		);
		
		
		$element = CIBlockElement::GetList(
				array(),
				$filter,
				false,
				false,
				array('NAME')
			)
			->GetNext();

		$this->fields['PROPERTY.RECEPT']['mail_value'] = $element['NAME'];		

		
	}elseif($this->fields['PROPERTY.READY']['value']){
		
		
		$this->fields['PROPERTY.SECTION'] = array(
			'type' => 'text',
			'value' => 'Готовые решения',
		);
		$filter = array(
			'IBLOCK_ID' => 17,
			'ID' => $this->fields['PROPERTY.READY']['value']
		);
		
		$element = CIBlockElement::GetList(
				array(),
				$filter,
				false,
				false,
				array('NAME')
			)
			->GetNext();
		
		$this->fields['PROPERTY.READY']['mail_value'] = $element['NAME'];
		
		
	}
	
	
	$section_value = $this->fields['PROPERTY.READY']['mail_value'] ? $this->fields['PROPERTY.READY']['mail_value'] : $this->fields['PROPERTY.RECEPT']['mail_value'];
	
	$this->fields['PROPERTY.SECTION_VALUE'] = array(
			'type' => 'text',
			'value' => $section_value,
		);




?>