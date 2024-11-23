<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Showcase - Art and Crafts Hub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h2>Arts and Crafts hub</h2>

            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="../index.html" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="../view/reels.php" class="nav-link text-white">Arts Reels</a></li>
                    <li class="nav-item"><a href="../view/dashboard.php" class="nav-link text-white">Dashboard</a></li>
                    <li class="nav-item"><a href="contacts.php" class="nav-link text-white">Contacts</a></li>
                    <li class="nav-item"><a href="../view/about_page.php" class="nav-link text-white">About Us </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container my-5">
        <section class="text-center mb-5">
            <h1>Explore Artwork You'll <span class="text-primary">Love</span></h1>
            <p class="text-muted">Craft Your Way: Explore a World of Creativity</p>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" id="searchInput" placeholder="Search for artwork...">
            </div>
        </section>

        <section>
            <h2 class="mb-4">Paintings</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col artwork-card" data-title="Sunset nature" data-artist="Garo_garo" data-category="Painting">
                    <div class="card h-100">
                        <img src="../assets/images/art7.jpeg" class="card-img-top" alt="wall painting">
                        <div class="card-body">
                            <h5 class="card-title">Sunset nature</h5>
                            <p class="card-text text-muted">By Garo_garo</p>
                            <button class="btn btn-primary btn-sm view-details" 
                                    data-title="Sunset nature"
                                    data-artist="Garo_garo"
                                    data-category="Painting"
                                    data-description="A breathtaking sunset painting that captures the beauty of nature in warm, vibrant colors. The artist uses masterful brushwork to create a sense of depth and atmosphere."
                                    data-medium="Oil on canvas"
                                    data-dimensions="24 x 36 inches"
                                    data-year="2023">View Details</button>
                        </div>
                    </div>
                </div>

                <div class="col artwork-card" data-title="Timeless Grace" data-artist="Mensah Kevin" data-category="Painting">
                    <div class="card h-100">
                        <img src="../assets/images/art3.jpg" class="card-img-top" alt="Timeless Grace">
                        <div class="card-body">
                            <h5 class="card-title">Timeless Grace</h5>
                            <p class="card-text text-muted">By Mensah Kevin</p>
                            <button class="btn btn-primary btn-sm view-details" 
                                    data-title="Timeless Grace"
                                    data-artist="Mensah Kevin"
                                    data-category="Painting"
                                    data-description="A stunning artwork that exemplifies timeless beauty and grace through its composition."
                                    data-medium="Oil on canvas"
                                    data-dimensions="24 x 36 inches"
                                    data-year="2023">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section >
            <h2 class="mb-4">Pottery</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col artwork-card" data-title="Timeless Grace" data-artist="Mensah Kevin" data-category="Painting">
                    <div class="card h-100">
                        <img src="../assets/images/art5.jpg" class="card-img-top" alt="Timeless Grace">
                        <div class="card-body">
                            <h5 class="card-title">Ceramic Pots </h5>
                            <p class="card-text text-muted">By Mensah Kevin</p>
                            <button class="btn btn-primary btn-sm view-details" 
                                    data-title="Pots of life"
                                    data-artist="Mensah Kevin"
                                    data-category="Pottery"
                                    data-description="This pottery, often referred to as the Pot of Life, symbolizes the vessel that holds both the beauty and essence of existence.
                                     Its form represents the nurturing qualities of life, capturing the delicate balance between strength and grace."
                                    data-medium="Pot of life"
                                    data-dimensions="24 x 36 inches"
                                    data-year="2023">View Details</button>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </section>
    <section>
    <h2 class="mb-4">Photography</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col artwork-card" data-title="Timeless Grace" data-artist="Mensah Kevin" data-category="Photography">
            <div class="card h-100">
                <img src="../assets/images/photography.jpeg" class="card-img-top" alt="Timeless Grace">
                <div class="card-body">
                    <h5 class="card-title">Photography</h5>
                    <p class="card-text text-muted">By Mensah Kevin</p>
                    <button class="btn btn-primary btn-sm view-details" 
                            data-title="Essence of Time"
                            data-artist="Mensah Kevin"
                            data-category="Photography"
                            data-description="This photograph, titled 'Essence of Time,' captures the intricate details of life's enduring elements. The image reflects the profound relationship between time, nature, and culture, preserving moments that tell stories of strength and elegance."
                            data-medium="Photography"
                            data-dimensions="24 x 36 inches"
                            data-year="2023">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Timeless Grace" data-artist="Mensah Kevin" data-category="Photography">
            <div class="card h-100">
                <img src="../assets/images/photo1.jpeg" class="card-img-top" alt="Timeless Grace">
                <div class="card-body">
                    <h5 class="card-title">Photography</h5>
                    <p class="card-text text-muted">By Mensah Kevin</p>
                    <button class="btn btn-primary btn-sm view-details" 
                            data-title="Essence of Time"
                            data-artist="Mensah Kevin"
                            data-category="Photography"
                            data-description="This photograph, titled 'Essence of Time,' captures the intricate details of life's enduring elements. The image reflects the profound relationship between time, nature, and culture, preserving moments that tell stories of strength and elegance."
                            data-medium="Photography"
                            data-dimensions="24 x 36 inches"
                            data-year="2023">View Details</button>
                </div>
            </div>
        </div>
    </div>

    
</section>


        <section class="mt-5">
                    <h2 class="mb-4">Digital Art</h2>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col artwork-card" data-title="Beads of Heritage" data-artist="Mensah Kevin" data-category="Crafts">
                    <div class="card h-100">
                    <img src="../assets/images/indigenous.jpg" class="card-img-top" alt="Beads of Heritage">
                    <div class="card-body">
                        <h5 class="card-title">Revolution of Digital Art</h5>
                        <p class="card-text text-muted">By Mensah Kevin</p>
                        <button class="btn btn-primary btn-sm view-details" 
                                data-title="ArtDigit"
                                data-artist="Mensah Kevin"
                                data-category="Digital Art "
                                data-description= "This digital artwork, titled ArtDigit explores the fusion of traditional cultural elements with modern digital expression. 
                                Through intricate designs and vibrant colors, it reflects the deep connection between past traditions and contemporary digital art forms, preserving cultural heritage in a new medium."


                                data-medium="Digital Tools"
                                data-dimensions="Varied sizes"
                                data-year="2023">View Details</button>
                    </div>
                </div>
            </div>
            </div>

        </section>

        <section class="mt-5">
            <h2 class="mb-4">Crafts</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col artwork-card" data-title="Beads of Heritage" data-artist="Mensah Kevin" data-category="Crafts">
            <div class="card h-100">
            <img src="../assets/images/download (3).jpeg" class="card-img-top" alt="Beads of Heritage">
            <div class="card-body">
                <h5 class="card-title">Beads of Heritage</h5>
                <p class="card-text text-muted">By Mensah Kevin</p>
                <button class="btn btn-primary btn-sm view-details" 
                        data-title="Beads of Heritage"
                        data-artist="Mensah Kevin"
                        data-category="Crafts"
                        data-description="This craft piece, titled 'Beads of Heritage,' showcases the beauty and significance of indigenous beadwork. The intricate designs tell stories of cultural identity, craftsmanship, and ancestral traditions passed down through generations."
                        data-medium="Beads"
                        data-dimensions="Varied sizes"
                        data-year="2023">View Details</button>
            </div>
        </div>
    </div>
    </div>

        </section>
    </main>
            <!-- Modal for artwork details -->
            <div class="modal fade" id="artworkModal" tabindex="-1" aria-labelledby="artworkModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="artworkModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img id="modalImage" src="" alt="" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted" id="modalArtist"></h6>
                                <p class="mt-3" id="modalDescription"></p>
                                <div class="mt-4">
                                    <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                                    <p><strong>Medium:</strong> <span id="modalMedium"></span></p>
                                    <p><strong>Dimensions:</strong> <span id="modalDimensions"></span></p>
                                    <p><strong>Year:</strong> <span id="modalYear"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-3 text-center">
        <p>© 2024 Art and Crafts Hub. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>




 

        <!-- Artwork sections here - keeping the same structure but adding data attributes -->
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.artwork-card').forEach(card => {
                const title = card.getAttribute('data-title').toLowerCase();
                const artist = card.getAttribute('data-artist').toLowerCase();
                const category = card.getAttribute('data-category').toLowerCase();
                
                if (title.includes(searchTerm) || artist.includes(searchTerm) || category.includes(searchTerm)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });

        // Modal functionality
        const artworkModal = new bootstrap.Modal(document.getElementById('artworkModal'));
        
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function() {
                const data = this.dataset;
                
                // Update modal content
                document.getElementById('artworkModalLabel').textContent = data.title;
                document.getElementById('modalArtist').textContent = `By ${data.artist}`;
                document.getElementById('modalDescription').textContent = data.description;
                document.getElementById('modalCategory').textContent = data.category;
                document.getElementById('modalMedium').textContent = data.medium;
                document.getElementById('modalDimensions').textContent = data.dimensions;
                document.getElementById('modalYear').textContent = data.year;
                
                // Get the image from the card
                const cardImage = this.closest('.card').querySelector('.card-img-top');
                document.getElementById('modalImage').src = cardImage.src;
                
                artworkModal.show();
            });
        });
    </script>
</body>
</html>
