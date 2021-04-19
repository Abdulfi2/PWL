<?php
class Pegawai{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //member3 method CRUD
    public function dataPegawai(){
        $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                ORDER BY pegawai.id DESC";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getPegawai($id){
        $sql = "SELECT pegawai.*, divisi.nama AS kategori FROM pegawai
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.id = ?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function dataDivisi(){
        $sql = "SELECT * FROM divisi ";
        //fungsi query eksekusi query dan ambil datanya
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO pegawai(nip,nama,email,agama,iddivisi,foto)
                VALUES (?,?,?,?,?,?)";

        //prepare statemnt
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data){
        $sql = "UPDATE pegawai SET nip=?,nama=?,email=?,agama=?,iddivisi=?,foto=?
                WHERE id = ?";

        //prepare statemnt
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM pegawai WHERE id=?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}