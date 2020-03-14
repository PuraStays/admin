 <div class="box-body">
	<?php
		if($message_danger!="")
		{
	?>
		  <div class="alert alert-danger alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
		    <?= $message_danger; ?>
		  </div>
	<?php
		}
	?>
	<?php
		if($message_info!="")
		{
	?>
		  <div class="alert alert-info alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-info"></i> Alert!</h4>
		    <?= $message_info; ?>
		  </div>
	<?php
		}
	?>
	
	<?php
		if($message_warning!="")
		{
	?>
		  <div class="alert alert-warning alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
		    <?= $message_warning; ?>
		  </div>
	<?php
		}
	?>
	
	<?php
		if($message_success!="")
		{
	?>
		  <div class="alert alert-success alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
		    <?= $message_success; ?>
		  </div>
	<?php
		}
	?>
</div>