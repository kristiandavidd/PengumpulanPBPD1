<?php include('../components/header.html') ?>

<div class="bg-gray-700 text-white min-h-screen p-6">
    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-md max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Data Buku</h2>

        <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border p-3">ISBN</th>
                    <th class="border p-3">Author</th>
                    <th class="border p-3">Title</th>
                    <th class="border p-3">Price</th>
                    <th class="border p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include our login information
                require_once('../lib/db_login.php');

                // TODO 1: Tuliskan dan eksekusi query
                $query = "SELECT * FROM books ORDER BY isbn";
                $result = $db->query($query);
                // Fetch and display the results
                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr class="text-center">';
                    echo '<td class="border p-3">' . $row->isbn . '</td>';
                    echo '<td class="border p-3">' . $row->author . '</td>';
                    echo '<td class="border p-3">' . $row->title . '</td>';
                    echo '<td class="border p-3">$' . $row->price . '</td>';
                    echo '<td class="border p-3"><a class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>

        <div class="mt-6">
            Jumlah Buku: <?php echo $result->num_rows ?>
        </div>
    </div>
</div>

