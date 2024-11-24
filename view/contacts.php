
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Crafts | Contacts</title>
    <link rel="stylesheet" href="../assets/css/contacts.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../view/dashboard.php">Dashboard</a></li>
                <li><a href="../view/showcase.php">Showcase</a></li>
                <li><a href="../view/reels.php">Arts Reels</a></li>
                <li><a href="../view/about_page.php">About Us</a></li>
             

            </ul>
        </nav>
    </header>

    <section class="contact-info">
        <h2>Get in Touch</h2>
        <p>If you have any questions or need more information, feel free to reach out to us!</p>


    </section>

    <section class="contact-form">
        <h2>Contact Form</h2>
        <form action="../actions/contact_process.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your Name" required >

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email " required >

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required placeholder="Your Message"></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>  

</body>
</html>
