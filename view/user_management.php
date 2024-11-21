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

// Function to fetch all users
function fetchUsers($conn) {
    $stmt = $conn->prepare("SELECT user_id, fname, lname, email, role, created_at FROM users");
    $stmt->execute();
    return $stmt->get_result();
}

// Handle user creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    

    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssi", $fname, $lname, $email, $role, );
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
    $role = $_POST['role'];
    

    $stmt = $conn->prepare("UPDATE users SET fname = ?, lname = ?, email = ?, role = ?, WHERE user_id = ?");
    $stmt->bind_param("sssi", $fname, $lname, $email, $role,);
    $stmt->execute();
    header("Location: user_management.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art and Crafts Hub | User Management</title>
    <link rel="stylesheet" href="../assets/css/users.css">
    <link rel="icon" href="../assets/images/art-icon.png">
</head>
<body style="background-image: url('../assets/images/artuser.jpeg');">

    <header>
        <nav>
            <img id="icon" src="../assets/images/usericon.png" alt="User Icon">
        </nav>
    </header>

    <div class="form-container">
        <h1>User Management</h1>
        <?php if ($role == 1): ?>
            <div class="admin-section">
                <h2>Manage Users</h2>

                <!-- Form to Add New User -->
                <form method="POST" class="add-user-form">
                    <h3>Add New User</h3>
                    <input type="text" name="fname" placeholder="First Name" required>
                    <input type="text" name="lname" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <select name="role" required>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    <button type="submit" name="create_user">Add User</button>
                </form>

                <!-- Display Users in Table -->
                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userResult = fetchUsers($conn);
                        if ($userResult) {
                            while ($user = $userResult->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$user['fname']} {$user['lname']}</td>
                                        <td>{$user['email']}</td>
                                        <td>" . ($user['role'] == 1 ? 'Admin' : 'User') . "</td>
                                    
                                        <td>
                                            <form method='POST' style='display: inline-block;'>
                                                <input type='hidden' name='user_id' value='{$user['user_id']}'>
                                                <button type='submit' name='delete_user' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</button>
                                            </form>
                                            <form method='POST' style='display: inline-block;'>
                                                <input type='hidden' name='user_id' value='{$user['user_id']}'>
                                                <input type='text' name='fname' value='{$user['fname']}' required>
                                                <input type='text' name='lname' value='{$user['lname']}' required>
                                                <input type='email' name='email' value='{$user['email']}' required>
                                                <select name='role'>
                                                    <option value='1' " . ($user['role'] == 1 ? 'selected' : '') . ">Admin</option>
                                                    <option value='2' " . ($user['role'] == 2 ? 'selected' : '') . ">User</option>
                                                </select>
                                                <button type='submit' name='update_user'>Update</button>
                                            </form>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No users found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>


