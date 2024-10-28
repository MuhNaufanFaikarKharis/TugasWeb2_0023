<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Center the form and add a shadow */
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Form heading */
        h1 {
            font-size: 2rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Label styling */
        .form-label {
            font-weight: bold;
            color: #555;
        }

        /* Input focus effect */
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            transition: all 0.2s ease;
        }

        /* Button styling and transition */
        .btn-primary, .btn-secondary {
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: bold;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.3);
        }

        .btn-secondary:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(108, 117, 125, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="index.php?action=edit&id=<?php echo htmlspecialchars($user['id']); ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

