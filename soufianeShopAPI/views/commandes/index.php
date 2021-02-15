<?php include "../gabarit-top.php";
include '../../vendor/autoload.php';

use Automattic\WooCommerce\Client;

if (!isset($_SESSION['CK'])) { ?>
    <script>
        window.location.replace('/soufianeShopAPI/views/login.php');
    </script>
<?php
}


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
//$data = file_get_contents('http://localhost:8070/soufianeShopAPI/models/products/allproducts.php');
$data = json_decode(json_encode($woocommerce->get('orders')), true);
?>
<div class="card-header">
    <h3 class="card-title" style="font-size:30px;"><strong>Liste des commandes</strong></h3>
</div>

<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Commande</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Paiement</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td>
                        <?= $row['number']; ?>
                        <strong><?= $row['billing']['first_name']; ?>
                            <?= $row['billing']['last_name']; ?></strong>
                    </td>
                    <td><?= $row['date_created']; ?></td>
                    <?php if ($row['status'] == "completed") : ?>
                        <td class="alert alert-success"><?= $row['status']; ?></td>
                    <?php elseif ($row['status'] == "processing") : ?>
                        <td class="alert alert-info"><?= $row['status']; ?></td>
                    <?php else : ?>
                        <td class="alert alert-danger"><?= $row['status']; ?></td>
                    <?php endif; ?>
                    <td><strong><?= $row['total']; ?> <?= $row['currency']; ?></strong></td>
                    <?php if ($row['payment_method_title'] == "PayPal") : ?>
                        <td><img src="../../images/PayPal-Logo.png" /></td>

                    <?php elseif ($row['payment_method_title'] != "PayPal") : ?>
                        <td><img style="
    height: 108px;
" src="../../images/cash.png" /></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?php include "../gabarit-bottom.php" ?>