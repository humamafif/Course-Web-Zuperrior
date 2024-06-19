<div class="container px-4">
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Tambah Mata Pelajaran
    </div>
    <div class="card-body">
      <form action="./controllers/add.mapel.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="courseName" class="form-label">Nama Mata Pelajaran</label>
          <input type="text" name="mapel" class="form-control" id="courseName" required />
        </div>
        <div class="mb-3">
          <label for="courseDescription" class="form-label">Deskripsi Mata Pelajaran</label>
          <textarea class="form-control" name="deskripsi" id="courseDescription" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label for="videoDescription" class="form-label">Link Video (From Youtube)</label>
          <input class="form-control" name="video" id="videoDescription" rows="3" required />
        </div>
        <div class="mb-3">
          <label for="fileDescription" class="form-label">File Silabus</label>
          <input type="file" name="file_silabus" id="fileDescription" class="form-control mb-2" />
        </div>
        <div class="mb-3">
          <label for="fileDescription" class="form-label">File Image</label>
          <input type="file" name="file_image" id="fileDescription" class="form-control mb-2" />
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
</div>