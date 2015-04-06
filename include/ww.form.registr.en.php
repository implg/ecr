<?php

				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/forms/forms.php"); 
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/companies.php"); 
				$form = new Forms();
				$params_form =  array(
					'form_id' => 'registr_form_en',
					'form_title' => 'Разместить свою компанию',
					'template' => 'reg_form_en',
					'db_table' => 'members',
					'action_before' => 'send_email',
					'action' => 'write_db',
					'post_submit_message' => "<p class=\"align_center\">We've received your request for registration for the 11th Annual ECR Forum.<br>
The request will be processed during the next 5 working days.</p>",

					'fields' => array(
						'translate' => array('type' => 'radio', 'required' => true, 'value'=>'', 'values' => 
							array(
								1 => array('value' => 1, 'title' => 'Yes'),
								0 => array('value' => 0, 'title' => 'No'),
								),
							),

						'sess' => array('type' => 'checkbox', 'required' => true, 'values' => 
							array(
								1 => array('value' => 1, 'title' => '<span>ECR</span> Plenary Session'),
								2 => array('value' => 2, 'title' => '<span>Supply Chain</span> best practices'),
								3 => array('value' => 3, 'title' => 'Shrinkage Reduction'),
								4 => array('value' => 4, 'title' => 'On Shelf Availabillity'),
								5 => array('value' => 5, 'title' => 'Category Management'),
								6 => array('value' => 6, 'title' => 'Shopper Insights'),
								7 => array('value' => 7, 'title' => '<span>Omni Channel Marketing</span>'),
								8 => array('value' => 8, 'title' => 'Electronic Data Interchange (<span>EDI</span>)'),
								9 => array('value' => 9, 'title' => 'E-invoices'),
								10 => array('value' => 10, 'title' => 'Source e-documents'),
								11 => array('value' => 11, 'title' => 'Master Data Synchronisation'),
								11 => array('value' => 12, 'title' => 'ECR Best practices'),
								),

							),
						
						'company_in_forum' => array('type' => 'checkbox', 'title' => 'Is you company a member of ECR Russia?',  'required' => false),
						'member' => array('type' => 'select', 'title' => 'Select company', 'values' => $companies, 'attrs' => array('style' => 'display:none;'),),
						'language' => array('type' => 'hidden', 'value' => 'English'),
						'company' => array('type' => 'text', 'required' => false, 'attrs'=>array('placeholder' => 'Company', 'class' => 'latine') ),
						'site_company' => array('type' => 'text', 'required' => false,  'attrs'=>array('placeholder' => 'Company website') ),
						'last_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Last name', 'class' => 'latine') ),
						'first_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'First name', 'class' => 'latine')),
						
						'position' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Position')),
						'phone' => array('extends' => 'phone', 'attrs'=>array('placeholder' => 'Mobile phone number')),
						'email' => array('extends' => 'email', 'attrs'=>array('placeholder' => 'E-mail address')),
						'cupon' => array('extends' => 'name', 'required' => false,'attrs'=>array('placeholder' => 'Coupon (fill in to get the discount)')),
						'count' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'How many delegates from your company are going to take part in the Forum?')),
						'bik' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'IBAN code')),
						'bankname' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Bank name')),
						'ks' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'SWIFT No')),
						'rs' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Account No')),
						'urname' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Organisation full name')),


						'who' => array('type' => 'checkbox', 'required' => false, 'values' => 
							array(
								'1' => array('value' => 1, 'title' => 'I am a speaker at the Forum'),
								'2' => array('value' => 2, 'title' => 'My company is a media partner of the Forum'),
								'3' => array('value' => 3, 'title' => 'My company is a sponsor of the Forum'),
								'4' => array('value' => 4, 'title' => 'My company is taking part in the Market-place of the Forum'),
								
								),

							),
						


		
					),
					
			
					'email' => array(
							'extends' => true,
							'to' => array('wikedwolf@yandex.ru', 'abrunov@loyaltylabs.ru'), // or string or fieldKey 
							'from' => 'no-reply@'.$_SERVER['SERVER_NAME'],
							//'message' => 'text %NAME%',
							'message_template' => 'admin_mail',
							'subject' => 'ECR ФОРУМ 2015 - Регистрация',
						),
					'email_client' => array(
							'extends' => true,
							'to' => 'email', // or string or fieldKey 
							'from' => 'no-reply@'.$_SERVER['SERVER_NAME'],
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
		