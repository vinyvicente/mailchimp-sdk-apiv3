<?php

namespace MailChimp;

use MailChimp\Entity\ListManager;
use MailChimp\Response\ListResponse;
use GuzzleHttp\Client as HttpClient;

/**
 * Class Client
 * @package MailChimp
 */
class Client
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param string $baseUri
     * @param string $token
     */
    public function __construct($baseUri, $token)
    {
        $this->httpClient = new HttpClient(['base_uri' => $baseUri]);
        $this->token = $token;
    }

    /**
     * @return array
     */
    public function getHeaderOAuth2()
    {
        return [
            'Authorization' => 'OAuth2 ' . $this->token,
            'Content-type' => 'application/json',
        ];
    }

    /**
     * @param ListManager $list
     * @return ListResponse
     */
    public function addList(ListManager $list)
    {
        $listResponse = new ListResponse();
        $listResponse->setSuccess(false);

        try {
            $response = $this->httpClient->post('/3.0/lists', [
                'body' => (string) $list,
                'headers' => $this->getHeaderOAuth2(),
            ]);

            $result = json_decode($response->getBody()->getContents());

            $listResponse->setListId($result->id)
                ->setSuccess(true);

            return $listResponse;

        } catch (\Exception $e) {
            return $listResponse;
        }
    }
}
