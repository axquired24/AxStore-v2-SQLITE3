<?php
	//inc_profileCustomer
	session_start();
	$CustomerID=$_SESSION['CustomerID'];
	$historySelect = 	"SELECT c.ContactName, c.CompanyName, c.Address ||', '|| c.City ||', '|| c.Country AS 'Address',
						   o.OrderID, o.OrderDate, o.ShippedDate, s.CompanyName AS 'ShipVia',
						   p.ProductName,
						   od.UnitPrice, od.Quantity, od.Discount,
						   od.UnitPrice*od.Quantity-(od.UnitPrice*od.Quantity*od.Discount) AS 'Payment' 
						FROM Customers c, Orders o, Products p, Order_Details od, Shippers s
						WHERE o.CustomerID = '$CustomerID'
						   AND o.CustomerID=c.CustomerID
						   AND od.OrderID=o.OrderID
						   AND p.ProductID=od.ProductID
						   AND s.ShipperID=o.ShipVia
						ORDER BY o.OrderDate DESC";

	$detailCompany =	"SELECT * FROM Customers WHERE CustomerID='$CustomerID'";

	$totalPayment  =	"SELECT SUM(od.UnitPrice*od.Quantity-(od.UnitPrice*od.Quantity*od.Discount)) AS 'Total Payment' 
						FROM Customers c, Orders o, Products p, Order_Details od
						WHERE o.CustomerID = 'PICCO'
						   AND o.CustomerID=c.CustomerID
						   AND od.OrderID=o.OrderID
						   AND p.ProductID=od.ProductID";
	
	$exeHistory = $db->query($historySelect);
	$exeDetail = $db->query($detailCompany);
	$exeTotalPay = $db->query($totalPayment);

	$rwDetail = $exeDetail->fetchArray(SQLITE3_ASSOC);
	$rwTotalPay = $exeTotalPay->fetchArray(SQLITE3_ASSOC);
?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h2 class="page-header"><span class="glyphicon glyphicon-record"></span> Your Profile: </h2>
			<div class="form-group">
				<label for="none"><span class="glyphicon glyphicon-briefcase"></span> Company Name: </label>
				<?php echo $rwDetail[CompanyName]; ?>
			</div>	
			<div class="form-group">
				<label for="none"><span class="glyphicon glyphicon-user"></span> Contact Name: </label>
				<?php echo $rwDetail[ContactName]; ?>
			</div>	
			<div class="form-group">
				<label for="none"><span class="glyphicon glyphicon-map-marker"></span> Address: </label>
				<?php echo $rwDetail[Address]; ?>, <?php echo $rwDetail[City]; ?>, <?php echo $rwDetail[Country]; ?>
			</div>	
			<div class="form-group">
				<label for="none"><span class="glyphicon glyphicon-earphone"></span> Phone: </label>
				<?php echo $rwDetail[Phone]; ?>
			</div>	
			<div class="form-group">
				<label for="none"><span class="glyphicon glyphicon-signal"></span> Total Payment 'til Today: </label>
				$ <?php echo $rwTotalPay['Total Payment']; ?>
			</div>															
		</div>				
		<div class="col-md-7">
			
		</div>			
	</div>
	<div class="row"><h2 class="page-header">History Order </h2></div>	
	<table class="table table-striped table-bordered">
		<thead>
			<th>Order ID</th>
			<th>Order Date</th>
			<th>Shipped Date</th>
			<th>Ship Via</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Discount</th>
			<th>Total Payment</th>
		</thead>
		<tbody>
			<?php
				WHILE($rwHistory = $exeHistory->fetchArray(SQLITE3_ASSOC)){
			?>
			<tr>
				<td><?php echo $rwHistory[OrderID]; ?></td>
				<td><?php echo $rwHistory[OrderDate]; ?></td>
				<td><?php echo $rwHistory[ShippedDate]; ?></td>
				<td><?php echo $rwHistory[ShipVia]; ?></td>
				<td><?php echo $rwHistory[ProductName]; ?></td>
				<td><?php echo $rwHistory[UnitPrice]; ?></td>
				<td><?php echo $rwHistory[Quantity]; ?></td>
				<td><?php echo $rwHistory[Discount]; ?></td>
				<td>$ <?php echo $rwHistory[Payment]; ?></td>
			</tr>
			<?php }; //END WHILE ?>
		</tbody>
	</table>
</div>