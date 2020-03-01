<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">ID</th>
									<th class="cell100 column2">Amount</th>
									<th class="cell100 column3">Date</th>
									<th class="cell100 column4">Category</th>
									<th class="cell100 column5">Method</th>
									<th class="cell100 column6">Type</th>
									<th class="cell100 column7"></th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
									<?php
										require 'connection.php';

																				
											 $query = "SELECT transactions.idTransaction, transactions.transactionAmount,transactions.transactionDate, categories.category, payments.paymentMethod, accounting.accountingType FROM `accounting`, categories, payments, transactions WHERE transactions.idCategory=categories.idCategory AND transactions.idPayment=payments.idPayment AND categories.idAccounting=accounting.idAccounting ORDER by transactions.idTransaction";
											if ($result = $mysql->query($query)) {
											    while ($row = $result->fetch_assoc()) {
											         echo '<tr class="row100 body"> 
											                  <td class="cell100 column1">'.$row["idTransaction"].'</td> 
											                  
											                  <td class="cell100 column2">'.$row["transactionAmount"].'</td> 
											                  <td class="cell100 column3">'.$row["transactionDate"].'</td> 
											                  <td class="cell100 column4">'.$row["category"].'</td> 
											                  <td class="cell100 column5">'.$row["paymentMethod"].'</td>
											                  <td class="cell100 column6">'.$row["accountingType"].'</td>
											                  <td class="cell100 column7"><a href="delete.php?id=' . $row["idTransaction"] . '">Delete</a></td>
											              </tr>';
											    }
											    echo "</tbody>";
											    echo "</table>";

											    $result->free();
											} 
											    ?>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>