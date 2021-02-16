<!DOCTYPE html>
<html lang="en">

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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/sales/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/sales/add") ?>" method="post"
							enctype="multipart/form-data" >

							
                            <div class="form-group">
								<label for="datel">Datel*</label>
								<select class="form-control" id="datel" name="datel">
								<option value="">- Pilih </option>
								<?php foreach($datel->result() as $key => $data) { ?>
									<option value ="<?=$data->datel?>"><?=$data->datel?> </option>
								<?php } ?> </select>
								<div class="invalid-feedback">
									<?php echo form_error('datel') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for='myir'>MYIR*</label>
								<input class="form-control <?php echo form_error('myir') ? 'is-invalid':'' ?>"
								 type="number" name='myir' placeholder="Masukkan angka" />
								<div class="invalid-feedback">
									<?php echo form_error('myir') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="sales">Sales</label>
								<input class="form-control <?php echo form_error('sales') ? 'is-invalid':'' ?>"
								 type="text" name="sales"  placeholder="Masukkan nama sales" />
								<div class="invalid-feedback">
									<?php echo form_error('sales') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="spv">SPV</label>
								<input class="form-control <?php echo form_error('spv') ? 'is-invalid':'' ?>"
								 type="text" name="spv"  placeholder="Masukkan nama pengawas" />
								<div class="invalid-feedback">
									<?php echo form_error('spv') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="cust_name">Customer Name*</label>
								<input class="form-control <?php echo form_error('cust_name') ? 'is-invalid':'' ?>"
								 type="text" name="cust_name"  placeholder="Masukkan nama pelanggan"/>
								<div class="invalid-feedback">
									<?php echo form_error('cust_name') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="project">Project*</label>
								<input class="form-control <?php echo form_error('project') ? 'is-invalid':'' ?>"
								 type="text" name="project"  placeholder="Masukkan nama project" />
								<div class="invalid-feedback">
									<?php echo form_error('project') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="latitude">Latitude*</label>
								<input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
								 type="number" name="latitude"  placeholder="Masukkan angka" />
								<div class="invalid-feedback">
									<?php echo form_error('latitude') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="longitude">Longitude*</label>
								<input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
								 type="number" name="longitude" placeholder="Masukkan angka" />
								<div class="invalid-feedback">
									<?php echo form_error('longitude') ?>
								</div>
							</div>						
				
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
