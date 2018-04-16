<?php

namespace Directus\Authentication;

use WellingGuzman\OAuth2\Client\Provider\Okta;

class OktaProvider extends TwoSocialProvider
{
    /**
     * @var Okta
     */
    protected $provider = null;

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'okta';
    }

    /**
     * @inheritdoc
     */
    public function getScopes()
    {
        return ['openid email'];
    }

    /**
     * Creates the GitHub provider oAuth client
     *
     * @return Okta
     */
    protected function createProvider()
    {
        $this->provider = new Okta([
            'baseUrl'           => $this->config->get('base_url'),
            'clientId'          => $this->config->get('client_id'),
            'clientSecret'      => $this->config->get('client_secret'),
            'redirectUri'       => $this->getRedirectUrl($this->getName())
        ]);

        return $this->provider;
    }
}
