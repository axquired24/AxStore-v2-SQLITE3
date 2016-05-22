<div class="container">
		<div class="row">
			<h2 class="page-header">Product Category: <small>Choose You Want!</small></h2>
			<?php
				$tampilCategory = "SELECT * FROM Categories";
				$exeA = $db->query($tampilCategory);

				WHILE($tampilCat=$exeA->fetchArray(SQLITE3_ASSOC)){

			?>
			<a href="./?page=inc_productlist&catID=<?php echo $tampilCat[CategoryID]; ?>" class="btn btn-primary"> 
			<span class="glyphicon glyphicon-leaf"></span> 
			<?php echo $tampilCat[CategoryName]; ?></a>
			<?php };?>
		</div>
</div>