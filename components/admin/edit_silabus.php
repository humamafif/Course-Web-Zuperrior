<?php
  $id_show = $_GET['show_id'];

  $q = "SELECT * FROM silabus WHERE id_silabus = '$id_show'";
  $result = $conn -> query($q);
  $row = $result -> fetch_assoc();
?>

<div class="container px-4">
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Edit Silabus
    </div>
    <div class="card-body">
      <form action="./controllers/edit.mapel.silabus.php?id=<?php echo $id_show; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="courseName" class="form-label">Link Video</label>
          <input type="text" name="video" class="form-control" id="courseName" value="<?php echo $row['video']; ?>" required />
        </div>
        <div class="mb-3">
          <label for="fileDescription" class="form-label">File Silabus</label>
          <input type="file" name="file_silabus" id="fileDescription" class="form-control mb-2" />
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
  </div>
</div>