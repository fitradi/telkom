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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Upload desain & RAB</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image"/>
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>
							<br>

							<div class="form-group">
								<label for="datel">Datel*</label>
								<select class="form-control" id="datel" name="datel">
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


							<div class="form-group col-md-8 	">
								<label for="odc">Nama ODC*</label>
								<input class="form-control md-5 <?php echo form_error('odc') ? 'is-invalid':'' ?>"
								 type="text" name="odc" placeholder="Project ODC" />
								<div class="invalid-feedback">
									<?php echo form_error('odc') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pt2">Distribusi*</label>
								<select class="form-control" id="pt2" name="pt2">
                                    <option selected="0">Pilih.. </option>                                   
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
								 type="number" name="jml_odp" placeholder="Masukkan angka" />
								<div class="invalid-feedback">
									<?php echo form_error('jml_odp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="status">Status*</label>						
																
								<select class="form-control" id="status	" name="status">
                                    <option selected="1">Submitted</option>
                                                        
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
<script type="text/javascript">
		$(document).ready(function(){
			// Country dependent ajax
			$("#datel").on("change",function(){
				var id_datel = $(this).val();
				$.ajax({
                    url : "<?php echo site_url('admin/products/sto_test');?>",
                    method : "POST",
                    data : {id_datel: id_datel},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_sto+'>'+data[i].sto+'</option>';
                        }
                        $('#sto').html(html);
 
                    }
                });
                return false;
				
			});
		});

			// state dependent ajax
		
	</script>

	
 

</html> 