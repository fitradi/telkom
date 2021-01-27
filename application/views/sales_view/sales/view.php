<html>
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
        <div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/Sales/form') ?>"><i class="fas fa-plus"></i> Import Data</a>
					</div>
					<div class="card-body">

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
				</div>  

  </div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
  

</body>
</html>