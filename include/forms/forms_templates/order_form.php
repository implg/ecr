<form action="#action_url#" method="post" class="clearfix on_ajax">
					#hiddens#
					#color#
					#uzor#
					#summ#
					<div class="order_form">
						<p class="cost">Итого: #summ_value# руб.</p>
						<p>#NAME_title#<br>#NAME#</p>
						<p>#PROPERTY_PHONE_title#<br>#PROPERTY_PHONE#</p>
						<p>#PROPERTY_EMAIL_title#<br>#PROPERTY_EMAIL#</p>
						<button class="uzor">Оформить заявку</button>
						
					</div>
					<div class="order_items">

							#window_height_iter#
							<div class="item">
								<input type="hidden" name="window_width[]" value="#window_width_value#">
								<input type="hidden" name="window_height[]" value="#window_height_value#">
								<input type="hidden" name="window_price[]" value="#window_price_value#">
								<div class="dimensions big">
									<p class="size_h"><span>#window_width_value# см</span></p>
									<p class="size_v"><span>#window_height_value# см</span></p>
									<div style="background-image: url(/img/uzor/uzor_#uzor_value#_#color_value#_big.png)"></div>
								</div>
								<div class="desc">
									<p class="name">Узор В - #uzor_value#</p>
									<p class="color"><span class="ral_#color_value#"></span>Цвет РАЛ #color_value#</p>
									<p class="price">Цена: <span>#window_price_value#</span> руб.</p>
	
									<br>
									<p class="button delete">Удалить</p>
								</div>
							</div>
							#window_height_enditer#

					</div>
					

			</form>