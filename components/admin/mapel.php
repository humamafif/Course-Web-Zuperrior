<?php
$sql = "SELECT id_mapel, nama_mapel, keterangan FROM mapel"; // Query untuk mengambil data
$result = $conn->query($sql); // Mengeksekusi query

function truncateText($text, $wordLimit)
{
  $words = explode(' ', $text);
  if (count($words) > $wordLimit) {
    $words = array_slice($words, 0, $wordLimit);
    return implode(' ', $words) . '...';
  }
  return $text;
}
?>

<div class="container px-4" id="mapel">
  <h2>Data Mapel</h2>
  <a href="admin.php?halaman=form_mapel" class="btn btn-success mb-3">
    <i class="fas fa-plus"></i> Tambah Mapel
  </a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th style="max-width: 150px;">Nama Mapel</th>
        <th style="max-width: 400px;">Keterangan</th>
        <th style="width: 150px;">#</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Menampilkan data setiap baris
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td style='max-width: 150px;'>" . $row['nama_mapel'] . "</td>";
          echo "<td style='max-width: 400px;'>" . truncateText($row['keterangan'], 10) . "</td>";
          echo "<td style='width: 150px;'>
                  <a href='admin.php?halaman=edit_mapel&show_id=" . $row['id_mapel'] . "' class='btn btn-warning btn-sm'>
                    <i class='fas fa-edit'></i>
                  </a>
                  <a href='./controllers/delete.mapel.php?id_mapel=" . $row['id_mapel'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>
                    <i class='fas fa-trash-alt'></i>
                  </a>
                </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='3'>Tidak ada data.</td></tr>";
      }
      $conn->close(); // Menutup koneksi
      ?>
    </tbody>
  </table>
</div>