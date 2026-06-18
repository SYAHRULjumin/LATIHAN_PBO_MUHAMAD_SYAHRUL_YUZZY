<?php
// index.php
require_once 'Pendaftaran.php'; // Ambil koneksi database $pdo dari file induk
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Ambil data mentah dari database menggunakan metode query spesifik (Tahap 4)
$dataReguler = PendaftaranReguler::getDaftarReguler($pdo);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($pdo);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($pdo);

// Fungsi pembantu untuk mengubah data query menjadi kumpulan objek konkrit (Polimorfisme)
function buatTabelJalur($daftarData, $jenisJalur) {
    if (empty($daftarData)) {
        echo "<p style='color:red;'>Tidak ada data untuk jalur ini.</p>";
        return;
    }

    echo "<table border='1' cellpadding='8' cellspacing='0' style='width:100%; margin-bottom:20px; border-collapse:collapse;'>
            <thead style='background-color:#f2f2f2;'>
                <tr>
                    <th>ID</th>
                    <th>Nama Calon</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai Ujian</th>
                    <th>Informasi Spesifik Jalur (Polimorfisme)</th>
                    <th>Total Biaya Pendaftaran</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($daftarData as $row) {
        // Instansiasi objek secara dinamis berdasarkan jenis jalurnya agar polimorfisme jalan
        if ($jenisJalur === 'Reguler') {
            // Sesuai kolom database lu, sesuaikan urutan parameter constructor-nya
            $objek = new PendaftaranReguler($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['pilihan_prodi'] ?? '-', $row['lokasi_kampus'] ?? '-');
        } elseif ($jenisJalur === 'Prestasi') {
            $objek = new PendaftaranPrestasi($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['jenis_prestasi'] ?? '-', $row['tingkat_prestasi'] ?? '-');
        } else {
            $objek = new PendaftaranKedinasan($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['sk_ikatan_dinas'] ?? '-', $row['instansi_sponsor'] ?? '-');
        }

        echo "<tr>
                <td>" . htmlspecialchars($row['id_pendaftaran']) . "</td>
                <td>" . htmlspecialchars($row['nama_calon']) . "</td>
                <td>" . htmlspecialchars($row['asal_sekolah']) . "</td>
                <td>" . htmlspecialchars($row['nilai_ujian']) . "</td>
                <!-- Pemanfaatan metode polimorfik sesuai poin 3 -->
                <td>" . htmlspecialchars($objek->tampilkanInfoJalur()) . "</td>
                <td>Rp " . number_format($objek->hitungTotalBiaya(), 0, ',', '.') . "</td>
              </tr>";
    }
    echo "</tbody></table>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pendaftaran Mahasiswa Baru</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 30px;">

    <h2>Daftar Pendaftaran Mahasiswa Baru - Kategori Jalur</h2>
    <hr>

    <h3>1. Jalur Reguler</h3>
    <?php buatTabelJalur($dataReguler, 'Reguler'); ?>

    <h3>2. Jalur Prestasi</h3>
    <?php buatTabelJalur($dataPrestasi, 'Prestasi'); ?>

    <h3>3. Jalur Kedinasan</h3>
    <?php buatTabelJalur($dataKedinasan, 'Kedinasan'); ?>

</body>
</html>