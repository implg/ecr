<?php
error_reporting(E_ERROR); 
ini_set("display_errors", 1); 
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/forms/forms.php"); 
				$form = new Forms();
				$params_form =  array(
					'form_id' => 'registr_form_',
					'form_title' => 'Разместить свою компанию',
					'template' => 'registr_form',
					'post_submit_message' => '<p class="align_center">Спасибо! Ваша заявка отправлена! С Вами свяжутся для изменения данных.</p>',
					'fields' => array(
				

						'sess' => array('type' => 'checkbox', 'required' => false, 'values' => 
							array(
								1 => array('value' => 1, 'title' => '<span>ECR</span>  Форум'),
								2 => array('value' => 2, 'title' => 'Конференция <span>Retail Vision</span>'),
								3 => array('value' => 3, 'title' => 'Выставка <span>Retail World</span>'),
								4 => array('value' => 4, 'title' => 'Спортивный праздник'),
								5 => array('value' => 5, 'title' => '<span>VIP</span> – lounge'),
								6 => array('value' => 6, 'title' => 'Вечерний прием'),
								7 => array('value' => 7, 'title' => 'Инновационные ритейл-туры')
								),

							),
						'company' => array('type' => 'text', 'attrs'=>array('placeholder' => 'Компания') ),
						'site_company' => array('type' => 'text', 'attrs'=>array('placeholder' => 'Сайт компании') ),
						'last_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Фамилия') ),
						'first_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Имя')),
						'second_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Отчество')),
						'position' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Должность')),
						'phone' => array('extends' => 'phone', 'attrs'=>array('placeholder' => 'Мобильный телефон (необходим для получения смс с кодом регистрации)')),
						'email' => array('extends' => 'email', 'attrs'=>array('placeholder' => 'Email (для членов ECR - только корпоративный e-mail)')),
						'cupon' => array('extends' => 'name', 'required' => false,'attrs'=>array('placeholder' => 'Купон (введите кодовое слово для получения скидки)')),
						
						'who' => array('type' => 'checkbox', 'required' => false, 'values' => 
							array(
								'1' => array('value' => 1, 'title' => 'Я являюсь докладчиком Форума'),
								'2' => array('value' => 2, 'title' => 'Я представитель информационного партнера Форума'),
								'3' => array('value' => 3, 'title' => 'Я представитель компании-спонсора Форума'),
								'4' => array('value' => 4, 'title' => 'Моя компания — участник выставки'),
								'5' => array('value' => 5, 'title' => 'Мне требуется перевод c английского на русский'),
								),

							),
		


		
					),
					
			
					'email' => array(
							'to' => array('deliz@deliz.ru'), // or string or fieldKey 
							'from' => 'no-reply@'.$_SERVER['SERVER_NAME'],
							//'message' => 'text %NAME%',
							'message_template' => 'edit_profile_mail',
							'subject' => '«Deliz» - Заявка на изменения данных об организации',
						),
			
					// 'sms' => array(
					// 		'to' => array('89236388381'), // or fieldKey 
					// 		'source' => 'site.ru',
					// 		'message' => 'text %NAME%',
					// 	),
			 		);	
			 		
		
				 echo $form->Init($params_form);
		