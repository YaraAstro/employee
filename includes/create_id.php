<?php

function createID($prefix, $table, $config) {
    $get_sql = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 1";
    $sql_result = $config->query($get_sql);

    if ($sql_result->num_rows > 0) {
        $person = $sql_result->fetch_assoc();
        $last_id = $person['id'];
        $number = intval(substr($last_id, 2)) + 1;
        $new_id = $prefix . sprintf("%03d", $number);
    } else {
        $new_id = $prefix . '001';
    }

    return $new_id;
}


?>