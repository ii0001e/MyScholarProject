<?php
$parool = 'admin';
$sool = 'vagavagatekst';
$kryp = crypt($parool, $sool);
echo $kryp;