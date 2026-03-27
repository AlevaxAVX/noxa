<?php
session_start();


require_once __DIR__ . '/vendor/autoload.php'; 

use Supabase\SupabaseClient;


$SUPABASE_URL = 'https://uldldhzwsijrfvwbdjvv.supabase.co';
$SUPABASE_KEY = 'sb_publishable_z_d_tANwHagZz8m_Rg8sIg_llfS9bTm'; 
$client = new SupabaseClient($SUPABASE_URL, $SUPABASE_KEY);

function supabase_select($table, $conditions = []) {
    global $client;
    $query = $client->from($table)->select('*');
    foreach ($conditions as $col => $val) {
        $query->eq($col, $val);
    }
    $res = $query->execute();
    return $res->getData() ?? [];
}

function supabase_insert($table, $data = []) {
    global $client;
    $res = $client->from($table)->insert($data)->execute();
    $data = $res->getData();
    return $data[0] ?? null;
}

function supabase_update($table, $data = [], $conditions = []) {
    global $client;
    $query = $client->from($table)->update($data);
    foreach ($conditions as $col => $val) {
        $query->eq($col, $val);
    }
    $res = $query->execute();
    return $res->getData() ?? [];
}
