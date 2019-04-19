<?php

namespace App\Classes;

class CloudflareClass
{
    public function purge($files = [])
    {
        if ($files) {
            return $this->query("purge_cache", 'POST', compact('files'))->success;
        }
        return $this->query("purge_cache", 'POST', [
            'purge_everything' => true
        ]);
    }

    private function query($url = "", $method = 'GET', $data = [])
    {
        $ch = curl_init(sprintf("https://api.cloudflare.com/client/v4/zones/%s/%s", config('app.cloudflare.zone'), $url));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-Auth-Key: ' . config('app.cloudflare.key'),
            'X-Auth-Email: ' . config('app.cloudflare.email')
        ]);
        $callback = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);

        return json_decode($callback);
    }
}
