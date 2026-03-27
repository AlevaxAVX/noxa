<?php

require_once __DIR__ . '/vendor/autoload.php';

use Supabase\SupabaseClient;


$SUPABASE_URL = 'https://uldldhzwsijrfvwbdjvv.supabase.co';
$SUPABASE_KEY = 'sb_publishable_z_d_tANwHagZz8m_Rg8sIg_llfS9bTm'; 


$client = new SupabaseClient($SUPABASE_URL, $SUPABASE_KEY);

function supabase_insert($table, $data) {
    global $client;
    $response = $client->from($table)->insert($data)->execute();
    if ($response['error']) {
        die("Erreur Supabase : " . $response['error']['message']);
    }
    return $response['data'];
}

function supabase_select($table, $conditions = []) {
    global $client;
    $query = $client->from($table)->select('*');
    foreach ($conditions as $col => $val) {
        $query = $query->eq($col, $val);
    }
    $response = $query->single()->execute();
    if ($response['error']) return null;
    return $response['data'];
}
