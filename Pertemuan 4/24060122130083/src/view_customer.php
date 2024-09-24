<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<?php include_once('../components/header.html'); ?>

<div class="bg-gray-700 text-white min-h-screen p-6">
    <div class="p-4 bg-gray-100 text-black rounded-lg shadow-md">
        <div class="text-xl font-semibold mb-4">Customer Data</div>

        <div class="mb-6">
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600" href="add_customer.php">+ Add Customer Data</a>
            <a class="bg-red-500 text-white py-2 px-4 rounded ml-4 hover:bg-red-600" href="logout.php">Logout</a>
        </div>

        <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border p-3">No</th>
                    <th class="border p-3">Name</th>
                    <th class="border p-3">Address</th>
                    <th class="border p-3">City</th>
                    <th class="border p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../lib/db_login.php');
                $query = "SELECT * FROM customers ORDER BY customerid";
                $result = $db->query($query);
                if (!$result) {
                    die("Could not query the database: <br/>" . $db->error . "<br/>Query: " . $query);
                }
                // fetch data
                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr class="text-center">';
                    echo '<td class="border p-3">' . $i . '</td>';
                    echo '<td class="border p-3">' . $row->name . '</td>';
                    echo '<td class="border p-3">' . $row->address . '</td>';
                    echo '<td class="border p-3">' . $row->city . '</td>';
                    echo '<td class="border p-3">
                            <a class="bg-yellow-400 text-white py-1 px-3 rounded hover:bg-yellow-500" href="edit_customer.php?id=' . $row->customerid . '">Edit</a> 
                            <a class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600" href="delete_customer.php?id=' . $row->customerid . '">Delete</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</tbody>';
                echo '</table>';
                echo '<br/>';
                echo 'Total Rows = ' . $result->num_rows;
                $result->free();
                $db->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

