<?php

				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/forms/forms.php"); 
				require_once($_SERVER["DOCUMENT_ROOT"] . "/include/companies.php"); 
				$form = new Forms();
				$params_form =  array(
					'form_id' => 'registr_form_ru',
					'form_title' => 'Разместить свою компанию',
					'template' => 'registr_form',
					'db_table' => 'members',
					'post_submit_message' => '<p class="align_center">Мы получили Вашу заявку на регистрацию на 11 Ежегодный ECR Форум.<br>
Заявка будет обработана в течение пяти рабочих дней</p>',
					'action_before' => 'send_email',
					'action' => 'write_db',
					'fields' => array(
						'translate' => array('type' => 'radio', 'required' => true, 'value'=>'', 'values' => 
							array(
								1 => array('value' => 1, 'title' => 'Да'),
								0 => array('value' => 0, 'title' => 'Нет'),
								),
							),


						'sess' => array('type' => 'checkbox', 'required' => true, 'values' => 
							array(
								1 => array('value' => 1, 'title' => 'Пленарная сессия ECR'),
								2 => array('value' => 2, 'title' => 'Лучшие практики Supply Chain'),
								3 => array('value' => 3, 'title' => 'Борьба с потерями'),
								4 => array('value' => 4, 'title' => 'Присутствие товара на полке'),
								5 => array('value' => 5, 'title' => 'Категорийный менеджмент'),
								6 => array('value' => 6, 'title' => 'Изучение потребителя'),
								7 => array('value' => 7, 'title' => 'Omni Channel'),
								8 => array('value' => 8, 'title' => 'Электронный обмен данными (EDI)'),
								9 => array('value' => 9, 'title' => 'Электронные бухгалтерские документы'),
								10 => array('value' => 10, 'title' => 'Пленарная сессия с коммерческими директорами'),
								11 => array('value' => 11, 'title' => 'Лучшие практики ECR'),
								),

							),
						
						'company_in_forum' => array('type' => 'checkbox', 'title' => 'Ваша компания является членом ECR Russia',  'required' => false),
						'member' => array('type' => 'select', 'title' => 'Выберите компанию', 'values' => $companies, 'attrs' => array('style' => 'display:none;'),),
						'language' => array('type' => 'hidden', 'value' => 'Русский'),
						'company' => array('type' => 'text', 'required' => false, 'attrs'=>array('placeholder' => 'Компания', 'class' => 'latine') ),
						'site_company' => array('type' => 'text', 'required' => false,  'attrs'=>array('placeholder' => 'Сайт компании') ),
						'last_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Фамилия (латинскими буквами)', 'class' => 'latine') ),
						'first_name' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Имя (латинскими буквами)', 'class' => 'latine')),
						
						'position' => array('extends' => 'name', 'attrs'=>array('placeholder' => 'Должность')),
						'phone' => array('extends' => 'phone', 'attrs'=>array('placeholder' => 'Мобильный телефон (необходим для получения смс с кодом регистрации)')),
						'email' => array('extends' => 'email', 'attrs'=>array('placeholder' => 'Email (для членов ECR - только корпоративный e-mail)')),
						'cupon' => array('extends' => 'name', 'required' => false,'attrs'=>array('placeholder' => 'Купон (введите кодовое слово для получения скидки)')),
						'count' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Какое количество человек от вашей компании планирует принять участие в Форуме?')),
						'bik' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'БИК')),
						'bankname' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Наименование банка')),
						'ks' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Корреспондентский счёт')),
						'rs' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Расчетный счет')),
						'urname' => array('extends' => 'name', 'required' => false, 'attrs' => array('placeholder' => 'Юридическое название')),


						'who' => array('type' => 'checkbox', 'required' => false, 'values' => 
							array(
								'1' => array('value' => 1, 'title' => 'Я являюсь докладчиком Форума'),
								'2' => array('value' => 2, 'title' => 'Я представитель информационного партнера Форума'),
								'3' => array('value' => 3, 'title' => 'Я представитель компании-спонсора Форума'),
								'4' => array('value' => 4, 'title' => 'Моя компания — участник выставки'),
								
								),

							),
						


		
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
		