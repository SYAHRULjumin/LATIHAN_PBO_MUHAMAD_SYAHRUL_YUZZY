<?php
// PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $prodi, $kampus) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    // PASTIIN BAGIAN INI ADA DAN TIDAK TYPO!
    public function hitungTotalBiaya() {
        // Tarif standar murni tanpa biaya tambahan sesuai Tahap 5
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur: Reguler | Prodi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }

    public static function getDaftarReguler($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>