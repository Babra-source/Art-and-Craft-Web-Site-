//references to necessary elements
const recipeGrid = document.querySelector('.recipe-grid');
const searchInput = document.getElementById('recipeSearch');

//function to add a new artwork card
function addArtwork() {
    const artwork = {
        image: '/assets/images/new_art.jpg', // Replace with the path to your image
        title: 'New Artwork',
        description: 'A new description of the artwork goes here.',
        artist: 'New Artist',
        rating: 'Rating: ★★★☆☆'
    };

    const newArtworkCard = document.createElement('div');
    newArtworkCard.classList.add('recipe-card');
    newArtworkCard.innerHTML = `
        <img src="${artwork.image}" alt="${artwork.title}">
        <h3>${artwork.title}</h3>
        <button class="favorite-btn" onclick="toggleLike(this)">❤️</button>
        <div class="overlay">
            <div class="description">
                ${artwork.description}
                Artist: ${artwork.artist}
                <div class="rating">${artwork.rating}</div>
            </div>
        </div>
    `;

    recipeGrid.appendChild(newArtworkCard);
}



// //function to handle the "like" feature
// function toggleLike(button) {
//     if (button.classList.contains('liked')) {
//         button.classList.remove('liked');
//         button.textContent = '❤️'; // Reset to unliked heart
//     } else {
//         button.classList.add('liked');
//         button.textContent = '💖'; // Change to liked heart
//     }
// }


//function for filtering artworks when there is input in the search button
function filterRecipes() {
    const searchTerm = searchInput.value.toLowerCase();
    const artworks = document.querySelectorAll('.recipe-card');

    artworks.forEach(artwork => {
        const title = artwork.querySelector('h3').textContent.toLowerCase();
        const description = artwork.querySelector('.description').textContent.toLowerCase();

        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            artwork.style.display = '';
        } else {
            artwork.style.display = 'none';
        }
    });
}



//event listener for search button
searchInput.addEventListener('keyup', filterRecipes);

//adding new artwork on button click
document.getElementById('addArtworkBtn').addEventListener('click', addArtwork);
