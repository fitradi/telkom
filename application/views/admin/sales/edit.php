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

						<form action="<?php base_url(" admin/sales/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $sales->id?>" />

							
							<div class="form-group">
								<label for="datel">Datel*</label>
								<select class="form-control" id="datel" name="datel">
								<option value="<?php echo $sales->datel ?>"><?php echo $sales->datel ?> </option>
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
								 type="text" name='myir' value="<?php echo $sales->myir ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('myir') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="sales">Sales</label>
								<input class="form-control <?php echo form_error('sales') ? 'is-invalid':'' ?>"
								 type="text" name="sales"  value="<?php echo $sales->sales ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('sales') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="spv">SPV</label>
								<input class="form-control <?php echo form_error('spv') ? 'is-invalid':'' ?>"
								 type="text" name="spv"  value="<?php echo $sales->spv?>" />
								<div class="invalid-feedback">
									<?php echo form_error('spv') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="cust_name">Customer Name*</label>
								<input class="form-control <?php echo form_error('cust_name') ? 'is-invalid':'' ?>"
								 type="text" name="cust_name"  value="<?php echo $sales->cust_name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cust_name') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="project">Project*</label>
								<input class="form-control <?php echo form_error('project') ? 'is-invalid':'' ?>"
								 type="text" name="project"  value="<?php echo $sales->project ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('project') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="latitude">Latitude*</label>
								<input class="form-control <?php echo form_error('latitude') ? 'is-invalid':'' ?>"
								 type="text" name="latitude"  value="<?php echo $sales->latitude ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('latitude') ?>
								</div>
							</div>
                            
							<div class="form-group">
								<label for="longitude">Longitude*</label>
								<input class="form-control <?php echo form_error('longitude') ? 'is-invalid':'' ?>"
								 type="text" name="longitude"  value="<?php echo $sales->longitude ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('longitude') ?>
								</div>
							</div>		

							<div class="form-group">
								<label for="lop">LOP</label>
								<input class="form-control <?php echo form_error('lop') ? 'is-invalid':'' ?>"
								 type="text" name="lop"  value="<?php echo $sales->lop ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('lop') ?>
								</div>
							</div>	

							<div class="form-group">
								<label for="mitra">Mitra</label>
								<input class="form-control <?php echo form_error('mitra') ? 'is-invalid':'' ?>"
								 type="text" name="mitra"  value="<?php echo $sales->mitra ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('mitra') ?>
								</div>
							</div>	

							<div class="form-group">
								<label for="status">Status</label>
								<select class="form-control" id="status	" name="status">
                                    <option selected="0"><?php echo $sales->status ?></option>
                                   
                                        <option value="Submitted">Submitted</option>
                                        <option value="Fisik DONE">Fisik DONE</option>
										<option value="On Progress">On Progress</option>
                                        <option value="Checking">Checking</option>
										<option value="Drawing">Drawing</option>
										<option value="Push UIM">Push UIM</option>
                                        <option value="GOLIVE">GOLIVE</option>
                 
                                </select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>	

							<div class="form-group">
								<label for="tgl_glive">Tanggal GOLIVE</label>
								<input class="form-control <?php echo form_error('tgl_glive') ? 'is-invalid':'' ?>"
								 type="text" name="tgl_glive"  placeholder="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime($sales->tgl_glive))?>" />
								<div class="invalid-feedback"> 
									<?php echo form_error('tgl_glive') ?>
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
