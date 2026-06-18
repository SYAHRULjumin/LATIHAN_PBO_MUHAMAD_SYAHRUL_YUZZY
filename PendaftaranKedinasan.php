<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php'; // Panggil induk & pdo

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan sesuai instruksi
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor manggil parent
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $sk, $sponsor) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    // Override abstract method dari induk
    public function tampilkanInfoJalur() {
    return "Jalur: Kedinasan | SK: " . $this->skIkatanDinas . " | Sponsor: " . $this->instansiSponsor;
}

    // Metode Query Spesifik Jalur Kedinasan
    public static function getDaftarKedinasan($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>