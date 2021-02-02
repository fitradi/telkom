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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/data/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama LOP</th>
										<th>Nama OLT</th>
										<th>Segment</th>
										<th>Distribusi</th>					
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($products as $product): ?>
									<tr>
										<td width="150">
											<?php echo $product->nama ?>
										</td>
										<td>
											<?php echo ($product->nama_olt) ?>
										</td>
										<td>
											<?php echo $product->segment ?>
										</td>
										<td>
											<?php echo $product->distribusi ?>
											
										</td>
										
										
										
										<td width="250" >
											<a id="detail" href=" "  class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-detail"
													data-var1="<?=$product->nama?>"
													data-var2="<?=$product->koordinat?>"
													data-var3="<?=$product->segment?>"
													data-var4="<?=$product->distribusi?>"
													data-var5="<?=$product->core_distribusi?>"
													data-var6="<?=$product->slot_olt?>"
													data-var7="<?=$product->port_olt?>"
													data-var8="<?=$product->nama_olt?>"
													data-var9="<?=$product->no_rak_ea?>"
													data-var10="<?=$product->panel_ea?>"
													data-var11="<?=$product->port_ea?>"
													data-var12="<?=$product->no_rak_oa?>"
													data-var13="<?=$product->panel_oa?>"
													data-var14="<?=$product->port_oa?>"
													data-var15="<?=$product->panel_feeder?>"
													data-var16="<?=$product->port_feeder?>"
													data-var17="<?=$product->urutan_pasif_odc?>"
													data-var18="<?=$product->port_pasif_odc?>"
													data-var19="<?=$product->panel_dist_odc?>"
													data-var20="<?=$product->port_dist_odc?>"													
													data-var21="<?=$product->jalan?>"
													data-var22="<?=$product->ancer?>"
													data-var23="<?=$product->kecamatan?>"
													data-var24="<?=$product->kelurahan?>"
													data-var25="<?=$product->qr_code?>"
													data-var26="<?=$product->tipe_odp?>"
													>
													<i class="fa fa-eye" class=small></i> Detail  
												</a>
											<a href="<?php echo site_url('admin/data/edit/'.$product->data_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/data/delete/'.$product->data_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Delete </a>
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
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>
<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-tittle">Detail Item</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>				
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered no-margin">
					<tbody>
						<tr>
							<th>Nama LOP</th>
							<td><span id="var1"></span></td>
						</tr>
						<tr>
							<th>Koordinat</th>
							<td><span id="var2"></span></td>
						</tr>
						<tr>
							<th>Segment</th>
							<td><span id="var3"></span></td>
						</tr>
						<tr>
							<th>Distribusi</th>
							<td><span id="var4"></span></td>
						</tr>
						<tr>
							<th>Core Distribusi</th>
							<td><span id="var5"></span></td>
						</tr>
						<tr>
							<th>Slot OLT</th>
							<td><span id="var6"></span></td>
						</tr>
						<tr>
							<th>Port OLT</th>
							<td><span id="var7"></span></td>
						</tr>
						<tr>
							<th>Nama OLT</th>
							<td><span id="var8"></span></td>
						</tr>
						<tr>
							<th>Nomor Rak EA</th>
							<td><span id="var9"></span></td>
						</tr>
						<tr>
							<th>Panel EA</th>
							<td><span id="var10"></span></td>
						</tr>
						<tr>
							<th>Port EA</th>
							<td><span id="var11"></span></td>
						</tr>
						<tr>
							<th>Nomor Rak OA</th>
							<td><span id="var12"></span></td>
						</tr>
						<tr>
							<th>Panel OA</th>
							<td><span id="var13"></span></td>
						</tr>
						<tr>
							<th>Port OA</th>
							<td><span id="var14"></span></td>
						</tr>
						<tr>
							<th>Panel Feeder</th>
							<td><span id="var15"></span></td>
						</tr>
						<tr>
							<th>Port Feeder</th>
							<td><span id="var16"></span></td>
						</tr>
						<tr>
							<th>Urutan Pasif 1:4 ODC</th>
							<td><span id="var17"></span></td>
						</tr>
						<tr>
							<th>Port Pasif ODC</th>
							<td><span id="var18"></span></td>
						</tr>
						<tr>
							<th>Panel Distribusi ODC</th>
							<td><span id="var19"></span></td>
						</tr>
						<tr>
							<th>Port Distribusi ODC</th>
							<td><span id="var20"></span></td>
						</tr>
						<tr>
							<th>Jalan</th>
							<td><span id="var21"></span></td>
						</tr>
						<tr>
							<th>Ancer-ancer</th>
							<td><span id="var22"></span></td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<td><span id="var23"></span></td>
						</tr>
						<tr>
							<th>Kelurahan</th>
							<td><span id="var24"></span></td>
						</tr>
						<tr>
							<th>Qr Code</th>
							<td><span id="var25"></span></td>
						</tr>
						<tr>
							<th>Tipe ODP</th>
							<td><span id="var26"></span></td>
						</tr>

					</tbody>
				</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var satu = $(this).data('var1');
			var dua = $(this).data('var2');
			var tiga = $(this).data('var3');
			var empat = $(this).data('var4');
			var lima = $(this).data('var5');
			var enam = $(this).data('var6');
			var tujuh = $(this).data('var7');
			var lapan = $(this).data('var8');
			var sembilan = $(this).data('var9');
			var sepuluh = $(this).data('var10');
			var sebelas = $(this).data('var11');
			var duabelas = $(this).data('var12');
			var tigabelas = $(this).data('var13');
			var empatbelas = $(this).data('var14');
			var limabelas = $(this).data('var15');
			var enambelas = $(this).data('var16');
			var tujuhbelas = $(this).data('var17');
			var lapanbelas = $(this).data('var18');
			var sembilanbelas = $(this).data('var19');
			var duapuluh = $(this).data('var20');
			var duasatu = $(this).data('var21');
			var duadua = $(this).data('var22');
			var duatiga = $(this).data('var23');
			var duaempat = $(this).data('var24');
			var dualima = $(this).data('var25');
			var duaenam = $(this).data('var26');


			$('#var1').text(satu);
			$('#var2').text(dua);
			$('#var3').text(tiga);
			$('#var4').text(empat);
			$('#var5').text(lima);
			$('#var6') .text(enam);
			$('#var7').text(tujuh);
			$('#var8').text(lapan);
			$('#var9').text(sembilan);
			$('#var10').text(sepuluh);
			$('#var11').text(sebelas);
			$('#var12').text(duabelas);
			$('#var13').text(tigabelas);
			$('#var14').text(empatbelas);
			$('#var15').text(limabelas);
			$('#var16').text(enambelas);
			$('#var17').text(tujuhbelas);
			$('#var18').text(lapanbelas);
			$('#var19').text(sembilanbelas);
			$('#var20').text(duapuluh);
			$('#var21').text(duasatu);
			$('#var22').text(duadua);
			$('#var23').text(duatiga);
			$('#var24').text(duaempat);
			$('#var25').text(dualima);
			$('#var26').text(duaenam);
		})
	})
</script>

</html>
