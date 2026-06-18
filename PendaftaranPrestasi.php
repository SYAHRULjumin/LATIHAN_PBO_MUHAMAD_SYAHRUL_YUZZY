<?php
// PendaftaranPrestasi.php
require_once 'Pendaftaran.php'; // Panggil induk & pdo

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan sesuai instruksi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor manggil parent
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $jenis, $tingkat) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    // Override abstract method dari induk
    public function hitungTotalBiaya() {
    // Mendapatkan potongan/insentif apresiasi sebesar Rp50.000
    return $this->biayaPendaftaranDasar - 50000;
    }

    // Metode Query Spesifik Jalur Prestasi
    public static function getDaftarPrestasi($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>