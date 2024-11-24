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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
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
            <!-- <img src="../assets/images/newlogo.avif" alt="Logo" style="height: 50px;"> -->
            <!-- <style>
                img{
                    height: 500%;
                    width: 10%;
                }
            </style> -->
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="../index.html" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="../view/dashboard.php" class="nav-link text-white">Dashboard</a></li>
                    <li class="nav-item"><a href="../view/reels.php" class="nav-link text-white">Arts Reels</a></li>
                    <li class="nav-item"><a href="contacts.php" class="nav-link text-white">Contacts</a></li>
                    <li class="nav-item"><a href="../view/about_page.php" class="nav-link text-white">About Us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Add Modal for Artwork Details -->
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
                            <img id="modalImage" src="" alt="Artwork" class="img-fluid rounded">
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

    <main class="container my-5">
        <!-- Search section remains the same -->

        <section>
            <h2 class="mb-4">Paintings</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col artwork-card" data-title="Sunset Nature" data-artist="Garo_garo" data-category="Painting">
                    <div class="card h-100">
                        <img src="../assets/images/art7.jpeg" class="card-img-top" alt="wall painting">
                        <div class="card-body">
                            <h5 class="card-title">Sunset nature</h5>
                            <p class="card-text text-muted">By Garo_garo</p>
                            <button class="btn btn-primary btn-sm view-details"
                                data-title="Sunset Nature"
                                data-artist="Garo_garo"
                                data-category="Painting"
                                data-description="A mesmerizing capture of nature's beauty at sunset, featuring warm hues and peaceful landscapes that evoke a sense of tranquility."
                                data-medium="Oil on Canvas"
                                data-dimensions="30 x 40 inches"
                                data-year="2023">View Details</button>
                        </div>
                    </div>
                </div>


                <!-- Example for the next card -->
                <div class="col artwork-card" data-title="Carer" data-artist="Mensah_00" data-category="Painting">
                    <div class="card h-100">
                        <img src="../assets/images/art2.jpg" class="card-img-top" alt="painting">
                        <div class="card-body">
                            <h5 class="card-title">Carer</h5>
                            <p class="card-text text-muted">By Mensah_00</p>
                            <button class="btn btn-primary btn-sm view-details"
                                data-title="Carer"
                                data-artist="Mensah_00"
                                data-category="Painting"
                                data-description="An emotional portrayal of care and compassion, depicting the tender moments of human connection and support."
                                data-medium="Acrylic on Canvas"
                                data-dimensions="24 x 36 inches"
                                data-year="2023">View Details</button>
                        </div>
                    </div>
                </div>


                <!-- Example for the next card -->
                <div class="col artwork-card" data-title="Carer" data-artist="Mensah_00" data-category="Painting">
                    <div class="card h-100">
                        <img src="../assets/images//download (6).jpeg" class="card-img-top" alt="painting">
                        <div class="card-body">
                            <h5 class="card-title">Carer</h5>
                            <p class="card-text text-muted">By Mensah_00</p>
                            <button class="btn btn-primary btn-sm view-details"
                                data-title="Artistic"
                                data-artist="Mensah_00"
                                data-category="Painting"
                                data-description="Nature of the community pictured in an artistic eye ."
                                data-medium="Acrylic on Canvas"
                                data-dimensions="24 x 36 inches"
                                data-year="2023">View Details</button>
                        </div>
                    </div>
                </div>

                <!-- Continue this pattern for all artwork cards -->
            </div>
        </section>

        <section class="mt-5">
    <h2 class="mb-4">Sculpture</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col artwork-card" data-title="Wooden mortar-pestle" data-artist="Bilaiz" data-category="Sculpture">
            <div class="card h-100">
                <img src="../assets/images/download (4).jpeg" class="card-img-top" alt="mortar">
                <div class="card-body">
                    <h5 class="card-title">Wooden mortar-pestle</h5>
                    <p class="card-text text-muted">By Bilaiz</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Wooden mortar-pestle"
                        data-artist="Bilaiz"
                        data-category="Sculpture"
                        data-description="Hand-carved wooden mortar and pestle set, crafted with precision to combine traditional functionality with artistic beauty."
                        data-medium="Carved Wood"
                        data-dimensions="12 x 8 inches"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Wooden spoon" data-artist="Bilaiz" data-category="Sculpture">
            <div class="card h-100">
                <img src="../assets/images/spoon.jpeg" class="card-img-top" alt="spoon">
                <div class="card-body">
                    <h5 class="card-title">Wooden spoon</h5>
                    <p class="card-text text-muted">By Bilaiz</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Wooden spoon"
                        data-artist="Bilaiz"
                        data-category="Sculpture"
                        data-description="Elegantly crafted wooden spoon featuring smooth curves and intricate detailing, perfect blend of functionality and artistic design."
                        data-medium="Carved Wood"
                        data-dimensions="10 inches length"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Resin Bowl" data-artist="Artex" data-category="Sculpture">
            <div class="card h-100">
                <img src="../assets/images/resin bowl.png" class="card-img-top" alt="bowl">
                <div class="card-body">
                    <h5 class="card-title">Resin Bowl</h5>
                    <p class="card-text text-muted">By Artex</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Resin Bowl"
                        data-artist="Artex"
                        data-category="Sculpture"
                        data-description="Modern resin bowl with stunning color patterns and translucent effects, merging contemporary design with practical functionality."
                        data-medium="Epoxy Resin"
                        data-dimensions="8 inch diameter"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="The vase" data-artist="Artex" data-category="Sculpture">
            <div class="card h-100">
                <img src="../assets/images/download (1).jpeg" class="card-img-top" alt="case">
                <div class="card-body">
                    <h5 class="card-title">The vase</h5>
                    <p class="card-text text-muted">By Artex</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="The vase"
                        data-artist="Artex"
                        data-category="Sculpture"
                        data-description="Elegant ceramic vase with unique form and texture, showcasing traditional pottery techniques with a contemporary twist."
                        data-medium="Ceramic"
                        data-dimensions="15 inches height"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<br>
<section class="mt-5">
    <h2 class="mb-4">Photography</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col artwork-card" data-title="Photo_1" data-artist="Cripx media" data-category="Photography">
            <div class="card h-100">
                <img src="../assets/images/photography.jpeg" class="card-img-top" alt="photo">
                <div class="card-body">
                    <h5 class="card-title">Photo_1</h5>
                    <p class="card-text text-muted">By Cripx media</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Photo_1"
                        data-artist="Cripx media"
                        data-category="Photography"
                        data-description="A captivating photograph that captures the essence of a moment, demonstrating masterful composition and lighting techniques."
                        data-medium="Digital Photography"
                        data-dimensions="3840 x 2560 px"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Photo_2" data-artist="Cripx media" data-category="Photography">
            <div class="card h-100">
                <img src="../assets/images/photo1.jpeg" class="card-img-top" alt="photo">
                <div class="card-body">
                    <h5 class="card-title">Photo_2</h5>
                    <p class="card-text text-muted">By Cripx media</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Photo_2"
                        data-artist="Cripx media"
                        data-category="Photography"
                        data-description="An artistic photograph that tells a story through careful framing and perfect timing, showcasing the photographer's keen eye for detail."
                        data-medium="Digital Photography"
                        data-dimensions="4096 x 2730 px"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <h2 class="mb-4">Digital Art</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col artwork-card" data-title="Indigenous" data-artist="Lenin" data-category="Digital Art">
            <div class="card h-100">
                <img src="../assets/images/indigenous1.png" class="card-img-top" alt="Indigenous">
                <div class="card-body">
                    <h5 class="card-title">Indigenous</h5>
                    <p class="card-text text-muted">By Lenin</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Indigenous"
                        data-artist="Lenin"
                        data-category="Digital Art"
                        data-description="A powerful digital artwork celebrating indigenous culture and heritage through vibrant colors and meaningful symbolism."
                        data-medium="Digital Illustration"
                        data-dimensions="4000 x 3000 px"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Raccoono" data-artist="FS_arts" data-category="Digital Art">
            <div class="card h-100">
                <img src="../assets/images/raccons.jpg" class="card-img-top" alt="racoon">
                <div class="card-body">
                    <h5 class="card-title">Raccoono</h5>
                    <p class="card-text text-muted">By FS_arts</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Raccoono"
                        data-artist="FS_arts"
                        data-category="Digital Art"
                        data-description="Whimsical digital illustration featuring a charming raccoon character, blending cute design with artistic creativity."
                        data-medium="Digital Painting"
                        data-dimensions="3500 x 3500 px"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Mystical" data-artist="FS_arts" data-category="Digital Art">
            <div class="card h-100">
                <img src="../assets/images/Mystical.jpg" class="card-img-top" alt="mystical">
                <div class="card-body">
                    <h5 class="card-title">Mystical</h5>
                    <p class="card-text text-muted">By FS_arts</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Mystical"
                        data-artist="FS_arts"
                        data-category="Digital Art"
                        data-description="An enchanting digital artwork that explores magical themes through ethereal colors and mesmerizing details."
                        data-medium="Digital Painting"
                        data-dimensions="4500 x 3200 px"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<br>
<section>
    <h2 class="mb-4">Crafts</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col artwork-card" data-title="Room Decor" data-artist="Abigail" data-category="Crafts">
            <div class="card h-100">
                <img src="../assets/images/roomdecor.jpg" class="card-img-top" alt="Room decor">
                <div class="card-body">
                    <h5 class="card-title">Room Decor</h5>
                    <p class="card-text text-muted">By Abigail</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Room Decor"
                        data-artist="Abigail"
                        data-category="Crafts"
                        data-description="Handcrafted room decoration items that add a personal touch to living spaces."
                        data-medium="Mixed Media"
                        data-dimensions="Various"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Arte" data-artist="ArtByWe" data-category="Crafts">
            <div class="card h-100">
                <img src="../assets/images/art4.jpg" class="card-img-top" alt="Arte">
                <div class="card-body">
                    <h5 class="card-title">Arte</h5>
                    <p class="card-text text-muted">By ArtByWe</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Arte"
                        data-artist="ArtByWe"
                        data-category="Crafts"
                        data-description="Creative artwork showcasing unique artistic expression through traditional craft techniques."
                        data-medium="Mixed Media"
                        data-dimensions="Various"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Beaded" data-artist="Ducee_gh" data-category="Crafts">
            <div class="card h-100">
                <img src="../assets/images/art6.jpg" class="card-img-top" alt="Beaded art">
                <div class="card-body">
                    <h5 class="card-title">Beaded</h5>
                    <p class="card-text text-muted">By Ducee_gh</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Beaded"
                        data-artist="Ducee_gh"
                        data-category="Crafts"
                        data-description="Intricate beadwork displaying skilled craftsmanship and artistic design."
                        data-medium="Beadwork"
                        data-dimensions="Various"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>

        <div class="col artwork-card" data-title="Traditional Basket" data-artist="Lekea" data-category="Crafts">
            <div class="card h-100">
                <img src="../assets/images/basket.jpeg" class="card-img-top" alt="Traditional basket">
                <div class="card-body">
                    <h5 class="card-title">Traditional Basket</h5>
                    <p class="card-text text-muted">By Lekea</p>
                    <button class="btn btn-primary btn-sm view-details"
                        data-title="Traditional Basket"
                        data-artist="Lekea"
                        data-category="Crafts"
                        data-description="Handwoven traditional basket showcasing cultural heritage and expert weaving techniques."
                        data-medium="Basketry"
                        data-dimensions="Various"
                        data-year="2024">View Details</button>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Continue with other sections following the same pattern -->
    </main>

    <footer class="bg-dark text-white py-3 text-center">
        <p>© 2024 Art and Crafts Hub. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize modal
        const artworkModal = new bootstrap.Modal(document.getElementById('artworkModal'));
        
        // Add click handlers to all view-details buttons
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
                
                // Show the modal
                artworkModal.show();
            });
        });

        // Search functionality
        const searchInput = document.querySelector('input[placeholder="Search for artwork..."]');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.artwork-card').forEach(card => {
                const title = card.dataset.title.toLowerCase();
                const artist = card.dataset.artist.toLowerCase();
                const category = card.dataset.category.toLowerCase();
                
                if (title.includes(searchTerm) || artist.includes(searchTerm) || category.includes(searchTerm)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>