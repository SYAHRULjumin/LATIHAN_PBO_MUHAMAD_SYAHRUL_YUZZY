<?php
// PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $jenis, $tingkat) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    public function hitungTotalBiaya() {
        // Potongan Rp50.000 sesuai Tahap 5
        return $this->biayaPendaftaranDasar - 50000;
    }

    // PASTIKAN BAGIAN INI ADA DAN KAGAK TYPO, ZUL!
    public function tampilkanInfoJalur() {
        return "Jalur: Prestasi | Jenis: " . $this->jenisPrestasi . " | Tingkat: " . $this->tingkatPrestasi;
    }

    public static function getDaftarPrestasi($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>