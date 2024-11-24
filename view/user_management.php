<?php
// Include the database configuration file
include '../db/config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session to manage user data
session_start();

// Redirect user to login page if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
    exit;
}

// Fetch user details from session
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$role = $_SESSION['role']; // 1 for Super Admin, 2 for regular User

// Function to fetch all us ers
function fetchUsers($conn) {
    $stmt = $conn->prepare("SELECT user_id, fname, lname, email, role FROM users");
    $stmt->execute();
    return $stmt->get_result();
}

//function to fetch all the users 

function fetchArtwork($conn) {
    $stmt = $conn->prepare("SELECT artwork_id, title, art_type,image_path, created_at FROM artwork");
    $stmt->execute();
    return $stmt->get_result();
}



// Handle user creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    // Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, role) VALUES (?, ?, ?, ?, 2)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $hashedPassword);
    $stmt->execute();
    header("Location: user_management.php");
    exit;
}

// Handle user deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    header("Location: user_management.php");
    exit;
}

// Handle user update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    // Validate inputs
    if (empty($fname) || empty($lname) || empty($email)) {
        die("All fields are required for update.");
    }

    $stmt = $conn->prepare("UPDATE users SET fname = ?, lname = ?, email = ? WHERE user_id = ?");
    $stmt->bind_param("sssi", $fname, $lname, $email, $user_id);
    $stmt->execute();
    header("Location: user_management.php");
    exit;

}

    // Handle artwork deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_art'])) {
    $artwork_id = $_POST['artwork_id'];

    // Prepare and execute the deletion query
    $stmt = $conn->prepare("DELETE FROM artwork WHERE artwork_id = ?");
    $stmt->bind_param("i", $artwork_id);
    $stmt->execute();

    // Redirect after deletion
    header("Location: user_management.php"); // or the relevant page
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="icon" href="../assets/images/art-icon.png">

</head>




<body>

        <style>
            
        th {
            max-width: 500%;  /* Set a max width for column headers */
        }



        </style>
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar -->
                    <aside class="sidebar bg-light border-end vh-100 col-md-3" style="width: 200px; height: 100%; position: fixed;">

                        <nav class="nav flex-column">
                            <a class="nav-link text-dark d-flex align-items-center mb-3" href="../index.html">
                                <img src="../assets/images/home.png" alt="home" class="me-2" width="24" height=""> Home
                            </a>
                            <hr>
                            <a class="nav-link text-dark d-flex align-items-center mb-3" href="../view/showcase.php">
                                <img src="../assets/images/display.png" alt="Showcase" class="me-2" width="24" height="24"> Showcase
                            </a>
                          
                            <hr>
                            <a class="nav-link text-dark d-flex align-items-center" href="../view/reels.php">
                                <img src="../assets/images/display.png" alt="reel page" class="me-2" width="24" height="24"> Reel
                            </a>
                            <hr>
                            <a  class="nav-link text-dark d-flex align-items-center" href="../view/dashboard.php">
                                <img src="../assets/images/dashboard.png" alt="Dashboard page" class="me-2" width="24" height="24">Dashboard
                            </a>
                            <hr>
                            <a class="nav-link text-dark d-flex align-items-center" href="../view/contacts.php">
                                <img src="../assets/images/feedback.png" alt="Contact" class="me-2" width="24" height="24"> Contact
                            </a>
                            <hr>
                            <a class="nav-link text-dark d-flex align-items-center" href="#Users List">
                                <img src="../assets/images/users.png" alt="home"class="me-2" width="24" height="24"> Users
                            </a>

                            <hr>
                            
                            <a class="nav-link text-dark d-flex align-items-center" href="#UserUploadsSection">
                                <img src="../assets/images/post.png" alt="home"class="me-2" width="24" height="24"> User Artwork Uploads
                            </a>
                            <hr>

                            

                        </nav>
                    </aside>

                    <!-- Main Content -->
                    <main class="col-md-9" style="margin-left: 220px;">

                        <header class="bg-primary text-white p-3">
                        <h1 id="Users List">User Management</h1>
                        
                        </header>
                        <div class="container my-4">
                        <h2 class="text-center">Manage Users</h2>

        <!-- Form to Add New User -->
        <form method="POST" class="mb-4 p-3 border rounded">
            <h3>Add New User</h3>
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" name="create_user" class="btn btn-success mt-3">Add User</button>

        </form>



        <!-- Display Users in Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $userResult = fetchUsers($conn);
                    if ($userResult->num_rows > 0) {
                        while ($user = $userResult->fetch_assoc()) {
                            echo "<tr>
                                <td>{$user['fname']} {$user['lname']}</td>
                                <td>{$user['email']}</td>
                                <td>
                                    <form method='POST' class='d-inline'>
                                        <input type='hidden' name='user_id' value='{$user['user_id']}'>
                                        <button type='submit' name='delete_user' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</button>
                                    </form>
                                    <form method='POST' class='d-inline'>
                                        <input type='hidden' name='user_id' value='{$user['user_id']}'>
                                        <input type='text' name='fname' value='{$user['fname']}' class='form-control d-inline w-auto' required>
                                        <input type='text' name='lname' value='{$user['lname']}' class='form-control d-inline w-auto' required>
                                        <input type='email' name='email' value='{$user['email']}' class='form-control d-inline w-auto' required>
                                        <button type='submit' name='update_user' class='btn btn-primary btn-sm'>Update</button>
                                        <button type='submit' name='view_user' class='btn btn-primary btn-sm onclick='viewArtwork({$user['user_id']})'>View</button>
                                    </form>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        

        
        <h1 id="UserUploadsSection">Artwork Posts</h1>



        <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Art Type</th>
                
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all artwork from the database
            $artworkResult = fetchArtwork($conn);  // Assuming this function fetches artwork data from the DB

            if ($artworkResult->num_rows > 0) {
                // Loop through each artwork and display in the table
                while ($artwork = $artworkResult->fetch_assoc()) {
                    echo "<tr>
                            <td>{$artwork['title']}</td>
                            <td>{$artwork['art_type']}</td>
                            
                            

                            
                            <td>{$artwork['created_at']}</td>
                            <td>
                            <form method='POST' class='d-inline'>
                                    <input type='hidden' name='artwork_id' value='{$artwork['artwork_id']}'>
                                    <button type='submit' name='delete_art' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this artwork?\");'>Delete</button>
                                </form>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No artwork found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


        


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
