<?php
 include_once("../../config/database.php");

 session_start();

    if ($_SESSION['username'] == "") {
        header('location:../index.php');
    }

   $queryId = $_GET["id"];
    
    if(isset($_POST['update'])){
      $category = $_POST['kategori'];
       
        $sql = "UPDATE tb_category SET nm_cat='$category'
        WHERE id='$queryId'";
        $result = $pdo->query($sql);

        if($result) {
            echo"<script> alert('Data Berhasil Diperbaharui')</script>";
        }else{
            echo "<script> alert('Data Tidak Dapat Diperbahrui)'</script>";
        }
    }
        if(empty($kat_name)){
          echo "<script> alert('Nama Kategori Tidak Boleh
          Kosong')</script>";
        }
        else
        {
          $insert = $pdo->prepare("INSERT INTO tb_category(nm_cat) value(:cat)");
          $insert->bindParam(':cat',$kat_name);

          if($insert->execute()){
            echo "<script> alert('Data Berhasil Ditambah')</
            script>";
          }else{
            echo "<script> alert('Data Tdak Berhasil Ditambah')
            <script>";
          }
        }
    ?>

    <?php
    include_once("../inc/header.php");
    include_once("../inc/admin_sidebar.php");
    ?>

<div class="content-wrapper">
    <?php
        $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
        $stmt = $pdo->query($sql);
        while($rows = $stmt->fetch()){
            $data_nama = $rows["nm_cat"];
        }
    ?> 
  <!-- Content Header (Page header) -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-7 mx-auto">
          <div class="card">
            <div class="card-header bg-primary" style="margin-left: 10px;">
              <h3 class="card-title">Tambah kategori</h3>
            </div>
            <!-- /.card-header -->
            <form method="POST" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="katInput">Nama Kategori</label>
                  <input type="text" class="from-control" id="katInput"
                  name="kategori" value="<?= $data_nama?>">
                </div>
              </div>
              <!-- /.card-body -->
              <div>
                <div class="card-footer">
                  <button type="submit" name="update" class="btn
                  btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-info">kembali</a>
                </div>
              </form>
            </div>

            <!-- /.row -->
            <!-- /.container-fluid -->
          </div>
        </div>
      </div>

  </section>
</div>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
