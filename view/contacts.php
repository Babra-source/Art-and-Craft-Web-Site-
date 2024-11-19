<?php
// submit-contact.php
require_once 'config.php';  

class ContactFormHandler {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    private function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    private function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function submitContactMessage($name, $email, $message) {
        // Input validation
        $name = $this->sanitizeInput($name);
        $email = $this->sanitizeInput($email);
        $message = $this->sanitizeInput($message);

        // Validate inputs
        $errors = [];
        
        if (empty($name)) {
            $errors[] = "Name is required";
        }

        if (!$this->validateEmail($email)) {
            $errors[] = "Invalid email format";
        }

        if (empty($message)) {
            $errors[] = "Message is required";
        }

        // If validation fails, return errors
        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        // Prepare SQL statement
        $stmt = $this->conn->prepare("INSERT INTO contact_messages (name, email, message_content) VALUES (?, ?, ?)");
        
        if (!$stmt) {
            return [
                'success' => false,
                'errors' => ["Database error: " . $this->conn->error]
            ];
        }

        $stmt->bind_param("sss", $name, $email, $message);
        
        try {
            $result = $stmt->execute();

            if ($result) {
                // Optional: Send email notification
                $this->sendAdminNotification($name, $email, $message);
                
                return [
                    'success' => true,
                    'message' => "Your message has been sent successfully!"
                ];
            } else {
                return [
                    'success' => false,
                    'errors' => ["Failed to submit message. Please try again."]
                ];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [
                'success' => false,
                'errors' => ["An unexpected error occurred."]
            ];
        } finally {
            $stmt->close();
        }
    }

    private function sendAdminNotification($name, $email, $message) {
        $to = "info@artsandcrafts.com";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: website@artsandcrafts.com";

        @mail($to, $subject, $body, $headers);
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use the existing database connection from config.php
    $handler = new ContactFormHandler($conn);
    
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $result = $handler->submitContactMessage($name, $email, $message);

    if ($result['success']) {
        // Redirect with success message
        header("Location: contacts.html?status=success");
        exit();
    } else {
        // Redirect with error messages
        $errorString = urlencode(implode(', ', $result['errors']));
        header("Location: contacts.html?status=error&message=" . $errorString);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Crafts | Contacts</title>
    <link rel="stylesheet" href="assets/css/contacts.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <ul>
                <!--<li><a href="Homepage.html">Home</a></li>-->
                <li><a href="showcase.php">Showcase</a></li>
                <li><a href="creatorshub.php">Creators Hub</a></li>
                <li><a href="connect.php">Connect</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul>
        </nav>
    </header>

    <section class="contact-info">
        <h2>Get in Touch</h2>
        <p>If you have any questions or need more information, feel free to reach out to us!</p>

        <ul>
            <li>Email: <a href="mailto:info@artsandcrafts.com">info@artsandcrafts.com</a></li>
            <li>Phone: +1 234 567 890</li>
            <li>Address: 123 Art Street, Creative City, ABC 123</li>
        </ul>
    </section>

    <section class="contact-form">
        <h2>Contact Form</h2>
        <form action="/submit-contact" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>  

</body>
</html>
