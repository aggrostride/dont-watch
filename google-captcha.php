 
 // JS 
 function resetCapcha() {

        grecaptcha.execute('Ключ сайта', { action: 'contact' }).then(function (token) {
            document.querySelectorAll(".recaptchaResponseMulti").forEach(elem => (elem.value = token));
        });

 }
 
 // HTML
 <input type="hidden" name="recaptcha_response" id="recaptchaResponse" class="recaptchaResponseMulti" value="">
 
 // AJAX
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = 'Секретный ключ';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);


    // Take action based on the score returned
    if ($recaptcha->score >= 0.5) {
        // Verified - send email
    } else {
        exit;
    }

}
