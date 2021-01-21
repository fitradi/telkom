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

						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/product/edit") ?>"  method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $product->product_id?>" />

							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Nama proyek" value="<?php echo $product->name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Data Desain & RAB</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group" <?php base_url(" admin/product/tes") ?>>
								<label for="name">Datel*</label>
								<select class="form-control" id="datel	" name="datel">
								<option value="">- Pilih </option>
								<?php foreach($datel->result() as $key => $data) { ?>
									<option value ="<?=$data->id_datel?>"><?=$data->datel?> </option>
								<?php } ?> </select>
								
								<div class="invalid-feedback">
									<?php echo form_error('datel') ?>
								</div>
							</div>		

							<div class="form-group">
								<label for="sel1">STO*</label>
								<select class="form-control" id="sto" name="sto">
								<option value="">- Pilih </option> 
								</select>
							
								<div class="invalid-feedback">
									<?php echo form_error('sto') ?>
								</div>
								
							</div>

							<div class="form-group">
								<label for="odc">Nama ODC*</label>
								<input class="form-control <?php echo form_error('odc') ? 'is-invalid':'' ?>"
								 type="text" name="odc" placeholder="Project ODC" value="<?php echo $product->odc ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('odc') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pt2">Distribusi*</label>
								<select class="form-control" id="pt2" name="pt2">
                                    <option selected="0"><?php echo $product->pt2 ?> </option>                                   
                                        <option value="1">1</option>
                                        <option value="2">2</option>
										<option value="3">3</option>
                                        <option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>     
										<option value="7">7</option>
                                        <option value="8">8</option>
										<option value="9">9</option>
                                        <option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>              
										<option value="13">13</option>
                                        <option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>     
										<option value="17">17</option>
                                        <option value="18">18</option>
										<option value="19">19</option>
                                        <option value="20">20</option>
                                </select>
								<div class="invalid-feedback">
									<?php echo form_error('pt2') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jml_odp">Jumlah ODP</label>
								<input class="form-control <?php echo form_error('jml_odp') ? 'is-invalid':'' ?>"
								 type="number" name="jml_odp" placeholder="Masukkan angka" value="<?php echo $product->jml_odp ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('jml_odp') ?>
								</div>
							</div>				

							
							
							<div class="form-group">
								<label for="status">Status*</label>						
																
								<select class="form-control" id="status	" name="status">
                                    <option selected="0"><?php echo $product->status ?></option>
                                   
                                        <option value="1">Submitted</option>
                                        <option value="2">Designed</option>
										<option value="3">On Progress</option>
                                        <option value="4">Checking</option>
										<option value="5">Drawing</option>
										<option value="6">Push UIM</option>
                                        <option value="7">GOLIVE</option>
                 
                                </select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
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
