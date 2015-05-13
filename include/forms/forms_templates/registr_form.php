      
      <form action="#action_url#" method="post" class="on_ajax">

        	#hiddens#
         
      <div class="form"> 
      
      	<div class="price nopadding">
        	<span class="dopinfo">
		        <div>
		          <p class="amount">#company_in_forum#</p>
		          <label for="company_in_forum"><h4>#company_in_forum_title#</h4></label>
		        </div>
	        </span>
        </div>
          #language#
          #company#
          #member#
          #site_company#
          #last_name#
          #first_name#
          #second_name#
          #position#
          #email#
          #phone#
          #cupon#
          #count#
          <h3 class="requisit">Реквизиты для выставления счета</h3>
          #bik#
          #bankname#
          #ks#
          #rs#
          #urname#

      
		</div>
      <div class="price">
<h3 id="sess">Какие сессии вы планируете посетить?</h3>
		#sess_iter#
        <div>
          <p class="amount">#sess#</p>
          <label for="sess#sess_value#"><h4>#sess_title#</h4></label>
        </div>
        #sess_enditer#


       


 <span class="dopinfo">

 <h3 id="translate">Потребуется ли вам перевод c английского на русский?</h3>
		#translate_iter#
        <div>
          <p class="amount">#translate#</p>
          <label for="translate#translate_value#"><h4>#translate_title#</h4></label>
        </div>
        #translate_enditer#

 <h3>Дополнительная информация:</h3>
 		#who_iter#
        <div>
          <p class="amount">#who#</p>
          <label for="who#who_value#"><h4>#who_title#</h4></label>
        </div>
        #who_enditer#
           
  </span>      

      </div>
      <!-- prices ends! -->

    
    
<div class="butsub">
 <button name="submit" type="submit" class="button">Зарегистрироваться</button>
</div>
        </form>
