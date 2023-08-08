<?php


use Config\Services;

function viacep(string $cep)
{
    $client = Services::curlrequest();

    $requestGET = $client->request("GET", "viacep.com.br/ws/{$cep}/json/");

    return $requestGET->getBody();
}
