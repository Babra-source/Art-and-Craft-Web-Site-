<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Art and Craft Hub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>


<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="../index.html" class="navbar-brand">The Arts and Crafts Hub</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="../index.html" class="nav-link">Home Page</a></li>
                        <li class="nav-item"><a href="showcase.php" class="nav-link">Showcase</a></li>
                        <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="reels.php" class="nav-link">Reels</a></li>
                        <li class="nav-item"><a href="contacts.php" class="nav-link">Contacts</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="about py-5">
        <section class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h1>About Us</h1>
                    <p>
                        Welcome to <strong>The Art and Craft Hub</strong>—a platform designed for creative individuals 
                        to showcase their work, learn new techniques, and connect with like-minded enthusiasts.
                        We are dedicated to celebrating creativity and fostering an inspiring community where 
                        every art form has a space to shine.
                    </p>
                </div>
            </div>

            <section class="team text-center">
                <h2>Meet the Founders</h2>
                <div class="row">
                    <!-- Left side -->
                    <div class="col-md-6 text-start d-flex flex-column align-items-start">
                        <div class="team-member mb-4">
                            <img src="../assets/images/anna.jpg" alt="Anna Kodji" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                            <h3>Anna Kodji</h3>
                            <p><strong>Role:</strong> Database development</p>
                            <p>
                                Anna sets up the database with related information about the Hub:
                                user details, comments, contacts, contact messages, reels as well as daily uploads.
                            </p>
                        </div>
                        <div class="team-member">
                            <img src="../assets/images/lovette.jpg" alt="Lovette Philips" class="img-fluid rounded-circle mb-3" style="width: 170px;" height="90px">
                            <h3>Lovette Philips</h3>
                            <p><strong>Role:</strong> Community Builder</p>
                            <p>
                                Lovette connects with artisans, organizing workshops, and curating events to bring 
                                the community closer. Passionate about art education, Lovette plays a key role in fostering 
                                meaningful relationships between creators.
                            </p>
                        </div>
                    </div>
                    <!-- Right side -->
                    <div class="col-md-6 text-end d-flex flex-column align-items-end">
                        <div class="team-member mb-4">
                            <img src="../assets/images/Smart.jpg" alt="Ernest Smart" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                            <h3>Ernest Smart</h3>
                            <p><strong>Role:</strong> Backend development</p>
                            <p>
                                Ernest partners with other members of the team in overseeing the full functionality of the Arts and Crafts Hub website;
                                adopting CRUD functionalities in PHP and connecting the backend to the database.
                            </p>
                        </div>
                        <div class="team-member">
                            <img src="../assets/images/Beatrice.jpg" alt="Beatrice Abraham" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                            <h3>Beatrice Abraham</h3>
                            <p><strong>Role:</strong> Project Manager</p>
                            <p>
                                Beatrice supervises and is very assistive in ensuring that members of the team are able to understand the task and work accordingly.
                                She also chimes in to assist both frontend and backend development.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mission mt-5 text-center">
                <h2>Our Mission</h2>
                <p>
                    At The Art and Craft Hub, we aim to:
                </p>
                <ul class="list-unstyled">
                <li>Provide a platform that empowers creators to display their unique talents.</li>
                <li>Inspire both artists and enthusiasts to appreciate the creativity and thought behind every piece of art.</li>
                <li>Foster a community where individuals can engage, share their love for art, and offer feedback.</li>
                </ul>
            </section>
        </section>
    </main>

    <footer class="footer text-center py-3">
        <p>&copy; 2024 The Arts and Crafts Hub. All rights reserved.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
