<?php

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

/** fungsi untuk mengubah kebentuk format select2
 *
 * @param array $get merupakan data yang didapat dari database
 * @param string $id nama field id sebagai value dari option
 * @param string $text nama field yang akan tampil pada option
 * @return array $data hasil format 
 */
function getBulanArray($bln)
{
    $arrBulan = array(
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    );
    return $arrBulan[$bln];
}

function commonFormatSelect2($get, $id, $text)
{
    $result = array();
    foreach ($get as $r) {
        $set = array(
            "id" => $r[$id],
            "text" => $r[$text]
        );

        array_push($result, $set);
    }

    return $result;
}

function quickRandom($length = 16)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 6)), 0, $length);
}

function numtoalpa($num)
{
    $alpha = 'abcdefghijklmnopqrstuvwxyz';
    $charactersArray = str_split($alpha);

    return $charactersArray[$num];
}

function decryptCom($id)
{

    try {
        return Crypt::decrypt($id);
    } catch (DecryptException $e) {
        abort(403);
    }
}

function cleanString($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
