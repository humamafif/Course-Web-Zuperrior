<?php
$query = "SELECT m.*, s.* from mapel m INNER JOIN silabus s on m.id_mapel = s.id_mapel";
$result = $conn->query($query);

function getYouTubeEmbedUrl($url)
{
  $parsedUrl = parse_url($url);
  if (isset($parsedUrl['query'])) {
    parse_str($parsedUrl['query'], $queryParams);
    return 'https://www.youtube.com/embed/' . $queryParams['v'];
  }
  return $url;
}
?>
<div class="container px-4" id="mapel">
  <h2>Data Silabus</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nama Mapel</th>
        <th>Video</th>
        <th>File Modul</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['nama_mapel'] ?></td>
            <td style="max-width: 300px;">
              <div class="position-relative">
                <iframe class="embed-responsive-item" src="<?php echo getYouTubeEmbedUrl($row['video']) ?>"
                  title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
            </td>
            <td>
              <?php
              if ($row['file'] != null) {
                echo basename($row['file']); // Menampilkan hanya nama file
              } else {
                echo "Tidak ada modul";
              }
              ?>
            </td>
            <td>
              <a href="admin.php?halaman=edit_silabus&show_id=<?php echo $row['id_silabus'] ?>"
                class="btn btn-warning btn-sm"><i class='fas fa-edit'></i></a>
              <?php
              if ($row['file'] != null) {
                echo "<a href='./assets/data/" . $row['file'] . "' class='btn btn-success btn-sm'>Download</a>";
              }
              ?>
            </td>
          </tr>
        <?php }
      } else {
        echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
      }
      $conn->close(); // Menutup koneksi
      ?>
    </tbody>
  </table>
</div>