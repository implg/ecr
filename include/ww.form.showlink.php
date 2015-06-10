<?php

				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/forms/forms.php"); 
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/companies.php"); 
				$form = new Forms();
				$params_form =  array(
					'form_id' => 'showlink_form_ru',
					'form_title' => 'Получить ссылки на материалы',
					'template' => 'showlink_form',
					'db_table' => 'showlink',
					'post_submit_message' => '<p class="align_center">На указанный вами email было отправлено письмо с паролем</p>',
					'action_before' => 'send_email_showlink',
					'action' => 'write_db',
					'fields' => array(
						
						'name' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Имя')),
						'surname' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Фамилия')),
						'company' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Компания')),
						'site_company' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Сайт компании')),
						'position' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Должность')),
						'email' => array('extends' => 'email', 'required' => true, 'attrs' => array('placeholder' => 'Email')),
						'phone' => array('extends' => 'phone', 'required' => true, 'attrs' => array('placeholder' => 'Телефон')),
						'password' => array('type' => 'hidden', 'required' => false, ),


						
						


		
					),
					
			
					'email' => array(
							'extends' => true,
							'to' => array('wikedwolf@yandex.ru', 'abrunov@loyaltylabs.ru', 'elena.tkachenko@ecr-rus.ru
', 'tatiana.zemskova@ecr-rus.ru'), // or string or fieldKey 
							'from' => 'no-reply@ecr-forum.com',
							//'message' => 'text %NAME%',
							'message_template' => 'admin_mail',
							'subject' => 'ECR ФОРУМ 2015 - Регистрация',
						),
					'email_client' => array(
							'extends' => true,
							'to' => 'email', // or string or fieldKey 
							'from' => 'no-reply@ecr-forum.com',
							//'message' => 'text %NAME%',
							'message_template' => 'client_mail',
							'subject' => 'ECR ФОРУМ 2015 - Вы заполнили форму регистрации',
						),
					// 'sms' => array(
					// 		'to' => array('89236388381'), // or fieldKey 
					// 		'source' => 'site.ru',
					// 		'message' => 'text %NAME%',
					// 	),
			 		);	
			 		
		
				 echo $form->Init($params_form);
