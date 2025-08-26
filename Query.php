<?php
// Allow CORS for APIs
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Sanitize input
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8') : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8') : '';
$message_field = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8') : '';
$service = isset($_POST['service']) ? htmlspecialchars(trim($_POST['service']), ENT_QUOTES, 'UTF-8') : '';
$budget = isset($_POST['budget']) ? htmlspecialchars(trim($_POST['budget']), ENT_QUOTES, 'UTF-8') : '';

// Email configuration
$to = "atifproviotech@gmail.com,info@oceanapublications.com";
$subject = "Contact Form Submission with Attachment";
$from = "noreply@oceanapublications.com";
$boundary = md5(uniqid());
$eol = "\r\n";
$headers = "From: $from" . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"" . $eol;

// Start building HTML email body
$logo_url = 'https://www.blackstonepublishers.com/assets/images/logo-new.png'; // 🔁 Replace with actual logo URL

$body = "--$boundary" . $eol;
$body .= "Content-Type: text/html; charset=UTF-8" . $eol;
$body .= "Content-Transfer-Encoding: 7bit" . $eol . $eol;

$body .= '<html><body style="font-family: Arial, sans-serif; color: #333;">';

// Logo
$body .= '<div style="text-align: center; margin-bottom: 20px;">
    <img src="' . $logo_url . '" alt="Logo" style="max-width: 200px;">
</div>';

// Table with form fields
$body .= '<h2 style="text-align: center; color: #222;">New Inquiry Received</h2>';
$body .= '<table style="width: 100%; max-width: 600px; margin: 0 auto; border-collapse: collapse; border: 1px solid #ddd;">';
$body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Name:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $name . '</td></tr>';
$body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Email:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $email . '</td></tr>';
$body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Phone:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $phone . '</td></tr>';
$body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Service:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $service . '</td></tr>';
$body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Book Plan:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $budget . '</td></tr>';
$body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Message:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . nl2br($message_field) . '</td></tr>';

// Handle file if attached
$has_attachment = isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK;
if ($has_attachment) {
    $tmp_name = $_FILES['file']['tmp_name'];
    $original_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];

    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $new_file_name = 'attachment_' . time() . '_' . basename($original_name);
    $saved_path = $upload_dir . $new_file_name;

    if (move_uploaded_file($tmp_name, $saved_path)) {
        $download_url = 'https://' . $_SERVER['HTTP_HOST'] . '/uploads/' . $new_file_name;

        // Add download link to table
        $body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Download File:</strong></td><td style="padding: 10px; border: 1px solid #ddd;"><a href="' . $download_url . '" target="_blank">' . htmlspecialchars($new_file_name) . '</a></td></tr>';

        // Also attach file (optional)
        $file_content = file_get_contents($saved_path);
        $encoded_content = chunk_split(base64_encode($file_content));

        $body .= '</table></body></html>' . $eol;
        $body .= "--$boundary" . $eol;
        $body .= "Content-Type: $file_type; name=\"$new_file_name\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment; filename=\"$new_file_name\"" . $eol . $eol;
        $body .= $encoded_content . $eol;
    } else {
        $body .= '<tr><td colspan="2" style="padding: 10px; border: 1px solid #ddd; color: red;"><strong>Attachment upload failed.</strong></td></tr>';
        $body .= '</table></body></html>' . $eol;
    }
} else {
    $body .= '</table></body></html>' . $eol;
}

$body .= "--$boundary--";

// Send email
$response = [];
if (mail($to, $subject, $body, $headers)) {
    $response['response'] = true;
    $response['message'] = 'Email sent successfully with attachment.';
    $response['redirect'] = '/thank-you/';
} else {
    $response['response'] = false;
    $response['message'] = 'Failed to send email. Try again.';
}

echo json_encode($response);
exit;
