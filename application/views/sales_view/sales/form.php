<html>
<head>

<?php $this->load->view("admin/_partials/head.php") ?>
  <title>Form Import</title>
  
  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
  
  <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
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
					</div>
					<div class="card-body">

  <h3>Form Import</h3>
  <hr>
  
  <a href="<?php echo base_url("upload/sales/format.xlsx"); ?>">Download Format</a>
  <br>
  <br>
  
  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?php echo base_url("index.php/admin/Sales/form"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
  </form>
  
  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("index.php/admin/Sales/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    
    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='8'>Preview Data</th>
    </tr>
    <tr>
        <th>Datel</th>
        <th>MYIR</th>
        <th>Sales</th>
        <th>SPV</th>
        <th>Customer Name</th>
        <th>Project</th>
        <th>Latitude</th>
        <th>Longitude</th>
    </tr>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
        $datel      = $row['A']; 
        $myir       = $row['B']; 
        $sales      = $row['C']; 
        $spv        = $row['D']; 
        $cust_name  = $row['E'];
        $project    = $row['F'];
        $latitude   = $row['G'];
        $longitude  = $row['H'];
      
      // Cek jika semua data tidak diisi
      if($datel == "" && $myir == "" && $sales == "" && $spv == "" && $cust_name == "" && $project == "" 
            && $latitude == "" && $longitude == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $datel_td = ( ! empty($datel))? "" : " style='background: #E07171;'";
        $myir_td = ( ! empty($myir))? "" : " style='background: #E07171;'"; 
        $sales_td = ( ! empty($sales))? "" : " style='background: #E07171;'"; 
        $spv_td = ( ! empty($spv))? "" : " style='background: #E07171;'"; 
        $cust_name_td = ( ! empty($cust_name))? "" : " style='background: #E07171;'";
        $project_td = ( ! empty($project))? "" : " style='background: #E07171;'";
        $latitude_td = ( ! empty($latitude))? "" : " style='background: #E07171;'";
        $longitude_td = ( ! empty($longitude))? "" : " style='background: #E07171;'";

        
        // Jika salah satu data ada yang kosong
        if($datel == "" or $myir == ""  or $cust_name == "" or $project == "" 
        or $latitude == "" or $longitude == ""){
            $kosong++; // Tambah 1 variabel $kosong
          }
        
        echo "<tr>";
        echo "<td".$datel_td.">".$datel."</td>";
        echo "<td".$myir_td.">".$myir."</td>";
        echo "<td".$sales_td.">".$sales."</td>";
        echo "<td".$spv_td.">".$spv."</td>";
        echo "<td".$cust_name_td.">".$cust_name."</td>";
        echo "<td".$project_td.">".$project."</td>";
        echo "<td".$latitude_td.">".$latitude."</td>";
        echo "<td".$longitude_td.">".$longitude."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button class='btn btn-success' type='submit' name='import'>Import</button>";
      echo "<a class='btn btn-default' type='submit' name='btn' href='".base_url("index.php/admin/Sales" )."'> Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
  </div>
  </div>
  </div>
  

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
  
</body>
</html>