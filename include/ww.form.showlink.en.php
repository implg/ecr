<?php

				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/forms/forms.php"); 
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/companies.php"); 
				$form = new Forms();
				$params_form =  array(
					'form_id' => 'showlink_form_en',
					'form_title' => 'Получить ссылки на материалы',
					'template' => 'showlink_form_en',
					'db_table' => 'showlink',
					'post_submit_message' => '<p class="align_center">Thank you for your request. You will receive the link to download the presentations on you e-mail</p>',
					'action_before' => 'send_email_showlink',
					'action' => 'write_db',
					'fields' => array(
						
						'name' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Name')),
						'surname' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Last name')),
						'company' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Company')),
						'site_company' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Site company')),
						'position' => array('extends' => 'name', 'required' => true, 'attrs' => array('placeholder' => 'Position')),
						'email' => array('extends' => 'email', 'required' => true, 'attrs' => array('placeholder' => 'Email')),
						'phone' => array('extends' => 'phone', 'required' => true, 'attrs' => array('placeholder' => 'Phone')),
						'password' => array('type' => 'hidden', 'required' => false, ),


						
						


		
					),
					
			
					'email' => array(
							'extends' => true,
							'to' => array('wikedwolf@yandex.ru'),// 'abrunov@loyaltylabs.ru'),// 'elena.tkachenko@ecr-rus.ru', 'tatiana.zemskova@ecr-rus.ru'), // or string or fieldKey 
							'from' => 'no-reply@ecr-forum.com',
							//'message' => 'text %NAME%',
							'message_template' => 'admin_showlink',
							'subject' => 'ECR ФОРУМ 2015 - запрошен пароль просмотра материалов',
						),
					'email_client' => array(
							'extends' => true,
							'to' => 'email', // or string or fieldKey 
							'from' => 'no-reply@ecr-forum.com',
							//'message' => 'text %NAME%',
							'message_template' => 'client_showlink',
							'subject' => 'ECR ФОРУМ 2015 - Вы запросили пароль просмотра материалов',
						),
					// 'sms' => array(
					// 		'to' => array('89236388381'), // or fieldKey 
					// 		'source' => 'site.ru',
					// 		'message' => 'text %NAME%',
					// 	),
			 		);	
			 		
		
				 echo $form->Init($params_form);
