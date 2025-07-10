<?php
// Get all categories for the filter
$categories = [
    'All Posts' => '',
    'Arts & Entertainment' => 8,
    'History & Culture' => 4,
    'Improvement Projects' => 7,
    'Key Industries' => 6,
    'Sports & Recreation' => 9
];
?>

<section class="news-section o-section o-section--news u-padding-top-none">
    <div class="container o-wrapper">

        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button data-category-id="0" class="filter-button active">All Posts</button>
            <?php foreach ($categories as $cat_name => $cat_id): ?>
                <?php if ($cat_id !== ''): ?>
                    <button data-category-id="<?php echo $cat_id; ?>" class="filter-button">
                        <?php echo $cat_name; ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Posts Container -->
        <div id="posts-container" class="posts-grid">
            <!-- Posts will be loaded dynamically by JavaScript -->
        </div>

        <!-- Load More Button -->
        <div class="load-more-container">
            <button id="load-more-btn" class="load-more-btn" style="display:none;">Load More</button>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-button');
    const postsContainer = document.getElementById('posts-container');
    const loadMoreButton = document.getElementById('load-more-btn');
    let currentPage = 1;
    let currentCategory = '';
    let totalPosts = 0;
    let loadedPostCount = 0; // Track the number of loaded posts
    let isFetching = false; // Prevent multiple fetch requests at once

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-category-id');
            currentCategory = categoryId;
            currentPage = 1; // Reset the page when a new category is selected
            loadedPostCount = 0; // Reset the loaded post count

            // Remove active class from all buttons and add to the clicked one
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Fetch total posts count for the selected category
            fetchTotalPostsCount(categoryId);

            // Fetch posts based on category ID
            fetchPosts(categoryId, currentPage, true);
        });
    });

    function fetchTotalPostsCount(categoryId) {
        let url = `/wp-json/wp/v2/posts?_embed&per_page=1`; // Fetch 1 post to get the total post count
        if (categoryId !== '0' && categoryId !== '') {
            url += `&categories=${categoryId}`;
        }

        fetch(url)
            .then(response => response.headers.get('X-WP-Total')) // Get the total number of posts from the response headers
            .then(total => {
                totalPosts = parseInt(total, 10);
            });
    }

    function fetchPosts(categoryId, page, reset = false) {
        if (isFetching) return;
        isFetching = true;

        let url = `/wp-json/wp/v2/posts?_embed&per_page=10&page=${page}`; // Fetch 10 posts per page
        if (categoryId !== '0' && categoryId !== '') {
            url += `&categories=${categoryId}`;
        }

        fetch(url)
            .then(response => response.json())
            .then(posts => {
                let output = '';

                if (posts.length > 0) {
                    posts.forEach(post => {
                        const imageUrl = post._embedded['wp:featuredmedia'] ? post._embedded['wp:featuredmedia'][0].source_url : '';
                        output += `
                            <div class="post-item">
                                <div class="post-thumbnail">
                                    <a href="${post.link}"><img src="${imageUrl}" alt="${post.title.rendered}" /></a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title"><a href="${post.link}">${post.title.rendered}</a></h2>
                                    <div class="post-excerpt">${post.excerpt.rendered}</div>
                                </div>
                            </div>
                        `;
                    });

                    // If reset is true, replace the current posts, otherwise append them
                    if (reset) {
                        postsContainer.innerHTML = output;
                    } else {
                        postsContainer.innerHTML += output;
                    }

                    loadedPostCount += posts.length; // Increment the count of loaded posts

                    // Show or hide the "Load More" button
                    if (loadedPostCount < totalPosts) {
                        loadMoreButton.style.display = 'block';
                    } else {
                        loadMoreButton.style.display = 'none';
                    }
                } else {
                    if (reset) {
                        postsContainer.innerHTML = '<p>No posts found</p>';
                    }
                    loadMoreButton.style.display = 'none';
                }

                isFetching = false; // Allow new fetch requests
            });
    }

    // Load More button click event
    loadMoreButton.addEventListener('click', function () {
        currentPage++;
        fetchPosts(currentCategory, currentPage); // Fetch more posts for the current category
    });

    // Fetch initial posts on page load for All Posts
    fetchTotalPostsCount(currentCategory);
    fetchPosts(currentCategory, currentPage);
});
</script>

<style>
    /* Style your filter buttons */
    .filter-buttons {
        margin-bottom: 20px;
        padding-top:10px;
    }

    .filter-button {
        padding: 10px 20px;
        margin-right: 10px;
        margin-bottom:10px;
        cursor: pointer;
        background-color: #0073aa;
        color: white;
        border: none;
        border-radius: 4px;
    }

    .filter-button.active {
        background-color: #00467d;
    }

    /* Posts Grid */
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .post-item {
        background-color: #f5f5f5;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .post-thumbnail img {
        width: 100%;
        height: auto;
        display: block;
    }

    .post-content {
        padding: 15px;
    }

    .post-title {
        font-size: 1.2rem;
        margin: 0 0 10px;
    }

    .post-excerpt {
        font-size: 0.9rem;
        color: #555;
    }
    /* Load More Button */
.load-more-container {
    text-align: center;
    margin-top: 20px;
}

.load-more-btn {
    padding: 10px 20px;
    background-color: #0073aa;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    display:block;
    margin:0 auto;
    width:200px;
}

.load-more-btn:hover {
    background-color: #00467d;
}
</style>