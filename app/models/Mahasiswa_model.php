<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // data base handler


    // private $mhs = [
    //     [
    //         "nama" => "Rizki Darmawan",
    //         "nrp" => "0402102",
    //         "email" => "rizkidarmawan@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Arina Mana Sikana",
    //         "nrp" => "0801602",
    //         "email" => "arinamanasikana@gmail.com",
    //         "jurusan" => "Tafsir Al-quran"
    //     ],
    //     [
    //         "nama" => "Husein Khoirul Imam",
    //         "nrp" => "0602612",
    //         "email" => "husein@gmail.com",
    //         "jurusan" => "Ilmu Hadist"
    //     ]
    // ];


    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id ');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {

        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET 
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        // return $this->db->rowCount();
        echo($query);
        exit();
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword OR jurusan LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");
        return $this->db->resultSet();
    }
}
