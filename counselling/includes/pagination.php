<?php
	$current_page=$_POST['current_page'];
	$total_count;
	
	$max_count = $total_count-1;
	$var = $max_count%15;
	$max_count1 = $max_count - $var;	

	$max_page = $max_count1/15 +1;	
	if(isset($_POST["current_page"]))
	{
		$current_page = $_POST["current_page"];
	}
	else{
		$current_page = 1;
	}
?>
  <div class="box-footer clearfix">
		<ul class="pagination pagination-sm no-margin pull-right">
        	<?php 
			 $low_limit_value = ($current_page-1)*15;
			if($current_page<4)
			{

			}
			else if($current_page<5)
			{
			?>
				<li><a class="<?php if($current_page==1) echo 'active';?>" name="page1" id="<?php echo $current_page; ?>">1</a></li>
			<li><a>...</a></li>
			<?php
			}
			else{
			?>
				<li><a  class="<?php if($current_page==1) echo 'active';?>" name="page1" id="1" onclick="navi(this.id)">1</a></li>
				<li><a class="<?php if($current_page==2) echo 'active';?>" name="page1" id="2" onclick="navi(this.id)">2</a></li>
				<li><a>...</a></li>
			<?php	
			}
			?>
        <?php
		
		if($max_page>5)
		{
			$current_page1 = $current_page;
			if($current_page<3)
			{
				$current_page1 = 3;
			}
			if($current_page>$max_page-2)
			{
				$current_page1 = $max_page-2;
			}
        	for($i = $current_page1-2; $i <= $current_page1+2; $i++ )
			{
			echo '<li><a  name="page1" id="'.$i.'" onclick="navi(this.id)" class"';
			if($current_page==$i) echo 'active';
			echo '">'.$i.'</a></li> ';		
			}
		}
		else{
				for($i = 1; $i<$max_page+1; $i++){
					echo '<li><a  name="page1" id="'.$i.'" onclick="navi(this.id)" class="';
					if($current_page==$i) echo 'active';
					echo '">'.$i.'</a></li> ';		
				}
		}
		?>		
        <?php		
//       echo $current_page;
		if($max_page>5)
		{
	   if($current_page < $max_page-3 ){
		?>
	        <li><a>...</a></li>
	        <li><a class="<?php if($current_page==$max_page-1) echo 'active';?>" name="page1" id="<?php echo $max_page-1;?>"  onclick="navi(this.id)"><?php echo $max_page-1;?> </a></li>&nbsp;
	        <li><a class="<?php if($current_page==$max_page) echo 'active';?>" name="page1" id="<?php echo $max_page;?>"  onclick="navi(this.id)"><?php echo $max_page;?></a></li>
	        <?php
			}
			elseif($current_page <$max_page-2 ){
			?>
	        <li><a>...</a></li>
	        <li><a class="<?php if($current_page==$max_page) echo 'active';?>" name="page1" id="<?php echo $max_page;?>" onclick="navi(this.id)"><?php echo $max_page;?></a></li>
        <?php
		}
		}
		?>
		</ul>
</div>
<script>
	function navi(str)
		{
			document.getElementById("current_page").value=str;
			document.getElementById("task").value="";
			document.frm.submit();
			return true;
		}
</script>

