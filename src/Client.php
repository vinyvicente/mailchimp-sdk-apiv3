<?php

namespace MailChimp;

use MailChimp\Entity\ListManager;
use MailChimp\Response\ListResponse;
use GuzzleHttp\Client as HttpClient;
use MailChimp\Response\MemberResponse;
use MailChimp\Response\MergeFieldResponse;

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

    /**
     * @param $listId
     * @param ListManager\MergeFields $fields
     * @return MergeFieldResponse
     */
    public function addMergeField($listId, ListManager\MergeFields $fields)
    {
        $fieldResponse = new MergeFieldResponse();

        try {
            $response = $this->httpClient->post('/3.0/lists/' . $listId . '/merge-fields', [
                'body' => (string) $fields,
                'headers' => $this->getHeaderOAuth2(),
            ]);

            $result = json_decode($response->getBody()->getContents());
            if (!empty($result->merge_id)) {
                $fieldResponse->setSuccess(true);
            }
            return $fieldResponse;

        } catch (\Exception $e) {
            return $fieldResponse;
        }
    }

    /**
     * @param int $listId
     * @param ListManager\Member $member
     * @return MemberResponse
     */
    public function addMember($listId, ListManager\Member $member)
    {
        $fieldResponse = new MemberResponse();

        try {
            $response = $this->httpClient->post('/3.0/lists/' . $listId . '/members', [
                'body' => (string) $member,
                'headers' => $this->getHeaderOAuth2(),
            ]);

            $result = json_decode($response->getBody()->getContents());
            if (!empty($result->id)) {
                $fieldResponse->setId($result->id)
                    ->setSuccess(true);
            }
            return $fieldResponse;

        } catch (\Exception $e) {
            return $fieldResponse;
        }
    }

    /**
     * @param string $listId
     * @param string $hashId
     * @param ListManager\Member $member
     * @return MemberResponse
     */
    public function updateMember($listId, $hashId, ListManager\Member $member)
    {
        $fieldResponse = new MemberResponse();

        try {
            $response = $this->httpClient->put('/3.0/lists/' . $listId . '/members/' . $hashId, [
                'body' => (string) $member,
                'headers' => $this->getHeaderOAuth2(),
            ]);

            $result = json_decode($response->getBody()->getContents());
            if (!empty($result->id)) {
                $fieldResponse->setId($result->id)
                    ->setSuccess(true);
            }
            return $fieldResponse;

        } catch (\Exception $e) {
            return $fieldResponse;
        }
    }
}
