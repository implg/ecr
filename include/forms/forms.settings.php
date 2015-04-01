<?php

class FormsSettings{
	protected $settings;
	protected $default_massages;
	protected $default_required_message;

	public function __construct(){
		$module_dir = '/include/forms';
		$this->default_required_message = 'Поля, отмеченные <span class="required">*</span> являются обязательными <br>для заполнения';
		$this->settings = Array(
			'template_dir' => $_SERVER['DOCUMENT_ROOT'].$module_dir.'/forms_templates/',
			'mail_template_dir' => $_SERVER['DOCUMENT_ROOT'].$module_dir.'/forms_templates/mail_templates/',
			'custom_actoions_dir' => $_SERVER['DOCUMENT_ROOT'].$module_dir.'/custom_actions/',
			'cache_dir' => $_SERVER['DOCUMENT_ROOT'].$module_dir.'/cache/',
			'action_url' => $module_dir.'/request_handler.php',
		);
		$this->default_massages = Array(
			'empty' => 'Поле не может быть пустым',
			'notmatch' => 'Поле заполнено некорректно',
			'small' => 'Слишком маленькое',
			'big' => 'Слишком большое',
			);
	}




	protected function CacheConfig($array = false){
		$file = $this->settings['cache_dir'].$array['form_id'].'.cache';
	    $str_value = serialize($array);
	    
	    $f = fopen($file, 'w');
	    fwrite($f, $str_value);
	    fclose($f);

	}
	protected function UnCacheConfig($formname){
		$file = $this->settings['cache_dir'].$formname.'.cache';
	    $file = file_get_contents($file);
	    $value = unserialize($file);
	    return $value;
	}
}
