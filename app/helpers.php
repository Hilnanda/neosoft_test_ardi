<?php 

function set_rupiah($value) {
    return "Rp " . number_format($value,0,',','.');
}

?>