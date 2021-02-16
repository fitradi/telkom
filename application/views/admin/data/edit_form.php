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

						<a href="<?php echo site_url('admin/data/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/data/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $product->data_id?>" />
							<div class="form-group">
								<label for="name">Upload revisi desain & RAB *jika ada</label>
								<input class="form-control-file <?php echo form_error('rar') ? 'is-invalid':'' ?>"
								 type="file" name="rar"/>
								<input type="hidden" name="old_rar" value="<?php echo $product->rar ?>" />									
								<div class="invalid-feedback">
									<?php echo form_error('rar') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="nama_lop">Nama LOP*</label>
								<select class="form-control" id="nama_lop" name="nama_lop">
								<option value="<?php echo $product->nama_lop ?>"> <?php echo $product->name ?> </option>
								<?php foreach($lop->result() as $key => $data) { ?>
									<option value ="<?=$data->product_id?>"><?=$data->name?> </option>
								<?php } ?> </select>
								<div class="invalid-feedback">
									<?php echo form_error('nama_lop') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="sto">STO*</label>
								<select class="form-control" id="sto" name="sto">
								<option selected="<?php echo $product->sto ?>"> <?php echo $product->sto ?>	</option>													
								</select>							
								<div class="invalid-feedback">
									<?php echo form_error('sto') ?>
								</div>
								
							</div>

							
							<div class="form-group">
								<label for="koordinat">Koordinat</label>
								<input class="form-control <?php echo form_error('koordinat') ? 'is-invalid':'' ?>"
								 type="text" name="koordinat" placeholder="Koordinat" value="<?php echo $product->koordinat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('koordinat') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="segment">Segment</label>
								<input class="form-control <?php echo form_error('segment') ? 'is-invalid':'' ?>"
								 type="text" name="segment" placeholder="Sebelum, sesudah" value="<?php echo $product->segment ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('segment') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="distribusi">Distribusi*</label>
								<select class="form-control" id="distribusi" name="distribusi">
                                    <option selected=<?php echo $product->segment ?>><?php echo $product->distribusi ?> </option>                                   
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
									<?php echo form_error('distribusi') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="core_distribusi">Core Distribusi</label>
								<input class="form-control <?php echo form_error('core_distribusi') ? 'is-invalid':'' ?>"
								 type="number" name="core_distribusi" placeholder="Masukkan angka" value="<?php echo $product->core_distribusi?>" />
								<div class="invalid-feedback">
									<?php echo form_error('core_distribusi') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="slot_olt">Slot OLT*</label>
								<select class="form-control" id="slot_olt" name="slot_olt">
                                    <option selected="<?php echo $product->slot_olt ?>"><?php echo $product->slot_olt ?> </option>                                   
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
									<?php echo form_error('slot_olt') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="port_olt">Port OLT*</label>
								<select class="form-control" id="port_olt" name="port_olt">
                                    <option selected="<?php echo $product->port_olt ?>"><?php echo $product->port_olt ?> </option>                                   
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
                                </select>
								<div class="invalid-feedback">
									<?php echo form_error('port_olt') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="nama_olt">Nama OLT</label>
								<select class="form-control" id="nama_olt" name="nama_olt">
								<option value="<?php echo $product->nama_olt ?>"> <?php echo $product->nama_olt ?>	</option>													
								</select>					
								<div class="invalid-feedback">
									<?php echo form_error('nama_olt') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="no_rak_ea">Nomor Rak EA</label>
								<input class="form-control <?php echo form_error('no_rak_ea') ? 'is-invalid':'' ?>"
								 type="number" name="no_rak_ea" placeholder="Masukkan angka" value="<?php echo $product->no_rak_ea ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('no_rak_ea') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="panel_ea">Panel EA</label>
								<input class="form-control <?php echo form_error('panel_ea') ? 'is-invalid':'' ?>"
								 type="number" name="panel_ea" placeholder="Masukkan angka" value="<?php echo $product->panel_ea ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('panel_ea') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="port_ea">Port EA</label>
								<input class="form-control <?php echo form_error('port_ea') ? 'is-invalid':'' ?>"
								 type="number" name="port_ea" placeholder="Masukkan angka" value="<?php echo $product->port_ea ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('port_ea') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="no_rak_oa">Nomor Rak OA</label>
								<input class="form-control <?php echo form_error('no_rak_oa') ? 'is-invalid':'' ?>"
								 type="number" name="no_rak_oa" placeholder="Masukkan angka" value="<?php echo $product->no_rak_oa?>" />
								<div class="invalid-feedback">
									<?php echo form_error('no_rak_oa') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="panel_oa">Panel OA</label>
								<input class="form-control <?php echo form_error('panel_oa') ? 'is-invalid':'' ?>"
								 type="number" name="panel_oa" placeholder="Masukkan angka" value="<?php echo $product->panel_oa?>" />
								<div class="invalid-feedback">
									<?php echo form_error('panel_oa') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="port_oa">Port OA</label>
								<input class="form-control <?php echo form_error('port_oa') ? 'is-invalid':'' ?>"
								 type="number" name="port_oa" placeholder="Masukkan angka" value="<?php echo $product->port_oa?>" />
								<div class="invalid-feedback">
									<?php echo form_error('port_oa') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="panel_feeder">Panel Feeder</label>
								<input class="form-control <?php echo form_error('panel_feeder') ? 'is-invalid':'' ?>"
								 type="number" name="panel_feeder" placeholder="Masukkan angka" value="<?php echo $product->panel_feeder?>" />
								<div class="invalid-feedback">
									<?php echo form_error('panel_feeder') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="port_feeder">Port Feeder</label>
								<input class="form-control <?php echo form_error('port_feeder') ? 'is-invalid':'' ?>"
								 type="number" name="port_feeder" placeholder="Masukkan angka" value="<?php echo $product->port_feeder?>" />
								<div class="invalid-feedback">
									<?php echo form_error('port_feeder') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="urutan_pasif_odc">Urutan Pasif ODC</label>
								<input class="form-control <?php echo form_error('urutan_pasif_odc') ? 'is-invalid':'' ?>"
								 type="number" name="urutan_pasif_odc" placeholder="Masukkan angka" value="<?php echo $product->urutan_pasif_odc ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('urutan_pasif_odc') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="port_pasif_odc">Port Pasif ODC</label>
								<input class="form-control <?php echo form_error('port_pasif_odc') ? 'is-invalid':'' ?>"
								 type="number" name="port_pasif_odc" placeholder="Masukkan angka" value="<?php echo $product->port_pasif_odc ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('port_pasif_odc') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="panel_dist_odc">Panel Distribusi ODC</label>
								<input class="form-control <?php echo form_error('panel_dist_odc') ? 'is-invalid':'' ?>"
								 type="number" name="panel_dist_odc" placeholder="Masukkan angka" value="<?php echo $product->panel_dist_odc ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('panel_dist_odc') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="port_dist_odc">Port Distribusi ODC</label>
								<input class="form-control <?php echo form_error('port_dist_odc') ? 'is-invalid':'' ?>"
								 type="number" name="port_dist_odc" placeholder="Masukkan angka" value="<?php echo $product->port_dist_odc ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('port_dist_odc') ?>
								</div>
							</div>
							<div class="card-body">
								<h5> Alamat </h5>
							<div class="form-group">								
								<label for="jalan">Jalan</label>
								<input class="form-control <?php echo form_error('jalan') ? 'is-invalid':'' ?>"
								 type="text" name="jalan" placeholder="Masukkan jalan" value="<?php echo $product->jalan?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jalan') ?>
								</div>
							</div>
							<div class="form-group">								
								<label for="ancer">Ancer-ancer</label>
								<input class="form-control <?php echo form_error('ancer') ? 'is-invalid':'' ?>"
								 type="text" name="ancer" placeholder="Masukkan ancer-ancer" value="<?php echo $product->ancer?>" />
								<div class="invalid-feedback">
									<?php echo form_error('ancer') ?>
								</div>
							</div>
							<div class="form-group">								
								<label for="kecamatan">Kecamatan</label>
								<input class="form-control <?php echo form_error('kecamatan') ? 'is-invalid':'' ?>"
								 type="text" name="kecamatan" placeholder="Masukkan Kecamatan" value="<?php echo $product->kecamatan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kecamatan') ?>
								</div>
							</div>
							<div class="form-group">								
								<label for="kelurahan">Kelurahan</label>
								<input class="form-control <?php echo form_error('kelurahan') ? 'is-invalid':'' ?>"
								 type="text" name="kelurahan" placeholder="Masukkan Kelurahan" value="<?php echo $product->kelurahan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kelurahan') ?>
								</div>
							</div>
							</div>
							<div class="form-group">								
								<label for="qr_code">QR Code</label>
								<input class="form-control <?php echo form_error('qr_code') ? 'is-invalid':'' ?>"
								 type="text" name="qr_code" placeholder="Masukkan qr code" value="<?php echo $product->qr_code?>" />

								<div class="invalid-feedback">
									<?php echo form_error('qr_code') ?>
								</div>
							</div>
							<div class="form-group">								
								<label for="tipe_odp">Tipe ODP</label>
								<select class="form-control" id="tipe_odp" name="tipe_odp">
                                    <option selected="<?php echo $product->tipe_odp?>"><?php echo $product->tipe_odp?> </option>                                   
                                        <option value="CA-8">CA-8</option>
                                        <option value="CA-16">CA-16</option>
										<option value="CA-SOLID-8">CA-SOLID-8</option>
                                        <option value="CA-SOLID-16">CA-SOLID-16</option>
                                </select>
								<div class="invalid-feedback">
									<?php echo form_error('tipe_odp') ?>
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
			$("#nama_lop").on("change",function(){
				var product_id = $(this).val();
				$.ajax({
                    url : "<?php echo site_url('admin/data/sto_tester');?>",
                    method : "POST",
                    data : {product_id: product_id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
						for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].sto+'>'+data[i].nama_sto+'</option>'
							;
                        }
                        $('#sto').html(html);
 
 
                    }
                });
				
			});

			$("#nama_lop").on('change',function(){
				var sto = $('#sto').val();
				$.ajax({
                    url : "<?php echo site_url('admin/data/sto_tester1');?>",
                    method : "POST",
                    data : {sto: sto},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
						for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].olt+'>'+data[i].olt+'</option>';
                        }
                        $('#nama_olt').html(html);
 
 
                    }
                });
                return false;
				
			});
			
		});
		$(document).ready(function(){
			// Country dependent ajax
			

  
			
		});

			// state dependent ajax
		
	</script>
	

</html>
