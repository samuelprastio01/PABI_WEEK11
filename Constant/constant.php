<?php

// define('NAMA', 'Samuel Prastio Napitupulu');
// echo NAMA;

// echo "<br>";

// const UMUR = 19;
// echo UMUR;

// class Coba
// {
//     const NAMA = 'Rico Situmorang';
// }

// echo Coba :: NAMA;

// ECHO __LINE__;

// function Coba()
// {
//     return __FUNCTION__;
// }

// echo coba();

class Coba
{
    public $kelas = __CLASS__;
}

$obj = new Coba;
echo $obj -> kelas;