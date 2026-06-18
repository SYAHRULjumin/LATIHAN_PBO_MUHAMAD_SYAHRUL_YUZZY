<?php
// PendaftaranReguler.php
require_once 'Pendaftaran.php'; // Panggil induk & pbo

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan sesuai instruksi
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor manggil parent
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $prodi, $kampus) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    // Override abstract method dari induk
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar; // Reguler bayar full
    }

    // Metode Query Spesifik Jalur Reguler
    public static function getDaftarReguler($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>