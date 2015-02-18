<?php

class Model {

    public function divideMail($stringaJson) {
        return explode(PHP_EOL, $stringaJson);
    }

    public function readFromJson() {
        $file = "oldMail.json";

        if (!is_file($file)) {
            return "Non ci sono vecchie email da mostrare!";
        } else {
            $oldMail = $this->divideMail(file_get_contents($file));

            $content = "<h1>Archivio Mail</h1><br>";

            foreach ($oldMail as $singleMail) {
                $content .= "<p>" . json_decode(str_replace('\r\n', "<br>", $singleMail)) . "</p><hr>";
            }

            return $content;
        }
    }

}