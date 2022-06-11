<!doctype html>




<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="stylesheet" href="presensi\admin\assets\css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Pencarian Nama pegawai</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      
      <form class="d-flex " method="post">
        <input class="form-control  me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="submit-cari-akun" type="submit">Search</button>
      </form>
    </div>
  </nav>


  <?php

  $conn = mysqli_connect("localhost", "root", "", "db_presensi");
  
  ?>


  <?php
  if (isset($_POST['submit-cari-akun'])) {
    $keyword = $_POST['keyword']; 
    $query = mysqli_query($conn, "SELECT *,position.position_name,shift.shift_name,building.name FROM employees,shift,position,building WHERE employees_name  LIKE '%$keyword%' ORDER BY employees_name  ASC");
  } else { 
    $query = "SELECT * FROM employees ORDER BY id ";
  }

  $result=mysqli_query($conn, $query);
  while ($row =  mysqli_fetch_array($result)) {
  $query = mysqli_query($conn, "SELECT *,position.position_name,shift.shift_name,building.name FROM employees,shift,position,building ORDER BY employees_name DESC");
  }
  ?>

  <table class="table table-bordered bg-light" width="100%" cellspacing="0">
  <thead class="bg-dark text-white">
      <th class="text-center">ID</th>
      <th class="text-center">Nama Pegawai</th>
      <th class="text-center">Email</th>
      <th class="text-center">jabatan</th>
      <th class="text-center">Lokasi</th>

      <th colspan="2"></th>
    </thead>
    <tbody style="height: 100vh;">
      <?php
 


      if (mysqli_num_rows($query))
      $no=0; { ?>
        <?php
         $no++;
          while ($row = mysqli_fetch_array($query)) { ?>
          <tr>

            <td class="text"><?php echo $row[$no] ?></td>
            <td class="text"><?php echo $row['employees_name'] ?></td>
            <td class="text"><?php echo $row['employees_email'] ?></td>
            
            <td class="text"><?php echo $row['position_name'] ?></td>
            <td class="text"><?php echo $row['shift_name'] ?></td>
      

          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>


  <section>

  </section>






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>