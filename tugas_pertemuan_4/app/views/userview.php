<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: blue;
            color: #fff;
            font-size: 1.5em;
            font-weight: bold;
        }

        .table thead th {
            background-color: #343a40;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn {
            border-radius: 20px;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        tbody tr {
            opacity: 0;
            animation: fadeInRow 0.6s forwards;
            animation-delay: calc(0.1s * var(--delay));
        }

        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        tbody tr:nth-child(1) { --delay: 1; }
        tbody tr:nth-child(2) { --delay: 2; }
        tbody tr:nth-child(3) { --delay: 3; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white text-center">
                <h3>User List</h3>
            </div>
            <div class="card-body">
                <!-- Search input -->
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search by ID or First Name...">
                </div>

                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userTable">
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <a href="index.php?action=detail&id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
                                    <a href="index.php?action=edit&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for search functionality -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toUpperCase();
            let rows = document.querySelectorAll('#userTable tr');

            rows.forEach(row => {
                let id = row.cells[0].textContent.toUpperCase();
                let fullName = row.cells[1].textContent.toUpperCase();
                let firstName = fullName.split(' ')[0]; // Ambil Nama Depan

                // Cek apakah filter ada di ID atau Nama Depan
                if (id.includes(filter) || firstName.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
