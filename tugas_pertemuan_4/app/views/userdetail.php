
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Animasi fade-in */
        @keyframes fadeInCard {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi hover untuk tombol */
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
        }

        /* Styling kartu */
        .user-detail-card {
            max-width: 500px;
            border: none;
            border-radius: 25px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeInCard 0.8s ease-in-out;
            background-color: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hover efek untuk kartu */
        .user-detail-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }

        /* Header gradien */
        .card-header {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            padding: 1.5rem 1rem;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            text-align: center;
            color: #fff;
        }

        .card-header h3 {
            font-size: 1.6em;
            font-weight: bold;
        }

        /* Isi kartu */
        .card-body {
            padding: 2rem;
            color: #333;
        }

        .card-body p {
            font-size: 1.1em;
            margin: 0.5em 0;
            transition: color 0.3s ease;
        }

        .card-body p:hover {
            color: #007bff;
        }

        /* Tombol */
        .btn {
            border-radius: 20px;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card user-detail-card">
            <div class="card-header">
                <h3>User Detail</h3>
            </div>
            <div class="card-body">
                <?php if ($user): ?>
                    <p><strong>ID: <?php echo $user['id']; ?></p></strong>
                    <p><strong>Name: <?php echo $user['name']; ?></p></strong>
                    <p><strong>Email: <?php echo $user['email']; ?></p></strong>
                <?php else: ?>
                    <p class="text-danger">User tidak ditemukan.</p>
                <?php endif; ?>
                <a href="index.php" class="btn btn-primary mt-3">Back to User List</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
