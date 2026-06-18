<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $sk, $sponsor) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    // INI YANG WAJIB ADA BIAR KAGAK ERROR!
    public function hitungTotalBiaya() {
        // Dikenakan surcharge/biaya tambahan khusus sebesar 25% sesuai Tahap 5
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur: Kedinasan | SK: " . $this->skIkatanDinas . " | Sponsor: " . $this->instansiSponsor;
    }

    public static function getDaftarKedinasan($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>