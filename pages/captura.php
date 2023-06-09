<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    exec('tirarfoto.bat');
    exit;
}
?>
