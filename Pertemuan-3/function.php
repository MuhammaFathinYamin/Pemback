<?php 

function htngLuasLingkaran($jari) {
    $phi = 3.15 ;
    $hasil = $phi * $jari * $jari ;
    return $hasil ;
}

echo htngLuasLingkaran(7);
echo '<br>';
echo htngLuasLingkaran(5);