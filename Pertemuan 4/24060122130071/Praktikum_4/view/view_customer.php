<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 20 September 2024-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4EA;
        }
        .card {
            margin: 0px auto;
            padding: 30px auto;
            max-width: 3465px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #227B94;
            color: #fff;
            font-size: 1.5rem;
        }
        .btn-primary {
            margin-bottom: 0px;
            background-color: #16325B;
            border-color: #16325B;
        }
        table th, table td {
            vertical-align: middle;
            text-align: center;
        }
        table thead th {
            border-color:  #227B94 !important;;
            background-color: #227B94 !important; 
            color: #fff;
        }
        .btn-action {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>Daftar Pelanggan</h1>
        </div>
    </div>
    <div class="card-body">
            <div style="text-align: right;">
                <a href="logout.php" class="btn btn-primary">Keluar</a>
            </div>
            <div style="text-align: left;">
                <a class="btn btn-primary" href="add_customer.php">+ Tambah Pelanggan</a><br />
            </div>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Memulai sesi
                        session_start();
                        // ngecek user nya udah loginn belom
                        if (!isset($_SESSION['username'])) {
                            header('Location: login.php');
                        }
                        require_once('../lib/db_login.php');
                        $query = "SELECT customerid, name, address, city FROM customers ORDER BY customerid";
                        $result = $conn->query($query);
                        if (!$result) {
                            die ("Could not query the database: <br />". $conn->error);
                        }
                        $no = 1;
                        while ($row = $result->fetch_object()) {
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td>".$row->name."</td>";
                            echo "<td>".$row->address."</td>";
                            echo "<td>".$row->city."</td>";
                            echo "<td class='btn-action'>
                                    <a href='edit_customer.php?id=".$row->customerid."' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_customer.php?id=".$row->customerid."' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
