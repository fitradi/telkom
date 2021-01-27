<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("sales_view/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("sales_view/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("sales_view/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("sales_view/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5"  > <?php echo $jlh_barang; ?> Proyek </div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href=sales/products/>
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-list"></i>
				</div>
				<div class="mr-5">11 New Tasks!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-shopping-cart"></i>
				</div>
				<div class="mr-5">123 New Orders!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-life-ring"></i>
				</div>
				<div class="mr-5">13 New Tickets!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left">View Details</span>
				<span class="float-right">
					<i class="fas fa-angle-right"></i>
				</span>
				</a>
			</div>
			</div>
		</div>

		<!-- Area Chart Example-->
		<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                    <th>Datel</th>
                    <th>MYIR</th>
                    <th>Sales</th>
                    <th>SPV</th>
                    <th>Customer Name</th>
                    <th>Project</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sales as $data): ?>
									<tr>
										<td width="150">
											<?php echo $data->datel ?>
										</td>
										<td>
											<?php echo $data->myir ?>
										</td>
										<td>
											<?php echo $data->sales ?>
										</td>
										<td>
											<?php echo $data->spv ?>
										</td>
                    <td>
											<?php echo $data->cust_name ?>
										</td>
                    <td>
											<?php echo $data->project ?>
										</td>
                    <td>
											<?php echo $data->latitude ?>
										</td>
                    <td>
											<?php echo $data->longitude ?>
										</td>
                    </tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>

		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("sales_view/_partials/scrolltop.php") ?>
<?php $this->load->view("sales_view/_partials/modal.php") ?>
<?php $this->load->view("sales_view/_partials/js.php") ?>
    
</body>
</html>
