<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    public function makeRequest($method, $requestUrl,
        $queryParams = [], $formParams = [], $headers = [], $isJsonRequest = false
    ) {   
        $client = new Client([
            'base_uri' => $this->baseURI,
            'verify' => false
        ]);
        
        if (method_exists($this, 'resolveAuthorization')) {
            $this->resolveAuthorization($queryParams, $formParams, $headers);
        }
        
        $response = $client->request($method, $requestUrl, [
            ($isJsonRequest ? 'json' : 'form_params') => $formParams,
            'headers' => $headers,
            'query' => $queryParams,
        ])->getBody()
        ->getContents();

        return method_exists($this, 'decodeResponse')
            ? $this->decodeResponse($response)
            : $response;
    }
}
