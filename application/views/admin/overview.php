<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap-select.css');?>">

</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>
		<!-- Icon Cards-->
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-comments"></i>
				</div>
				<div class="mr-5"  > <?php echo $jlh_barang; ?> LOP </div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href=admin/products/>
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
				<div class="mr-5"> <?php echo $input; ?> Inputted</div>
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
			
		</div>

		<!-- Area Chart Example-->
		<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewModal">Add New Package</button>
		<a href="<?php echo base_url("admin/Overview/export"); ?>" class="btn btn-small" ><i class="fas fa-download"></i> Export ke Excel</a><br>
		
        
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
					<th>LOP</th>
					<th>Mitra</th>
					<th>Status</th>
					<th>Tanggal GOLIVE</th>
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
										<td>
											<?php echo $data->lop ?>
										</td>
										<td>
											<?php echo $data->mitra ?>
										</td>
										<td>
											<?php echo $data->status ?>
										</td>
										<td>
											<?php echo $data->tgl_glive /*date('d/m/Y',strtotime($data->tgl_glive))*/ ?>
										</td>
										<td>
										<a class="fas fa-pencil-square-o" href="<?= base_url('admin/sales/edit/'.$data->id) ?>"></a> 
										<a class="fas fa-trash" href="#!" onclick="deleteConfirm('<?php echo site_url('admin/sales/delete/'.$data->id) ?>')"></a> 
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


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
<!-- Modal Add New Package-->
<form action="<?php echo site_url('admin/overview/create');?>" method="post">
        <div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Package</label>
                    <div class="col-sm-10">
                      <input type="text" name="package" class="form-control" placeholder="Package Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product</label>
                    <div class="col-sm-10">					
                        <select class="bootstrap-select" name="product[]" data-width="100%" data-live-search="true" multiple required>
                            <?php foreach ($product->result() as $row) :?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->myir;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
              </div>
            </div>
          </div>
        </div>
    </form>
    
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap-select.js');?>"></script>
	
    <script type="text/javascript">
        $(document).ready(function(){
            $('.bootstrap-select').selectpicker();

			 //GET UPDATE
			 $('.update-record').on('click',function(){
                var package_id = $(this).data('package_id');
                var package_name = $(this).data('package_name');
                $(".strings").val('');
                $('#UpdateModal').modal('show');
                $('[name="edit_id"]').val(package_id);
                $('[name="package_edit"]').val(package_name);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                    url: "<?php echo site_url('package/get_product_by_package');?>",
                    method: "POST",
                    data :{package_id:package_id},
                    cache:false,
                    success : function(data){
                        var item=data;
                        var val1=item.replace("[","");
                        var val2=val1.replace("]","");
                        var values=val2;
                        $.each(values.split(","), function(i,e){
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');
 
                        });
                    }
                     
                });
                return false;
            });
 
            //GET CONFIRM DELETE
            $('.delete-record').on('click',function(){
                var package_id = $(this).data('package_id');
                $('#DeleteModal').modal('show');
                $('[name="delete_id"]').val(package_id);
            });

		});
	</script>
    
</body>
</html>
