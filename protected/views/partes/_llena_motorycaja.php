<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/_div.css"); ?>


    <div CLASS="ROW">
			
				<?php echo $form->labelEx($model,'m_rpm'); ?>
			
			
				<?php echo $form->textField($model,'m_rpm',array('size'=>4)); ?>
				<?php echo $form->error($model,'m_rpm'); ?>
			
	 </div>
	 
	<div CLASS="ROW">
	   
		<?php echo $form->labelEx($model,'m_velocidad'); ?>
		
		
		<?php echo $form->textField($model,'m_velocidad',array('size'=>3)); ?>
		<?php echo $form->error($model,'m_velocidad'); ?>
		 
  </div>

		
		
		 <div CLASS="ROW">
				<?php echo $form->labelEx($model,'m_tempagua'); ?>
			
				<?php echo $form->textField($model,'m_tempagua',array('size'=>3)); ?>
				<?php echo $form->error($model,'m_tempagua'); ?>
				
		</div>
		
		
		
		
		 <div CLASS="ROW">
				
					<?php echo $form->labelEx($model,'m_presionaceite'); ?>
				
					<?php echo $form->textField($model,'m_presionaceite'); ?>
					<?php echo $form->error($model,'m_presionaceite'); ?>
				
		</div>
		
		
		
		 <div CLASS="ROW">
						
						<?php echo $form->labelEx($model,'m_tempaceite'); ?>
						
						<?php echo $form->textField($model,'m_tempaceite'); ?>
						<?php echo $form->error($model,'m_tempaceite'); ?>
						
		</div>
	
	    <div CLASS="ROW">		
				
				<?php echo $form->labelEx($model,'m_difpaceite'); ?>
				
				<?php echo $form->textField($model,'m_difpaceite'); ?>
				<?php echo $form->error($model,'m_difpaceite'); ?>
				
		</div>
		
		
		
		
		 <div CLASS="ROW">		 
				
					<?php echo $form->labelEx($model,'m_presionpetroleo'); ?>
				
					<?php echo $form->textField($model,'m_presionpetroleo'); ?>
					<?php echo $form->error($model,'m_presionpetroleo'); ?>
				
		</div>
		
		
		
		
		 <div CLASS="ROW">
				
					<?php echo $form->labelEx($model,'m_difpfpetroleo'); ?>
				
					<?php echo $form->textField($model,'m_difpfpetroleo'); ?>
					<?php echo $form->error($model,'m_difpfpetroleo'); ?>
				
		</div>
		
		
		 <div CLASS="ROW">
				
					<?php echo $form->labelEx($model,'m_restfairebr'); ?>
				
					<?php echo $form->textField($model,'m_restfairebr'); ?>
					<?php echo $form->error($model,'m_restfairebr'); ?>
				
		</div>
		
		
		 <div CLASS="ROW">
				
						<?php echo $form->labelEx($model,'m_restfaireer'); ?>
				
						<?php echo $form->textField($model,'m_restfaireer'); ?>
						<?php echo $form->error($model,'m_restfaireer'); ?>
				
		</div>

		
		
		
		
		
		<div CLASS="ROW">		
					
						<?php echo $form->labelEx($model,'m_taireadm'); ?>
					
							<?php echo $form->textField($model,'m_taireadm'); ?>
							<?php echo $form->error($model,'m_taireadm'); ?>
					
		</div>
		
		
		
		
		 <div CLASS="ROW">
					
						<?php echo $form->labelEx($model,'m_tgasesturbo'); ?>
					
						<?php echo $form->textField($model,'m_tgasesturbo'); ?>
						<?php echo $form->error($model,'m_tgasesturbo'); ?>
					
		</div>
		
		
		
		
		 <div CLASS="ROW">
					
						<?php echo $form->labelEx($model,'m_tgases1y2'); ?>
					
						<?php echo $form->textField($model,'m_tgases1y2'); ?>
						<?php echo $form->error($model,'m_tgases1y2'); ?>
					
		</div>
		
		
		
		 <div CLASS="ROW">
					
							<?php echo $form->labelEx($model,'m_tgases3y4'); ?>
					
							<?php echo $form->textField($model,'m_tgases3y4'); ?>
							<?php echo $form->error($model,'m_tgases3y4'); ?>
					
		</div>
		
		
		
		 <div CLASS="ROW">
					
							<?php echo $form->labelEx($model,'m_tgases5y6'); ?>
						
							<?php echo $form->textField($model,'m_tgases5y6'); ?>
							<?php echo $form->error($model,'m_tgases5y6'); ?>
					
		</div>
		

	   <div CLASS="ROW">
					
								<?php echo $form->labelEx($model,'m_tgases7y8'); ?>
					
								<?php echo $form->textField($model,'m_tgases7y8'); ?>
								<?php echo $form->error($model,'m_tgases7y8'); ?>
					
		</div>
		
		
		
		 <div CLASS="ROW">
					
						<?php echo $form->labelEx($model,'m_tgases9y10'); ?>
					
						<?php echo $form->textField($model,'m_tgases9y10'); ?>
						<?php echo $form->error($model,'m_tgases9y10'); ?>
					
		</div>
		
		
		 <div CLASS="ROW">
					
							<?php echo $form->labelEx($model,'m_tgases11y12'); ?>
				
							<?php echo $form->textField($model,'m_tgases11y12'); ?>
							<?php echo $form->error($model,'m_tgases11y12'); ?>
					
		</div>
		
		

		 <div CLASS="ROW">
					
							<?php echo $form->labelEx($model,'m_tgases13y14'); ?>
					
							<?php echo $form->textField($model,'m_tgases13y14'); ?>
							<?php echo $form->error($model,'m_tgases13y14'); ?>
						
		</div>
		
		
		 <div CLASS="ROW">
					
						<?php echo $form->labelEx($model,'m_tgases15y16'); ?>
					
							<?php echo $form->textField($model,'m_tgases15y16'); ?>
						<?php echo $form->error($model,'m_tgases15y16'); ?>
				
		</div>
		
		
		
		 <div CLASS="ROW">		 	 
						
								<?php echo $form->labelEx($model,'caja_taceite'); ?>
						
								<?php echo $form->textField($model,'caja_taceite'); ?>
								<?php echo $form->error($model,'caja_taceite'); ?>
						
		</div>
		
		
		<div CLASS="ROW">
					
						<?php echo $form->labelEx($model,'caja_paceite'); ?>
					
							<?php echo $form->textField($model,'caja_paceite'); ?>
							<?php echo $form->error($model,'caja_paceite'); ?>
					
		</div>
