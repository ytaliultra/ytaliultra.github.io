<?php


if (!empty($_POST)) {
    class Telegram
    {

        const CHAT_ID = 671062879;
        const TOKEN = '1960077257:AAFDv_-kexaYayRmGPNimFUz4cFXMa3yvGY';

        public static function sendMessage($message)
        {
            $url = "https://api.telegram.org/bot" . self::TOKEN . "/sendMessage?chat_id=" . self::CHAT_ID;
            $url = $url . "&text=" . urlencode($message);
            $ch = curl_init();
            $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            );
            curl_setopt_array($ch, $optArray);
            $result = curl_exec($ch);
            curl_close($ch);
        }

    }

    Telegram::sendMessage(
        ' New message from aliultra.ml '
        . "\n" . ''
        . "\n" . '• Full Name : ' . $_POST['Name']
        . "\n" . '• Email : ' . $_POST['email']
        . "\n" . '• Message : ' . $_POST['msg']
    );

    header('Location: success.php');
} else {
    header('Location: failed.php');
}
