// Add Twilio SDK autoload file
require_once __DIR__ . '/../vendor/autoload.php'; // Adjust the path as necessary

use Twilio\Rest\Client;

// Function to fetch Twilio messages
function fetch_twilio_messages() {
    $sid = 'your_account_sid'; // Replace with your Twilio Account SID
    $token = 'your_auth_token'; // Replace with your Twilio Auth Token
    $twilio = new Client($sid, $token);

    $messages = $twilio->messages->read([], 20);

    $output = '<ul>';
    foreach ($messages as $message) {
        $output .= '<li><strong>From:</strong> ' . $message->from . ' - <strong>Message:</strong> ' . $message->body . '<br>';
        $output .= '<form action="https://kcplantfactory.com/reply_message.php" method="post">';
        $output .= '<input type="hidden" name="To" value="' . $message->from . '">';
        $output .= '<textarea name="Body" placeholder="Your Message"></textarea>';
        $output .= '<button type="submit">Send</button>';
        $output .= '</form></li>';
    }
    $output .= '</ul>';

    return $output;
}

// Shortcode to display Twilio messages
add_shortcode('twilio_messages', 'fetch_twilio_messages');

// Function to create dashboard widget
function twilio_dashboard_widget() {
    wp_add_dashboard_widget(
        'twilio_messages_widget', // Widget slug
        'Twilio Messages', // Title
        'display_twilio_messages_widget' // Display function
    );
}

// Display function for the dashboard widget
function display_twilio_messages_widget() {
    echo do_shortcode('[twilio_messages]');
}

// Hook to add dashboard widget
add_action('wp_dashboard_setup', 'twilio_dashboard_widget');
