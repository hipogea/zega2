         <fieldset>
                <legend>Dest Op Gravadas </legend>  
                <div class="row">
                        <?php echo $form->labelEx($model,'expobaseimpgrav'); ?>
			<?php echo $form->textField($model,'expobaseimpgrav',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'expobaseimpgrav'); ?>
                </div>
           </fieldset>  
           <fieldset>  
            <legend> Dest Op Gravadas y No Gravadas </legend>  
                <div class="row">
                        <?php echo $form->labelEx($model,'expbaseimpnograv'); ?>
			<?php echo $form->textField($model,'expbaseimpnograv',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'expbaseimpnograv'); ?>
                </div>
            </fieldset>     
           
                
            <fieldset>
                <legend>Dest Op No grabadas</legend>  
               
                <div class="row">
                        <?php echo $form->labelEx($model,'baseimpnograv'); ?>
			<?php echo $form->textField($model,'baseimpnograv',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'baseimpnograv'); ?>
                </div>
                
           </fieldset>      
                 <div class="row">
                        <?php echo $form->labelEx($model,'otrostributos'); ?>
			<?php echo $form->textField($model,'otrostributos',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'otrostributos'); ?>
                </div>
               <div class="row">
                        <?php echo $form->labelEx($model,'numerodocnodomiciliado'); ?>
			<?php echo $form->textField($model,'numerodocnodomiciliado',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'numerodocnodomiciliado'); ?>
                </div>
              <fieldset>
               