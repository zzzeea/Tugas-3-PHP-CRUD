<?php

    class Database {
        //properti
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "db_php";
        public $connect;

        function __construct()
        {
            $this->connect = mysqli_connect($this->host, $this->username, $this->password);
            mysqli_select_db($this->connect, $this->database);

            // if($this->connect->connect_error) {
            //     die("Koneksi gagal : " .$this->connect->connect_error);
            // }
            // echo "Koneksi Berhasil";
        }

        function tampilData(){
            $data = mysqli_query($this->connect, "SELECT * FROM tb_users");
            $row = mysqli_fetch_all($data, MYSQLI_ASSOC);
            // var_dump($row);
            return $row;
        }

        function tambahData($nama, $alamat, $nohp){
            mysqli_query($this->connect, "INSERT INTO tb_users VALUES(NULL, '$nama', '$alamat', '$nohp')");
        }

        function editData($id){
            $data = mysqli_query($this->connect, "SELECT * FROM tb_users WHERE id = '$id'");
            $row = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $row;
        }

        function updateData($id, $nama, $alamat, $nohp) {
            $query = "UPDATE tb_users SET nama = '$nama', alamat = '$alamat', nohp = '$nohp' WHERE id = '$id'";
            if (!mysqli_query($this->connect, $query)) {
                echo "Error: " . mysqli_error($this->connect);
            } else {
                echo "Data berhasil diupdate";
            }
        }

        function hapusData($id) {
            mysqli_query($this->connect,"DELETE FROM tb_users WHERE id = '$id'");
        }
    }
?>