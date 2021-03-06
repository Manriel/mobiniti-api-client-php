<?php namespace Mobiniti\Api;

class Client
{

    protected $api_url = 'https://api.mobiniti.com';

    protected $api_version = 'v1';

    protected $access_token;

    protected $debug;

    protected $contacts;

    protected $campaigns;

    protected $groups;

    protected $optins;
    
    protected $message;

    protected $messages;

    protected $coupons;

    protected $coupon_templates;

    protected $return_types = ['array', 'object'];

    protected $return_type;

    /**
     * @param string $access_token
     * @param string $return_type
     */
    public function __construct($access_token = null, $return_type = 'object')
    {
	    $this->setAccessToken($access_token);

        $this->setReturnType($return_type);
    }

    /**
     * Set the API url
     *
     * @param string $api_url
     *
     * @return $this
     */
    public function setApiUrl($api_url)
    {
        $this->api_url = rtrim($api_url, '/');

        return $this;
    }

    /**
     * Get the API url
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * Set the API version
     *
     * @param string $api_version
     *
     * @return $this
     */
    public function setApiVersion($api_version)
    {
        $this->api_version = trim($api_version, '/');

        return $this;
    }

    /**
     * Get the API version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->api_version;
    }

    /**
     * Set the access token
     *
     * @param string $access_token
     *
     * @return $this
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

	    $this->debug            = new Debug();
	    $this->campaigns        = new Campaigns($this);
	    $this->contacts         = new Contacts($this);
	    $this->coupons          = new Coupons($this);
	    $this->groups           = new Groups($this);
	    $this->optins           = new Optins($this);
	    $this->message          = new Message($this);
	    $this->messages         = new Messages($this);
	    $this->coupon_templates = new CouponTemplates($this);

	    return $this;
    }

    /**
     * Get the access token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Set debug variables
     *
     * @param $requestId
     *
     * @return $this
     */
    public function setDebug($requestId)
    {
        $this->debug->setRequestId($requestId);

        return $this;
    }

    /**
     * Get the debug object
     *
     * @return Debug
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param $client_id
     * @param $client_secret
     * @param $redirect_uri
     *
     * @return Auth
     */
    public function auth($client_id, $client_secret, $redirect_uri)
    {
        return new Auth($client_id, $client_secret, $redirect_uri);
    }

    /**
     * @return Campaigns
     */
    public function campaigns()
    {
        return $this->campaigns;
    }

    /**
     * @return Contacts
     */
    public function contacts()
    {
        return $this->contacts;
    }

    /**
     * @return Coupons
     */
    public function coupons()
    {
        return $this->coupons;
    }

    /**
     * @return CouponTemplates
     */
    public function coupon_templates()
    {
        return $this->coupon_templates;
    }

    /**
     * @return Groups
     */
    public function groups()
    {
        return $this->groups;
    }

    /**
     * @return Optins
     */
    public function optins()
    {
        return $this->optins;
    }
    
    /**
     * @return Message
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return Messages
     */
    public function messages()
    {
        return $this->messages;
    }

    /**
     * Set the data type for responses
     *
     * @param string $return_type
     *
     * @return $this
     */
    public function setReturnType($return_type)
    {
        if (!in_array($return_type, $this->return_types)) {
            throw new \InvalidArgumentException("The selected return type ({$return_type}) is not valid");
        }

        $this->return_type = $return_type;

        return $this;
    }

    /**
     * Get the current return type
     *
     * @return string
     */
    public function getReturnType()
    {
        return $this->return_type;
    }

}
