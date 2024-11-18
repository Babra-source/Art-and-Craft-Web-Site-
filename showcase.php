<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Showcase - Art and Crafts Hub</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Additional styles for the like button, upload button, and fade animations */
        .like-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-size: 1.5em;
            color: #ff6b6b;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .like-button.active {
            color: #ff3b3b;
            transform: scale(1.1);
        }
        .upload-button {
            display: block;
            margin: 1em auto;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .artwork-card {
            opacity: 1;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="logo">
           
            <img src="logo-removebg-preview (1).png" alt="Arts and Crafts Hub Logo">
            
        </div>
        <nav>
            <ul>
                <li><a href="Homepage.html">Home</a></li>
                <li><a href="creators-hub.html">Creators Hub</a></li>
                <li><a href="connect.html">Connect</a></li>
                <li><a href="contacts.html">Contacts</a></li>
            </ul>
        </nav>
    </header>

    <main class="showcase-container">
        <section class="hero-section">
            <h1 class="main-title">Find artwork you'll <span class="highlight">Love</span></h1>
            <p class="subtitle">Craft Your Way: Explore a World of Creativity</p>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Search for artwork..." class="search-input">
            </div>

            
            <!-- Upload Button -->
            <button class="upload-button">Upload New Artwork</button>
        </section>

        <section class="artwork-grid">
            <!-- Artwork Card 1 -->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art5.jpg" alt="Ceramic Pot">
                    
                    <div class="overlay">
                        <p>Beautifully handcrafted, this ceramic pot adds a touch of elegance to any space. Its smooth matte finish and earthy tones make it perfect for both plants and décor.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Ceramic Pot</h3>
                    <p class="artist">by Sandra Darko</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>

            <!-- Artwork Card 2 -->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art3.jpg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Stunning portrait of a woman, capturing timeless beauty and emotion. With rich colors and intricate details, this painting brings elegance and depth to any room.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Timeless Grace</h3>
                    <p class="artist">by Mensah Kevin</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>


            <!-- Artwork Card 3 -->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art1.jpg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Bold and striking, this skull painting combines dark elegance with intricate detail. The powerful imagery evokes mystery and reflection, making it a captivating statement piece for any modern or eclectic space.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>
                    
                </div>
                <div class="card-content">
                    <h3>Artistic skull</h3>
                    <p class="artist">by Budud Yaw</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                    
                </div>
            </article>


            <!-- Artwork Card 4 -->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art2.jpg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Guardian of the Shore" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>

            
            <!-- Artwork Card 5 -->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="Mystical.jpg" alt="Mystical">
                    
                    <div class="overlay">
                        <p>"Mystical" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>

            
            <!-- Artwork Card 6-->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art2.jpg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Guardian of the Shore" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>

            
            <!-- Artwork Card 7-->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art2.jpg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Guardian of the Shore" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>


            
            <!-- Artwork Card 8-->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="art2.jpg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Guardian of the Shore" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>


            
            <!-- Artwork Card 9-->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="artwork.jpeg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>Guardian of the Shore" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>


            
            <!-- Artwork Card 10-->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="indigenous.jpeg" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>indigenous" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>


            
            <!-- Artwork Card 11-->
            <article class="artwork-card">
                <div class="image-container">
                    <img src="resin bowl.png" alt="Timeless Grace">
                    
                    <div class="overlay">
                        <p>The resin bowl" is a striking artwork by Ebele Nwosu, a contemporary artist celebrated for her powerful representations of African womanhood and nature. Her work explores themes of strength, motherhood, and a deep connection to the earth, blending cultural symbolism with vivid landscapes to evoke deep emotions.</p>
                    </div>

                    <button class="like-button">
                        <i class="fas fa-heart"></i>
                    </button>

                </div>
                <div class="card-content">
                    <h3>Guardian of the Shore</h3>
                    <p class="artist">by Mercy Chidera</p>
                    <div class="rating">
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star active">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </article>

        </section>
    </main>

    <script>
        // Like button functionality
        document.querySelectorAll('.like-button').forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });
    
        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-input');
            const artworkCards = document.querySelectorAll('.artwork-card');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase().trim();

                artworkCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const artist = card.querySelector('.artist').textContent.toLowerCase();
                    const description = card.querySelector('.overlay p').textContent.toLowerCase();
                    const searchableContent = ${title} ${artist} ${description};

                    if (searchTerm === '' || searchableContent.includes(searchTerm)) {
                        card.style.display = 'block';
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Upload Button functionality (as a placeholder)
        document.querySelector('.upload-button').addEventListener('click', function() {
            alert("Upload New Artwork functionality coming soon!");
        });
    </script>
</body>
</html>