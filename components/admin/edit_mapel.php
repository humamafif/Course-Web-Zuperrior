<?php
  $id_show = $_GET['show_id'];

  $q = "SELECT * FROM mapel WHERE id_mapel = '$id_show'";
  $result = $conn -> query($q);
  $row = $result -> fetch_assoc();
?>

<div class="container px-4">
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Edit Mata Pelajaran
    </div>
    <div class="card-body">
      <form action="./controllers/edit.mapel.php?id=<?php echo $id_show; ?>" method="POST">
        <div class="mb-3">
          <label for="courseName" class="form-label">Nama Mata Pelajaran</label>
          <input type="text" name="mapel" class="form-control" value="<?php echo $row['nama_mapel']; ?>" id="courseName" required>
        </div>
        <div class="mb-3">
          <label for="courseDescription" class="form-label">Deskripsi Mata Pelajaran</label>
          <textarea class="form-control" name="deskripsi" id="courseDescription" rows="3"
            required><?php echo $row['keterangan']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="fileDescription" class="form-label">File Image</label>
          <input type="file" name="file_image" id="fileDescription" class="form-control mb-2" />
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
  </div>
</div>