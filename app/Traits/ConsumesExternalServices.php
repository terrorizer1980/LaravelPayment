<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function makeRequest($method, $requestUrl,
        $queryParams = [], $formParams = [], $headers = [], $isJsonRequest = false)
    {   
        $client = new Client([
            'base_uri' => $this->base_uri
        ]);
        
        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formParams, $headers);
        }
        
        $response = $client->request($method, $requestUrl, [
            $isJsonRequest ? 'json' : 'body' => $formParams,
            'headers' => $headers,
            'query' => $queryParams,
        ])->getBody()
        ->getContents();

        return method_exists($this, 'decodeResponse')
            ? $this->decodeResponse($response)
            : $response;
    }
}
