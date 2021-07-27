<?php
class Chat{
    public function getMessage()
    {
        return $this->decode();
    }

    public function setMessage($message, $pseudo): void
    {

        $json = $this->decode();
        array_push($json['chat'], [
            'pseudo' => $pseudo,
            'message' => $message,
            'date' => date('d/m/Y h:i')
        ]);
        $str = json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents(__DIR__.'/../data/chat.json', $str);
    }

    private function decode()
    {
        return json_decode(file_get_contents(__DIR__.'/../data/chat.json'),JSON_UNESCAPED_UNICODE);
    }
}