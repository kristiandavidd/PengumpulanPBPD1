<?php
// File         : show_cart.php
// Deskripsi    : Untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart

session_start();
error_reporting(0);

$id = $_GET['id'];
if ($id != '') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}
?>
<?php include('../components/header.html') ?>

<div class="bg-gray-700 text-white min-h-screen p-6">
    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-md max-w-4xl mx-auto">
        <h2 class="text-xl font-semibold mb-4">Shopping Cart</h2>

        <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md mb-4">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border p-3">ISBN</th>
                    <th class="border p-3">Author</th>
                    <th class="border p-3">Title</th>
                    <th class="border p-3">Price</th>
                    <th class="border p-3">Qty</th>
                    <th class="border p-3">Price * Qty</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../lib/db_login.php');
                $sum_qty = 0;
                $sum_price = 0;

                if (is_array($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id => $qty) {

                        // Tuliskan dan eksekusi query
                        $query = "SELECT * FROM books WHERE isbn = '" . $id . "'";
                        $result = $db->query($query);
                        while ($row = $result->fetch_object()) {
                            echo '<tr class="text-center">';
                            echo '<td class="border p-3">' . $row->isbn . '</td>';
                            echo '<td class="border p-3">' . $row->author . '</td>';
                            echo '<td class="border p-3">' . $row->title . '</td>';
                            echo '<td class="border p-3">$' . $row->price . '</td>';
                            echo '<td class="border p-3">' . $qty . '</td>';
                            echo '<td class="border p-3">$' . $row->price * $qty . '</td>';
                            echo '</tr>';

                            $sum_qty += $qty;
                            $sum_price += ($row->price * $qty);
                        }
                    }
                    echo '<tr>';
                    echo '<td colspan="5" class="border p-3 text-right font-semibold">Total Price</td>';
                    echo '<td class="border p-3 text-center font-semibold">$' . $sum_price . '</td>';
                    echo '</tr>';
                    $result->free();
                    $db->close();
                } else {
                    echo '<tr><td colspan="6" class="text-center p-3">There is no item in shopping cart</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="text-center">
            Total items = <?php echo $sum_qty ?><br><br>
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600" href="view_books.php">Continue Shopping</a>
            <a class="bg-red-500 text-white py-2 px-4 rounded ml-4 hover:bg-red-600" href="delete_cart.php">Empty Cart</a>
        </div>
    </div>
</div>

