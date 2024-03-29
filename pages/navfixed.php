<?php
require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a style="font-size: 20px" class="navbar-brand" href="home.php"><b>Ruffer Lumber and Construction Supply<b></a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right"> 
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
			<?php 
				
						if($session_admin_position == 'Admin'){
							?>	
				<li><a  href="#myModal" data-toggle="modal"><i class="fa fa-user fa-fw"></i> Add User</a>
				<?php } ?>
					<li><a href="Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					
					<?php 
				
						if($session_admin_position == 'Stock Administrator'){
							?>	
					<li>
						<a href="home.php"><i class="fa fa-home fa-fw"></i> Home</a>
					</li>
					<li>
						<a href="products.php"><i class="fa fa-table fa-fw "></i> Product</a>
					</li>
					<li>
						<a href="purchaseslist.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order List</a>
					</li>
					<li>
						<a href="orderpo.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order Form</a>
					</li>
					<li>
						<a href="supplier.php"><i class="fa fa-truck fa-fw"></i> Supplier</a>
					</li>
							<?php 
						} else if($session_admin_position == 'Admin Staff') {
							?>
					<li>
						<a href="home.php"><i class="fa fa-home fa-fw"></i> Home</a>
					</li>
					<li>
						<a href="products.php"><i class="fa fa-table fa-fw "></i> Product</a>
					</li>
					<li>
						<a href="customer.php"><i class="fa fa-user fa-fw"></i> Project / Client</a>
					</li>
					<li>
						<a href="purchaseslist.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order List</a>
					</li>
					<li>
						<a href="orderpo.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order Form</a>
					</li>
					<li>
						<a href="supplier.php"><i class="fa fa-truck fa-fw"></i> Supplier</a>
					</li>

					<li>
						<a rel="facebox" href="select_customer.php"><i class="fa fa-book fa-fw"></i> Client/Project Ledger</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-files-o fa-fw"></i> REPORTS<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="accountreceivables.php">Accounts Receivables Report</a>
							</li>
							<li>
								<a  href="account_payable.php"> Accounts Payables Report</a>
							</li>
							<li>
								<a  href="other_expenses_report.php"> Other Expenses Report</a>
							</li>
							<li>
								<a href="collection.php">Collection Report</a>
							</li>
							<li>
								<a href="salesreport.php">Sales Report</a>
							</li>
							<li>
								<a href="inventory.php">Inventory Report</a>
							</li>
							<li>
								<a  href="product_lose.php"> List of Product Expired</a>
							</li>
							<li>
								<a  href="returned.php"> Report of Returned Products</a>
							</li>
							<li>
								<a  href="search_customer.php"> Project Transaction Record</a>
							</li>
							<li>
								<a  href="search_employee.php"> Project Employee Salary</a>
							</li>
							<li>
								<a  href="cost_report.php"> Cost Report</a>
							</li>
						</ul>
					</li>
							<?php
						
						} else {
						?>
						<li>
						<a href="home.php"><i class="fa fa-home fa-fw"></i> Home</a>
					</li>
					<li>
						<a href="products.php"><i class="fa fa-table fa-fw "></i> Product</a>
					</li>
					<li>
						<a href="customer.php"><i class="fa fa-user fa-fw"></i> Project / Client</a>
					</li>
					<li>
						<a href="purchaseslist.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order List</a>
					</li>
					<li>
						<a href="orderpo.php"><i class="fa fa-list-alt fa-fw"></i> Purchase Order Form</a>
					</li>
					<li>
						<a href="supplier.php"><i class="fa fa-truck fa-fw"></i> Supplier</a>
					</li>

					<li>
						<a rel="facebox" href="select_customer.php"><i class="fa fa-book fa-fw"></i> Client/Project Ledger</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-files-o fa-fw"></i> REPORTS<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="accountreceivables.php">Accounts Receivables Report</a>
							</li>
							<li>
								<a  href="account_payable.php"> Accounts Payables Report</a>
							</li>
							<li>
								<a  href="other_expenses_report.php"> Other Expenses Report</a>
							</li>
							<li>
								<a href="collection.php">Collection Report</a>
							</li>
							<li>
								<a href="salesreport.php">Sales Report</a>
							</li>
							<li>
								<a href="inventory.php">Inventory Report</a>
							</li>
							<li>
								<a  href="product_lose.php"> List of Product Expired</a>
							</li>
							<li>
								<a  href="returned.php"> Report of Returned Products</a>
							</li>
							<li>
								<a  href="search_customer.php"> Project Transaction Record</a>
							</li>
							<li>
								<a  href="search_employee.php"> Project Employee Salary</a>
							</li>
							<li>
								<a  href="cost_report.php"> Cost Report</a>
							</li>
							<li>
								<a  href="profit.php"> Profit</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="chart.php"> Graph By Category</a>
							</li>
							<li>
								<a href="charts.php"> Graph For Cash and Credit</a>
							</li>
							<li>
								<a href="lose.php"> Graph For Losses </a>
							</li>
							<li>
								<a href="month_chart.php"> Monthly Sales Chart</a>
							</li>
							<li>
								<a href="yearly_chart.php"> Yearly Sales Chart</a>
							</li>
							<li>
								<a href="search_employee_chart.php"> Project Employee Salary Chart</a>
							</li>
							<li>
								<a href="profit_chart.php"> Profit Chart</a>
							</li>
							<li>
								<a href="cost_chart.php"> Cost Chart</a>
							</li>
							<li>
								<a href="other_expenses_chart.php"> Other Expenses Chart </a>
							</li>
						</ul>
					</li>
						<?php	
						}
					?>
					

				</div>
			</div>
			<!-- /.navbar-static-side -->
		</nav>


		<?php 
		if($session_admin_position == 'Admin'){
			include('adduser.php'); 
		}
		?>