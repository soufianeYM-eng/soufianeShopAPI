<?php

require '../../vendor/autoload.php';

use Automattic\WooCommerce\Client;

session_start();
//$ck = 'ck_6617d47f39d13dd8e6b21dc61534da672d96735c';
//$cs = 'cs_298c82de74daaed8cde720686f2f8324990fbe2f';
$woocommerce = new Client(
    'http://localhost:8070/shop/',
    $_SESSION['CK'],
    $_SESSION['CS'],
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true,
    ]
);

if (isset($_POST['submit_export'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Allproducts.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('Id', 'Nom', 'Slug', 'Date Creation', 'Status', 'Prix', 'image'));
    $data = json_decode(json_encode($woocommerce->get('products', ['per_page' => 100])), true);

    foreach ($data as $row) {
        $image = '';
        foreach ($row['images'] as $data) {
            foreach ($data as $key => $value) {
                if ($key = 'src' and strpos($value, 'jpg') != false) {
                    $image = $value;
                }
            }
        }
        $array = array($row['id'], $row['name'], $row['slug'], $row['date_created'], $row['status'], $row['price'], $image);
        fputcsv($output, $array);
    }
    fclose($output);
}
