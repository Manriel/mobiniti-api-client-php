<?php namespace Mobiniti\Api;

class Messages extends AbstractClient
{

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);

        $this->resource = 'messages';
    }

    /**
     * Retrieve all messages
     *
     * @param int $limit
     * @param int $page
     *
     * @return mixed
     */
    public function all($limit = 100, $page = 1)
    {
        return $this->http->get($this->resource, ['limit' => $limit, 'page' => $page]);
    }

    /**
     * Retrieve the group based on the provided id
     *
     * @param $id
     *
     * @return object
     */
    public function retrieve($id)
    {
        return $this->http->get("{$this->resource}/{$id}");
    }

    /**
     * Send a sms message to a contact
     *
     * @param array $data
     *
     * @return object
     */
    public function create(array $data)
    {
        return $this->http->post($this->resource, $data);
    }

}