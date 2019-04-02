<?php
namespace App\Classes;

class GithubClass
{
    public function get($url = null)
    {
        $results = false;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            sprintf('Authorization: Basic %s', base64_encode(sprintf("%s:%s", config('app.github.username'), config('app.github.password'))))
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        if (curl_error($ch)) {
            $results = curl_error($ch);
        } else {
            $object = json_decode($json);
            if ($object) {
                $results = $object;
            }
        }
        curl_close($ch);

        return $results;
    }
}
