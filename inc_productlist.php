<?php 
	$categoryGet=$_GET[catID];
	$exeB = $db->query("SELECT CategoryName from Categories WHERE CategoryID='$categoryGet'");	
	WHILE($rwCatName=$exeB->fetchArray(SQLITE3_ASSOC)){
 ?>
<div class="container">
	<div class="row"><h2 class="page-header">
	<a href="./"> <span class="glyphicon glyphicon-chevron-left"></span></a> 
	<?php echo $rwCatName[CategoryName]; }//END WHILE?></h2></div>
		<div class="row">
			<?php 				
				$tampilProductCat= "SELECT * FROM Products WHERE CategoryID='$categoryGet'";
				$exeC= $db->query($tampilProductCat);
				$i=0;
				WHILE($rwTampilProduct=$exeC->fetchArray(SQLITE3_ASSOC)){				
					if($i%3== 0){
						echo"</div><br><div class='row'>";
					} //end if
				?>				
					<div align="center" class="col-md-4">
						<h1><span class="glyphicon glyphicon-gift"></span></h1>
						<h5><?php echo $rwTampilProduct[ProductName]; ?></h5>
						<div class="btn-group">		
							<button class="btn btn-default">$<?php echo $rwTampilProduct[UnitPrice]; ?></button>	
							<a href="#" class="btn btn-primary">Buy This</a>
						</div>
					</div>						
			<?php $i++; }; // end while; ?>					
		</div>							
	</div>
</div>