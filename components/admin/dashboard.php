<?php
$q = "SELECT * FROM user WHERE `role` = 'murid' LIMIT 25";
$result = $conn->query($q);

if (!$result) {
  echo "<script>alert('Gagal mengambil data user!')</script>";
}
?>

<div class="container-fluid px-4">
  <h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>
  <div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <div class="card-body">ID</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <div class="small text-white"><?php echo $_SESSION['id_user']; ?></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-warning text-white mb-4">
        <div class="card-body">Logged in as</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <div class="small text-white"><?php echo $_SESSION['nama']; ?></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-success text-white mb-4">
        <div class="card-body">Role</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <div class="small text-white"><?php echo $_SESSION['role'] ?></div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-danger text-white mb-4">
        <div class="card-body">Atur Mapel</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link" href="admin.php?halaman=mapel">View Details</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="row">
    <div class="col-xl-6">
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-chart-area me-1"></i>
          Area Chart Example
        </div>
        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-chart-bar me-1"></i>
          Bar Chart Example
        </div>
        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div> -->
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Data Siswa
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $no = 1;
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['noHP']; ?></td </tr>
            <?php } ?>
            <!-- More rows can be added here -->
        </tbody>
      </table>
    </div>
  </div>
</div>