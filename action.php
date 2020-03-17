<?php
if (isset($_POST['post'])) {
    // print_r($_POST);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => "your server side key here",
        'response' => $_POST['token'],
        // 'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    $res = json_decode($response, true);
    if ($res['success'] == true) {
        echo "Verification Success";
    } else {
        echo "Verification Failed";
    }
    echo "<br><br>";
    var_dump($res);
}

?>