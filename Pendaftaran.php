<?php
// ==========================================
// 1. KONFIGURASI KONEKSI DATABASE (PDO)
// ==========================================
$host = "localhost";
$username = "root";
$password = ""; // Kosongkan kalau pake bawaan Laragon
$database = "DB_SIMULASI_PBO_KELAS_NamaLengkap"; // Ganti pake nama database lu!

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set error mode ke exception biar gampang tracking errornya
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal total mamen: " . $e->getMessage());
}


// ==========================================
// 2. ABSTRACT CLASS PENDAFTARAN
// ==========================================
abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; 

    // Constructor buat map data dari database
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar) {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $sekolah;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    // CUKUP SATU METHOD ABSTRAK (Sesuai sabda dosen lu)
    abstract public function hitungTotalBiaya();
}
?>