<?php
// Load Dotenv library
$dotenvPath = ABSPATH . '.env';
if (file_exists($dotenvPath)) {
    require_once ABSPATH . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(ABSPATH);
    $dotenv->load();
} else {
    // Handle the case when .env file is not found
    echo "Warning: .env file not found.";
}

// Enqueue jQuery for AJAX (if needed)
function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

// Fetch Spoonacular recipe using AJAX
function fetch_spoonacular_recipe() {
    // Get the current time
    $current_time = current_time('H:i');

    // Specify the time after which the post can be created (24-hour format)
    $post_creation_time = '15:00'; // Change this to your desired time

    // Check if the current time is after the specified time
    // if (strtotime($current_time) >= strtotime($post_creation_time)) {
        $spoonacular_api_key = getenv('SPOONACULAR_API_KEY');

        if (empty($spoonacular_api_key)) {
            wp_send_json_error('Spoonacular API key is not set.');
        }

        $api_url = "https://api.spoonacular.com/recipes/random?apiKey=$spoonacular_api_key";

        $response = wp_remote_get($api_url);
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (is_array($data) && isset($data['recipes'][0])) {
            $recipe = $data['recipes'][0];

            $response = array(
                'title' => $recipe['title'],
                'instructions' => $recipe['instructions'],
            );

            // Create a new WordPress post with the random recipe
            $post_data = array(
                'post_title' => $recipe['title'],
                'post_content' => $recipe['instructions'],
                'post_status' => 'publish',
                'post_author' => 1, // Set the author ID
                'post_category' => array(1), // Set the category ID
            );

            // Insert the post into the WordPress database
            $post_id = wp_insert_post($post_data);

            if ($post_id) {
                wp_send_json_success($response);
            } else {
                wp_send_json_error('Error creating post.');
            }
        } else {
            wp_send_json_error('Error fetching data from Spoonacular API.');
        }
    // } else {
    //     wp_send_json_error('Post creation time not reached.');
    // }
}
add_action('wp_ajax_fetch_spoonacular_recipe', 'fetch_spoonacular_recipe');
add_action('wp_ajax_nopriv_fetch_spoonacular_recipe', 'fetch_spoonacular_recipe');

// Display Spoonacular recipe content
function display_spoonacular_recipe() {
    ?>
    <div id="spoonacular-recipe-container">
        <h2 id="spoonacular-recipe-title"></h2>
        <div id="spoonacular-recipe-instructions"></div>
        <button id="fetch-spoonacular-recipe">Fetch Random Recipe</button>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('#fetch-spoonacular-recipe').on('click', function() {
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: { action: 'fetch_spoonacular_recipe' },
                    success: function(response) {
                        if (response.success) {
                            $('#spoonacular-recipe-title').text(response.data.title);
                            $('#spoonacular-recipe-instructions').html(response.data.instructions);
                        } else {
                            alert(response.data);
                        }
                    },
                    error: function(error) {
                        alert('Error fetching Spoonacular recipe.');
                    }
                });
            });
        });
    </script>
    <?php
}
add_shortcode('spoonacular_recipe', 'display_spoonacular_recipe');