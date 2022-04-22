<?php

interface getInfoProduk
{
    public function getInfoProduk();
}

abstract class Produk
{
    protected $judul,
              $penulis,
              $penerbit,
              $harga,
              $diskon = 0;
    
    public function __construct( $judul = "judul", $penulis = "penulis", 
    $penerbit = "penerbit", $harga = 0)
    {
        $this -> judul = $judul;
        $this -> penulis = $penulis;
        $this -> penerbit = $penerbit;
        $this -> harga = $harga;
    }

    public function setJudul($judul)
    {
        if(!is_string($judul))
        {
            throw new Exception("Judul harus string");
        }
        $this -> judul = $judul;
    }

    public function getJudul()
    {
        return $this -> judul = $judul;
    }

    public function setPenulis($penulis)
    {
        if(!is_string($penulis))
        {
            throw new Exception("Judul harus string");
        }
        $this -> penulis = $penulis;
    }

    public function getPenulis()
    {
        return $this -> penulis = $penulis;
    }

    public function setPenerbit($penerbit)
    {
        if(!is_string($penerbit))
        {
            throw new Exception("Judul harus string");
        }
        $this -> penerbit = $penerbit;
    }

    public function getPenerbit()
    {
        return $this -> penerbit = $penerbit;
    }
    
    public function setDiskon($diskon)
    {
        $this -> diskon = $diskon;
    }

    public function getDiskon()
    {
        return $this -> diskon;
    }

    public function getHarga()
    {
        return $this -> harga - ($this -> harga * $this -> diskon / 100);
    }

    public function getLabel()
    {
        return "$this -> penulis, $this -> penerbit";
    }

    abstract public function getInfo();
    
}

class Komik extends Produk implements InfoProduk
{
    public $jmhHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", 
    $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent :: __construct($judul, $penulis, $penerbit, $harga);

        $this -> jmlHalaman = $jmlHalaman;
    }

    public function getInfo()
    {
        $str = "{$this -> judul} | {$this -> getLabel()} (Rp. {$this -> harga})";

        return $str;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this -> getInfo() . " - {$this -> jmlHalaman} Halaman.";
    }
}

class Game extends Produk implements InfoProduk
{
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", 
    $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
    {
        parent :: __construct($judul, $penulis, $penerbit, $harga);

        $this -> waktuMain = $waktuMain;
    }
    
    public function getInfo()
    {
        $str = "{$this -> judul} | {$this -> getLabel()} (Rp. {$this -> harga})";

        return $str;
    }

    public function getInfoProduk()
    {
        $str = "Game : " . $this -> getInfo() . " - {$this -> waktuMain} Jam.";
    }
}

class CetakInfoProduk
{
    public $daftarProduk = array();

    public function tambahProduk(Produk $produk)
    {
        $this -> daftarProduk[] = $produk;
    }

    public function cetak()
    {
        $str = "Daftar Produk : <br> ";

        foreach($this -> daftarProduk as $p)
        {
            $str .= "- {$p -> getInfoProduk()} <br>";
        }

        return $str;
    } 
}


