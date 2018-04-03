<?php
header('Content-type: Application/JSON');
$data = file_get_contents('js/printRules.json');
echo $data;
?>