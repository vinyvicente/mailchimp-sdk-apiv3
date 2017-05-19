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
     * @var string
     */
    private $errorMessageFloated = '';

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
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessageFloated;
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
            $this->errorMessageFloated = $e->getMessage();

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
            $this->errorMessageFloated = $e->getMessage();

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
            $this->errorMessageFloated = $e->getMessage();
            return $fieldResponse;
        }
    }

    public function getList($listId, $memberId)
    {
        try {
            $response = $this->httpClient->get('/3.0/lists/' . $listId . '/members/' . $memberId, [
                'headers' => $this->getHeaderOAuth2(),
            ]);

            return json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            $this->errorMessageFloated = $e->getMessage();
        }

        return new \stdClass();
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
            $this->errorMessageFloated = $e->getMessage();

            return $fieldResponse;
        }
    }

    /**
     * @param $listId
     * @param $hashId
     * @return MemberResponse
     */
    public function deleteMember($listId, $hashId)
    {
        $fieldResponse = new MemberResponse();

        try {
            $response = $this->httpClient->delete('/3.0/lists/' . $listId . '/members/' . $hashId, [
                'headers' => $this->getHeaderOAuth2(),
            ]);

            if (!empty(204 === $response->getStatusCode())) {
                $fieldResponse->setId($hashId)
                    ->setSuccess(true);
            }

            return $fieldResponse;
        } catch (\Exception $e) {
            $this->errorMessageFloated = $e->getMessage();

            return $fieldResponse;
        }
    }
}
