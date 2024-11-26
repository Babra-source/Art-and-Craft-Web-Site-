<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arts and Craft | Connect Hub</title>
    <link rel="stylesheet" href="/assets/css/connect.css">
</head>
<body>
    <!-- Header Section -->
    <header>
 
        <nav>
            <ul>
                <li><a href="Homepage.html">Home</a></li>
                <li><a href="showcase.html">Showcase</a></li>
                <!--<li><a href="connect.html">Connect</a></li>-->
                <li><a href="contacts.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Connect Hub Section -->
    <section id="connect-hub" >

        <h2>Find and connect with artists</h2>
        
        <!-- Search Section -->
        <div id="search-section">
            <input type="text" id="search-input" placeholder="Search for artists, artworks...">
            
            <!-- Filters Section -->
            <div id="filters">
                <label for="category-filter">Category:</label>
                <select id="category-filter">
                    <option value="painting">Painting</option>
                    <option value="sculpture">Sculpture</option>
                    <option value="photography">Photography</option>
                    <option value="digital">Digital Art</option>
                    <option value="pottery">Pottery</option>
                    <!-- Add other categories as needed -->
                </select>
                <button onclick="search()">Search</button>
            </div>
        </div>

    </section>

  

    <script>
        // Function to handle search functionality
        function search() {
            const searchTerm = document.getElementById('search-input').value;
            const category = document.getElementById('category-filter').value;

            // For now, just log the values to the console
            console.log('Search Term:', searchTerm);
            console.log('Category:', category);


        }
    </script>
</body>
</html>
