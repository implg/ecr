<?php
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//////###////###////###//////###////###////###////////#///#///#////
////////#////#/#///#///////////#////#/#///#//////////##///#///#////
/////////#/#////#/#/////////////#/#////#/#////////////#///#####////
//////////#//////#///////////////#//////#/////////////#///////#////
/////////###////###/////////////###////###////////////#///////#////
//||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| 
//                                                               //
//   Этот модуль предназначен для построения и работы с формами  //
//             в 1с-Битрикс и других системах.                   //
//                                                   WW 2014.    //
//   Version 2.0                                                            //
//   LAST UPD 4.04.15                                           //
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||


require($_SERVER['DOCUMENT_ROOT']."/include/forms/utils/sms/config.php");
require($_SERVER['DOCUMENT_ROOT']."/include/forms/utils/sms/transport.php");
require($_SERVER['DOCUMENT_ROOT']."/include/forms/utils/mail/phpmailer.php");

//require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");	


require($_SERVER['DOCUMENT_ROOT'].'/include/forms/forms.settings.php');


class Forms extends FormsSettings{
	private $fields;
	private $json;
	private $rules;
	private $template;  
	private $form_id;
	private $action;
	private $before;
	private $after;
	private $errors;
	private $iblock;
    private $post_submit_message_type;
	private $post_submit_message;
	private $form_title;
	private $required_message;







	public function Init($params){
		if ($params){
			$this->CacheConfig($params);
		}elseif($_REQUEST['sended']){
			$params = $this->UnCacheConfig($_REQUEST['sended']);
		}
		// $this->json = true;
		$this->json =  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
		$this->fields = $params['fields'];
		$this->template = $params['template'];
		$this->action = $params['action'];
		$this->before = $params['action_before'];
		$this->after = $params['action_after'];
		$this->email = $params['email'];
		$this->db_table = $params['db_table'];
		if($params['email_client']){
			$this->email_client = $params['email_client'];
		}
		$this->sms = $params['sms'];
		$this->iblock = $params['iblock'];
		$this->form_title = $params['form_title'];
		$this->required_message = $params['required_message'] ? $params['required_message'] : $this->default_required_message;
		$this->form_id = isset($params['form_id']) ? $params['form_id'] : 'default_single_form';
        $this->post_submit_message_type = $params['post_submit_message_type'] ? $params['post_submit_message_type'] : 'text';
		$this->post_submit_message = $params['post_submit_message'] ? $params['post_submit_message'] : '';
		$this->Extender();
		if (isset($_REQUEST['sended']) && ($_REQUEST['sended'] == $this->form_id)){
			// $this->json = $_REQUEST['json'] ? true : false;
			$this->PrepareData();
			$this->Validation();

			return $this->Action();
			
		}else{
			return $this->GenerateForm();
			
		}
	}




	public function Extender(){

		if (isset($this->fields['extends'])){
			$dform = $this->ExtendsForm($this->fields['extends']);
			unset($this->fields['extends']);
		}
		
		foreach ($this->fields as $id=>$field) {
			if (isset($field['extends'])){

				$df = $this->ExtendsField($field['extends']);

				$dform[$id] = $this->MergeFields($field, $df);
			}elseif (isset($dform) && !isset($dform[$id])){
				$dform[$id] = $field;
			}else{
				$dform[$id] = $this->MergeFields($field, $dform[$id]);
			}

		}
		$this->fields = $dform;		
		
	}




	/* 
		Эта функция будет генерить форму
	 */
	public function GenerateForm(){
		$template = file_get_contents($this->settings['template_dir'].$this->template.'.php');
		$template_as_string = preg_replace('/[\r\n]+(?![^(]*\))/', "", $template);
		$template_as_string = str_replace('  ', ' ', $template_as_string);
		
		foreach ($this->fields as $id=>$field){

			$exp = '%\#'.$id.'_iter\#(.*)\#'.$id.'_enditer\#%';
			
			preg_match($exp, $template_as_string, $regres);
			
			if (!empty($regres)){
				$res = '';		
				
				$iter = 0;
				$type = $field['type'];
				$value = $field['value'];
				foreach($field['values'] as $key=>$val){
					
					$itertpl = $regres[1];
					
					if (isset($val['value']) && isset($val['title'])){
						
						if (isset($field['extends'])){
			
							$df = $this->ExtendsField($field['extends']);
							$field = $this->MergeFields($field, $df);
						}
			
						//preprint($field);
						$error = isset($this->errors[$id]) ? $this->GetErrorMessage($field, $this->errors[$id]) : '';
						if ($value == $val['value']){
							if(!$field['attrs']) $field['attrs'] = array();
							$field['attrs']['checked'] = 'checked';
						}
						$field['value'] = $val['value']; 
						$field['type'] = $type;
						$field['name'] = $id.'[]';
						$itertpl = str_replace('#'.$id.'#', $this->GetFieldHtml($id.'[]', $field), $itertpl);
						
						$itertpl = str_replace('#'.$id.'_value#', $val['value'], $itertpl);
						$itertpl = str_replace('#'.$id.'_title#', $val['title'], $itertpl);
						$itertpl = str_replace('#'.$id.'_more#', $field['more'], $itertpl);
						
						$itertpl = str_replace('#'.$id.'_error#', $error, $itertpl);
						
					}
					
					//$itertpl = $regres[1];
					foreach ($this->fields as $nid=>$field){
						
						if (isset($field['extends'])){
			
							$df = $this->ExtendsField($field['extends']);
							$field = $this->MergeFields($field, $df);
						}
			
						//preprint($field);
						$error = isset($this->errors[$id]) ? $this->GetErrorMessage($field, $this->errors[$id]) : '';
			
			
						$itertpl = str_replace('#'.$nid.'_helptext#', $field['help_text'], $itertpl);
						if (isset($field['required']) && $field['required']){$field['title'] = '<span class="required">*</span> '.$field['title'];}
						if ($field['required'] && isset($field['attrs']['placeholder'])){$field['attrs']['placeholder'] = '* '.$field['attrs']['placeholder'];}
						$itertpl = str_replace('#'.$nid.'_title#', $field['title'], $itertpl);
						if($field['type'] == 'input_array' && isset($field['values'])){
							$value = $field['values'][$iter];
						}else{
							$value = $field['value'];
						}
						$itertpl = str_replace('#'.$nid.'_value#', $value, $itertpl);
						$itertpl = str_replace('#'.$nid.'_hide#', $field['hide'], $itertpl);
						$itertpl = str_replace('#'.$nid.'_more#', $field['more'], $itertpl);
						$itertpl = str_replace('#'.$nid.'#', $this->GetFieldHtml($nid, $field), $itertpl);
						$itertpl = str_replace('#'.$nid.'_error#', $error, $itertpl);
			
			
			
					}
					$res .= $itertpl;
					
					$iter++;
				}
				
				
			}
			
			$template_as_string = preg_replace($exp, $res, $template_as_string);
			
			 
		}
		$template = $template_as_string;
		if (isset($this->fields['extends'])){
			$dform = $this->ExtendsForm($this->fields['extends']);
			unset($this->fields['extends']);
		}
		foreach ($this->fields as $id=>$field) {
			if (!isset($dform[$id])){
				$dform[$id] = $field;
			}else{
				$dform[$id] = $this->MergeFields($field, $dform[$id]);
			}
		}
		$this->fields = $dform;
		
		
		
		$template = str_replace('#action_url#', $this->settings['action_url'], $template);
		$template = str_replace('#hiddens#', $this->GetHiddens(), $template);
		$template = str_replace('#form_title#', $this->form_title, $template);
		$template = str_replace('#required#', $this->required_message, $template);

		foreach ($this->fields as $id=>$field){
			if (isset($field['extends'])){

				$df = $this->ExtendsField($field['extends']);
				$field = $this->MergeFields($field, $df);
			}

			//preprint($field);
			$error = isset($this->errors[$id]) ? $this->GetErrorMessage($field, $this->errors[$id]) : '';


			$template = str_replace('#'.$id.'_helptext#', $field['help_text'], $template);
			if (isset($field['required']) && $field['required']){$field['title'] = '<span class="required">*</span> '.$field['title'];}
			if ($field['required'] && isset($field['attrs']['placeholder'])){$field['attrs']['placeholder'] = '* '.$field['attrs']['placeholder'];}
			$template = str_replace('#'.$id.'_title#', $field['title'], $template);
			$template = str_replace('#'.$id.'_value#', $field['value'], $template);
			$template = str_replace('#'.$id.'_hide#', $field['hide'], $template);
			$template = str_replace('#'.$id.'_more#', $field['more'], $template);
			$template = str_replace('#'.$id.'#', $this->GetFieldHtml($id, $field), $template);
			$template = str_replace('#'.$id.'_error#', $error, $template);



		}

		$template = preg_replace('#\#[a-zA-Z_0-9.]+\##', '<!-- Неизвестный тэг -->', $template);

		return preg_replace('(\n)', '', trim($template));
	}








	private function MergeFields($user_fields, $standart){
		foreach ($user_fields as $attr => $val){
			if ($attr == 'attrs'){
				foreach ($val as $key => $value) {
					$standart['attrs'][$key] = $value;
				}
			}else{
				$standart[$attr] = $val;
			}
		}

		return $standart;
	}



	/*
		Валидация формы
	*/

	private function Validation(){

		foreach ($this->fields as $key=>$field) {
			$res = true;
			//preprint($field);
			if (isset($field['required']) && $field['required'] && (!isset($field['value']) || empty($field['value']) )){
				$res = false;
				$this->errors[$key] = 'empty';
			}elseif (isset($field['rule'])){
				if (isset($field['value'])){


					switch ($field['rule']) {
						case 'email':
							
							$res = preg_match('#^(\d|[a-zA-Z0-9_-])+@(\d|[a-zA-Z0-9_-].+)\.([a-zA-Z]){2,4}$#', $field['value']);
							$res = $res == 1 ? true : false;
							if(!$field['required'] && empty($field['value'])){
								$res = true;
							}
							if (!$res) {
								$this->errors[$key] = 'notmatch';
							}

							break;
						case 'phone':
							$len_before = strlen($field['value']);
							$field['value'] = preg_replace('/[^0-9]/', '', $field['value']);
							$len_after = strlen($field['value']);
							$this->fields[$key]['value'] = str_replace(' )', ')', $this->fields[$key]['value']);
							$this->fields[$key]['value'] = str_replace('( ', '(', $this->fields[$key]['value']);
							if (($len_after == 0) && ($len_before > 0)){
								$this->errors[$key] = 'notmatch';
							}
							elseif (strlen($field['value'] ) > 5 && strlen($field['value'] ) < 13) {
								
							}elseif((strlen($field['value'] ) <= 5) && (strlen($field['value']) > 0)){
								$this->errors[$key] = 'small';
							}elseif(strlen($field['value']) > 0){
								$this->errors[$key] = 'big';
							}
							break;
						case 'password':
							if (strlen($field['value'] ) > 5 ) {
								$res = true;
							}elseif(strlen($field['value'] ) <= 5){
								$res = false;
								$this->errors[$key] = 'small';
							}
							break;
						case 'int':
							$len_before = strlen($field['value']);
							$field['value'] = preg_replace('/[^0-9]/', '', $field['value']);
							$len_after = strlen($field['value']);
							if ($len_after < $len_before) {
								$res = false;
								$this->errors[$key] = 'notmatch';
							}
						case 'antispam':
							$len = strlen($field['value']);
							if ($len) {
								$res = false;
								$this->errors[$key] = 'notmatch';
							}
						default:
							
							break;


					}
				}
			}
		}



		//preprint($this->errors);
		if (empty($this->errors)){
			return true;
		}else{
			return false;
		}
		

	}	





	/*
		Определяет действия после сабмита формы
	*/

	private function Action(){
		
		if ($this->before) {
			
		 	require($this->settings['custom_actoions_dir'].$this->before.'.php');
		}
		if (!isset($this->errors)){
			if ($this->email){
				$this->SendEmail();
			}
			if ($this->email_client){
				$this->SendEmail(true);
			}
			if ($this->sms){
				$this->SendSms();
			}

			if ($this->action){
				switch ($this->action) {
					case 'login':
						$this->login();

						break;
					case 'write_db':
						$this->writeInDb();
						break;
					case 'add_element':
						$this->AddElement();
						break;
					case 'add_disactive_element':
						$this->AddElement(true);
						break;
					default:
						# code...
						break;
				}
			}

		// if ($this->after){
		// 	require($this->settings['custom_actoions_dir'].$this->after.'.php');	
		// }
		}
		if ($this->json){
			
			if ($this->post_submit_message_type == 'popup'){
				$res = array(
				'success' => true,
				'message' => '',
				'response' =>array('popup' => $this->post_submit_message)
				);
			}else{
				$res = array(
				'success' => true,
				'message' => $this->post_submit_message,
				'response' => Array(
					//'redirect' => '/redirect_page_url/',
					)
				);
			}
			
			if ($this->errors){
				foreach ($this->errors as $key => $value) {
					$res['errors'][str_replace('.', '_', $key)] = $this->GetErrorMessage($this->fields[$key], $value);
				}
				$res['success'] = false;
			}
			//return "rendering JSON";
			$this->renderJSON($res);

		}else{
			if ($this->errors){
				return trim($this->GenerateForm());
			}
			
			LocalRedirect($_SERVER['HTTP_REFERER']);
			

		}

	}



	/*
		Отправка смс 
	*/

	private function SendSms(){
		$sms = $this->sms;
		if (sizeof($sms)) {
			$fields = $this->fields;
			foreach ($fields AS $id=>$field) {
				$sms['message'] = str_replace("%".$id."%", $field['value'], $sms['message']);
				
				if ($field['type'] == 'text' OR $field['type'] == 'textarea') {
					$sms['message'] = str_replace("%".$id."%", $field['value'], $sms['message']);
				}
				if ($field['type']  == 'radio' OR $field['type']  == 'select') {
					$sms['message'] = str_replace("%".$id."%", $field['values'][$field['value']]['title'], $sms['message']);
				}
				if ($field['type']  == 'checkbox') {
					$text = array();
					// foreach ($field['values'] AS $key => $value) {
					// 	if ($this->self[$id][$key]) {
					// 		$text[] = $field['values'][$key];
					// 	}
					// }
					
					// if ( sizeof($text) ) {
					// 	$sms['text'] = "(".str_replace("%".$id."%", implode(', ', $text), $sms['text']).")";
					// }
				}
				
				
				
			}
			$sms['message'] = str_replace('«', '"', $sms['message']);
			$sms['message'] = str_replace('»', '"', $sms['message']);
			if (strlen($sms['message']) > 300){
				$sms['message'] = substr($sms['message'], 0, 300);
			}
				
			$api = new Transport();
			$params = array(
				"text" => $sms['message'], 
				"action" => "send",
				"source" => $sms['source'],
	
			);  
			$phones = $sms['to'];
			//preprint($params);
			$send = $api->send($params,$phones);
		} 
	

	}



	/*
		!Отправка Email 
	*/

	private function SendEmail($client = false){
		if($client){
			$email = $this->email_client;
		}else{
			$email = $this->email;			
		}

			
		
		
		
		if (sizeof($email)) {
			$fields = $this->fields;
			if (!isset($email['message']) && isset($email['message_template'])){
				$email['message']  = file_get_contents($this->settings['mail_template_dir'].$email['message_template'].'.php');
			}
			foreach ($fields AS $id=>$field) {
				if ($field['type'] == 'text' OR $field['type'] == 'textarea' OR $field['type'] == 'hidden' OR $field['type'] == 'email' OR $field['type'] == 'phone' OR $field['type'] == 'input_array') {
					if(isset($field['mail_value'])){
						$val = $field['mail_value'];
					}else{
						$val = $field['value'] ? $field['value'] : 'Не указан';
					}
					
					$email['message'] = str_replace("%".$id."%", $val, $email['message']);
				}
				if ($field['type']  == 'radio' OR $field['type']  == 'select') {
					if(isset($field['mail_value'])){
						$val = $field['mail_value'];
					}else{
						$val = $field['values'][$field['value']]['title'] ? $field['values'][$field['value']]['title'] : 'Не указан';
					}
					$email['message'] = str_replace("%".$id."%", $val, $email['message']);
				}
				if ($field['type']  == 'checkbox') {
					$text = array();
					if(isset($field['mail_value'])){
						$val = $field['mail_value'];
					}else{
						$val = $field['value'] ? $field['value'] : 'Не указан';
						
					}
					$email['message'] = str_replace("%".$id."%", $val, $email['message']);
					// foreach ($field['values'] AS $key => $value) {
					// 	if ($this->self[$id][$key]) {
					// 		$text[] = $field['values'][$key];
					// 	}
					// }
					// $email['text'] = str_replace("%".$id."%", implode('<br>', $text), $email['text']);		
				}
			}
			
			$email['message'] = str_replace('%DOMAIN%', 'http://'.$_SERVER['SERVER_NAME'], $email['message']);
			$email['message'] = str_replace('«', '"', $email['message']);
			$email['message'] = str_replace('»', '"', $email['message']);			
			$email['message'] = mb_convert_encoding($email['message'], 'KOI8-R', 'UTF-8');
			
			
			if(is_string($email['to'])){
				if (preg_match('#^(\d|[a-zA-Z0-9_-])+@(\d|[a-zA-Z0-9_-].+)\.([a-zA-Z]){2,4}$#', $email['to'])){
					$emails = array($email['to']);
				}else{
					$emails = array($this->fields[$email['to']]['value']);
				}
			}else{
				$emails = array();
				foreach($email['to'] as $to){
					if (preg_match('#^(\d|[a-zA-Z0-9_-])+@(\d|[a-zA-Z0-9_-].+)\.([a-zA-Z]){2,4}$#', $to)){
						array_push($emails, $to);
					}else{
						$to = $this->fields[$to]['value'];
						array_push($emails, $to);
					}
				}
				
			}
			
			foreach ($emails AS $to) {
				//preprint($to);
				$mail = new PHPMailer(true);
				$mail->Subject = encodeSubject($email['subject']);
				$mail->AddAddress($to);
				$mail->From = $email['from'];
                $mail->FromName = isset($email['from_name']) ? mb_convert_encoding($email['from_name'], 'KOI8-R', 'UTF-8') : '';
				$mail->AddReplyTo($email['from'], $email['from_name']);
				$mail->Body  = $email['message'];
				$mail->AltBody = strip_tags($email['message']);
				
				//preprint($mail);
				 if ($email['embed']) {
				foreach ($email['embed'] AS $file_name) {
				 		if ($_FILES[$file_name]) {
				 			$mail->AddAttachment($_FILES[$file_name]['tmp_name'], $_FILES[$file_name]['name']);
				 		}
				 	}
				 }
				
				
				
				$mail->Send(); 
				$mail->ClearAttachments(); 
			}
			
		}
	}





	private function GetFieldHtml($name, $field){
		$origname = $name;
		$name = str_replace('.', '_', $name);
		
		switch ($field['type']) {
			case 'textarea':
				$res = '<textarea name="'.$name.'"';
				if (isset($field['attrs'] )){
					foreach ($field['attrs'] as $attr=>$value){
						$res .= $attr.'="'.$value.'" ';
					}
				}
				if ($field['required']){
					$res .= ' required ';
				}
				$res .= ">";
				if (isset($field['value'])){
					$res .= $field['value'];
				}

				$res .= '</textarea>';
				break;

			case 'select':
				$res = '<select name="'.$name.'"';
				if (isset($field['attrs'] )){
					foreach ($field['attrs'] as $attr=>$value){
						$res .= $attr.'="'.$value.'" ';
					}
				}
				$res .= ">";
				if (isset($field['values'])){
					foreach ($field['values'] as $key => $value) {
						if ($value['group']){
							$res .= '<optgroup label="'.$value['title'].'">';
							foreach ($value['group'] as $key => $value) {
								$res .= '<option value="'.$value['value'].'"';
								if (isset($this->fields[$origname]['value']) && $value['value'] == $this->fields[$origname]['value']){
									$res .= 'selected="selected"';
								}elseif($value['current'] && !isset($this->fields[$origname]['value'])){
									$res .= 'selected="selected"';
								}
								if(isset($value['attrs'])){
									foreach($value['attrs'] as $k=>$v){
										$res .= ' '.$k.'="'.$v.'"';
									}
								}
								$res .= '>';
								$res .= $value['title']; 
								$res .= "</option>";
							}
							$res .= "</optgroup>";
						}else{
							$res .= '<option value="'.$value['value'].'"';

							if (isset($this->fields[$origname]['value']) && $value['value'] == $this->fields[$origname]['value']){
								$res .= 'selected="selected"';
							}elseif($value['current'] && !isset($this->fields[$origname]['value'])){
								$res .= 'selected="selected"';
							}
							if(isset($value['attrs'])){
								foreach($value['attrs'] as $k=>$v){
									$res .= ' '.$k.'="'.$v.'"';
								}
							}
							
							$res .= '>';
							$res .= $value['title']; 
							$res .= "</option>";
						}
					}
				}

				$res .= '</select>';
				break;
                
            case 'radio_in_label':
				$res = '';
			
				
				if (isset($field['values'])){
					foreach ($field['values'] as $key => $value) {
					
						$res .= '<label><input type="'.$field['type'].'" name="'.$name.'" value="'.$value['value'].'"';

						if (isset($this->fields[$origname]['value']) && $value['value'] == $this->fields[$origname]['value']){
							$res .= 'checked="checked"';
						}elseif($value['current'] && !isset($this->fields[$origname]['value'])){
							$res .= 'checked="checked"';
						}
						if(isset($this->fields[$origname]['attrs'])){
							foreach($this->fields[$origname] as $k=>$v){
								$res .= ' '.$k.'="'.$v.'"';
							}
						}
						
						 
						$res .= "/><span></span>".$value['title']."</label>";
						
					}
				}

				
				break;
				
				
			case 'default_custom_select':
				$res = '<div class="select ';
				if (isset($field['container_class'])){
					$res .= $field['list_class'];
				}
				$res .= '"';
				if (isset($field['data-container'])){
					$res .= 'data-container="'.$field['data-container'].'" ';
				}
				if (isset($field['data-load'])){
					$res .= 'data-load="'.$field['data-load'].'"';
				}
				$res .= '><span></span><input type="text"  readonly ';
				if (isset($field['attrs'] )){
					foreach ($field['attrs'] as $attr=>$value){
						$res .= $attr.'="'.$value.'" ';
					}
				}
				if ($field['required']){
					$res .= ' required ';
				}
				$res .= '/>';
				$res .= '<input type="hidden" name="'.$name.'" />';
				$res .= '</div><div class="select_list ';
				if (isset($field['list_class'])){
					$res .= $field['list_class'];
				}
				$res .= '">';
				if (isset($field['values'])){
					foreach ($field['values'] as $key => $value) {
					
						$res .= '<p rel="'.$value['value'].'"';
						if (isset($this->fields[$name]['value']) && $value['value'] == $this->fields[$name]['value']){
							$res .= 'selected="selected"';
						}elseif($value['current'] && !isset($this->fields[$name]['value'])){
							$res .= 'selected="selected"';
						}
						$res .= '>';
						$res .= $value['title']; 
						$res .= "</p>";
					
					}
				}

				$res .= '</div>';
				break;
			
			case 'check_box_array':
				$res = '';
				$type = $field['hidden'] ? 'hidden' : 'text';
				if($field['values']){
					
					foreach($field['values'] as $val){
						$res .= '<input type="'.$type.'" name="'.$name.'[]" ';
						
						if (isset($field['attrs'] )){
							foreach ($field['attrs'] as $attr=>$value){
								$res .= $attr.'="'.$value.'" ';
							}
						}
		
						if ($field['required']){
							$res .= ' required ';
						}
						
						$res .= 'value="'.$val.'"';
						
						$res .= ' />';
					} 
				}else{
					$res = '<input type="'.$type.'" name="'.$name.'[]" ';
					
					if (isset($field['attrs'] )){
						foreach ($field['attrs'] as $attr=>$value){
							$res .= $attr.'="'.$value.'" ';
						}
					}
	
					if ($field['required']){
						$res .= ' required ';
					}
					if (isset($field['value'])){
						$res .= 'value="'.$field['value'].'"';
					}
					$res .= ' />';
				}
				break;

			case 'input_array':
				$res = '';
				$type = $field['hidden'] ? 'hidden' : 'text';
				if($field['values']){
					
					foreach($field['values'] as $val){
						$res .= '<input type="'.$type.'" name="'.$name.'[]" ';
						
						if (isset($field['attrs'] )){
							foreach ($field['attrs'] as $attr=>$value){
								$res .= $attr.'="'.$value.'" ';
							}
						}
		
						if ($field['required']){
							$res .= ' required ';
						}
						
						$res .= 'value="'.$val.'"';
						
						$res .= ' />';
					} 
				}else{
					$res = '<input type="'.$type.'" name="'.$name.'[]" ';
					
					if (isset($field['attrs'] )){
						foreach ($field['attrs'] as $attr=>$value){
							$res .= $attr.'="'.$value.'" ';
						}
					}
	
					if ($field['required']){
						$res .= ' required ';
					}
					if (isset($field['value'])){
						$res .= 'value="'.$field['value'].'"';
					}
					$res .= ' />';
				}
				break;						
			default:
				$res = '<input type="'.$field['type'].'" name="'.$name.'" ';
				
				if (isset($field['attrs'] )){
					foreach ($field['attrs'] as $attr=>$value){
						$res .= $attr.'="'.$value.'" ';
					}
				}

				if ($field['required']){
					$res .= ' required ';
				}
				if (isset($field['value'])){
					$res .= 'value="'.$field['value'].'"';
				}
				$res .= ' />';
				break;
		}


		return $res;
	}


	private function ExtendsField($id){
		switch ($id) {
			case 'name':
				$res = array(
					'title' => 'ФИО',
					'help_text' => 'Вводите настоящие Имя, Фамилию и Отчество',
					'type' => 'text',
					'required' => true,
					'rule' => 'noemty',
					'attrs' => Array(
						'placeholder'=> 'Иванов Иван Иванович',
						),
				);
				break;

			case 'email':
				$res = array(
					'title' => 'Email',
					'help_text' => 'Вводите настоящий Email',
					'type' => 'text',
					'required' => true,
					'rule' => 'email',
					'attrs' => Array(
						'placeholder'=> 'Введите ваш адрес электронной почты',
						),
				);
				break;

			case 'password':
				$res = array(
					'title' => 'Пароль',
					'help_text' => 'Пароль должен состоять из ...',
					'type' => 'Password',
					'rule' => 'password',
					'required' => true,

					
				);
				break;

			case 'login':
				$res = array(
					'title' => 'Логин',
					'help_text' => 'Email или телефон',
					'type' => 'text',
					'rule' => 'login',
					'required' => true,
					'attrs' => Array(
						'placeholder'=> 'Email или Телефон',
						),
				);
				break;

			case 'text':
				$res = array(
					'title' => 'Текст',
					'help_text' => 'Какое то текстовое поле',
					'type' => 'textarea',
					'rule' => 'login',
					'required' => true,
					'attrs' => Array(
						'placeholder'=> 'Введите текст сообщения',
						),
				);
				break;
			case 'phone':
				$res = array(
					'title' => 'Телефон',
					'help_text' => '79999999999, 777777',
					'type' => 'text',
					'rule' => 'phone',
					'required' => true,
					'attrs' => Array(
						'placeholder'=> 'Мой телефон',
						),
				);
				break;
			case 'file':
				$res = array(
					'title' => 'Файл',
					'type' => 'file',
				);
				break;
			case 'hidden':
				$res = array(
			
					'type' => 'hidden',
				);
				break;
			case 'antispam':
				$res = array(
					'title' => 'Имя',
					'type' => 'text',
					'rule' => 'antispam',
					'attrs' => array(
						'style' => 'display:none',
					)
				);
				break;
			
			default:
				# code...
				break;
		}

		return $res;
	}


	private function ExtendsForm($form){
		switch ($form) {
			case 'login':

			$res = array(
					'login' => array('extends'=>'login'),
					'password' => array('extends'=>'password'),
				);
				break;

			case 'signup':
				$res = array(
					'name' => array('extends'=>'name'),
					'login' => array('extends'=>'login'),
					'password' => array('extends'=>'password'),
					'secpassword' => array('extends'=>'password',
						'title' => 'Подтвердите пароль',
						'help_text' => '', 
						),
				);
				break;



			default:
				# code...
				break;
		}
		return $res;

	}


	private function GetErrorMessage($field, $error){
		
		if (isset($field['custom_messages']) && isset($field['custom_messages'][$error])){
			$res = $field['custom_messages'][$error];
		}else{
			$res = $this->default_massages[$error];
		}
		
		return $res;
	}

	private function GetHiddens(){
		$res = '<input type="hidden" name="sended" value="'.$this->form_id.'">';
		return $res;
	}









	private function PrepareData(){
		
		if ($this->data){
			$data = $this->data;
		}else{
			$data = $_REQUEST;
		}
		

		foreach ($this->fields as $key => $value) {
			if($value['type'] == 'input_array'){
				$this->fields[$key]['values'] = $data[str_replace('.', '_', $key)];
			}else{
				$this->fields[$key]['value'] = $data[str_replace('.', '_', $key)];	
			}
			

		}

	}

	private function renderJSON($object){

		header('Content-Type: application/json;  charset=utf-8');
		echo json_encode($object); die;
	}





	private function login(){
		
	}


	private function AddElement($disactive = false){
		CModule::IncludeModule('iblock');
		$el = new CIBlockElement;
		$prop = array();
		$arLoadProductArray = Array(
			  //"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
			  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
			  "IBLOCK_ID"      => $this->iblock,
			  "ACTIVE"         => "Y",            // активен
			  "ACTIVE_FROM" => date('d.m.Y'),
			  );
		if ($disactive){
			$arLoadProductArray['ACTIVE'] = 'N';
		}
		foreach ($this->fields as $id=>$field)
		{
			list($pr, $name) = explode('.', $id);
			if ($pr == 'PROPERTY'){
				$prop[$name] = $field['value'];
			}else{
				if($field['type'] == 'file'){
				
				//exit();
				
				//print_r($_FILES);
					
				
					$arLoadProductArray[$id] = $_FILES[$id];
				}else{
					$arLoadProductArray[$id] = $field['value'];
				}
				//exit();

			}
		}
		if (!isset($arLoadProductArray['CODE'])){
			$arLoadProductArray['CODE'] = $this->Translite($arLoadProductArray['NAME']);
		}
		$arLoadProductArray['PROPERTY_VALUES'] = $prop;
		$el->Add($arLoadProductArray);
	
		//preprint($arLoadProductArray);
	}


	private function writeInDb(){
		
		require_once($_SERVER['DOCUMENT_ROOT']."/include/forms/utils/mysql/query_builder.php");
		$mysql = new simple_query_builder();
		$mysql->devMode = 1;
		$table = $this->db_table;

		foreach ($this->fields as $id=>$field){
			if ($field['value'] && is_array($field['value'])){
				$values = array();
				foreach ($field['value'] as $val){
					$values[] = $val;
				}
				$field['value'] = serialize($values);
			}
			
			$mysql->add($id, $field['value']);
			
		}
		
		$res = $mysql->insert($table);
		
		
	}


	private function Translite($string){

	    $converter = array(

	        'а' => 'a',   'б' => 'b',   'в' => 'v',

	        'г' => 'g',   'д' => 'd',   'е' => 'e',

	        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

	        'и' => 'i',   'й' => 'y',   'к' => 'k',

	        'л' => 'l',   'м' => 'm',   'н' => 'n',

	        'о' => 'o',   'п' => 'p',   'р' => 'r',

	        'с' => 's',   'т' => 't',   'у' => 'u',

	        'ф' => 'f',   'х' => 'h',   'ц' => 'c',

	        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

	        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',

	        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

	        

	        'А' => 'A',   'Б' => 'B',   'В' => 'V',

	        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

	        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

	        'И' => 'I',   'Й' => 'Y',   'К' => 'K',

	        'Л' => 'L',   'М' => 'M',   'Н' => 'N',

	        'О' => 'O',   'П' => 'P',   'Р' => 'R',

	        'С' => 'S',   'Т' => 'T',   'У' => 'U',

	        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

	        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

	        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',

	        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

	    );

    	return strtr($string, $converter);

}
	
}

require($_SERVER['DOCUMENT_ROOT'].'/include/forms/custom_functions/default.php');
