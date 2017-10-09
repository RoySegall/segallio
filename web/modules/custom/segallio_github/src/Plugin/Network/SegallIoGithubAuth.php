<?php

namespace Drupal\segallio_github\Plugin\Network;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Routing\RequestContext;
use Drupal\social_api\Plugin\NetworkBase;
use Drupal\social_api\SocialApiException;
use Drupal\social_auth_github\Plugin\Network\GithubAuthInterface;
use Drupal\social_auth_github\Settings\GithubAuthSettings;
use Symfony\Component\DependencyInjection\ContainerInterface;
use League\OAuth2\Client\Provider\Github;
use Drupal\Core\Site\Settings;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Defines a Network Plugin for Social Auth Github.
 *
 * @package Drupal\simple_github_connect\Plugin\Network
 *
 * @Network(
 *   id = "segallio_github_social_auth_github",
 *   social_network = "Github",
 *   type = "social_auth",
 *   handlers = {
 *     "settings": {
 *       "class": "\Drupal\social_auth_github\Settings\GithubAuthSettings",
 *       "config_id": "social_auth_github.settings"
 *     }
 *   }
 * )
 */
class SegallIoGithubAuth extends NetworkBase implements GithubAuthInterface  {

  /**
   * The Social Auth Data Handler.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $dataHandler;

  /**
   * The logger factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactory
   */
  protected $loggerFactory;

  /**
   * The request context object.
   *
   * @var \Drupal\Core\Routing\RequestContext
   */
  protected $requestContext;

  /**
   * The site settings.
   *
   * @var \Drupal\Core\Site\Settings
   */
  protected $siteSettings;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('session'),
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('config.factory'),
      $container->get('logger.factory'),
      $container->get('router.request_context'),
      $container->get('settings')
    );
  }

  /**
   * GithubAuth constructor.
   *
   * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $data_handler
   *   The data handler.
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param array $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory object.
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger_factory
   *   The logger factory.
   * @param \Drupal\Core\Routing\RequestContext $requestContext
   *   The Request Context Object.
   * @param \Drupal\Core\Site\Settings $settings
   *   The settings factory.
   */
  public function __construct(SessionInterface $data_handler,
                              array $configuration,
                              $plugin_id,
                              array $plugin_definition,
                              EntityTypeManagerInterface $entity_type_manager,
                              ConfigFactoryInterface $config_factory,
                              LoggerChannelFactoryInterface $logger_factory,
                              RequestContext $requestContext,
                              Settings $settings
  ) {

    parent::__construct($configuration, $plugin_id, $plugin_definition, $entity_type_manager, $config_factory);

    $this->dataHandler = $data_handler;
    $this->loggerFactory = $logger_factory;
    $this->requestContext = $requestContext;
    $this->siteSettings = $settings;
  }

  /**
   * Sets the underlying SDK library.
   *
   * @return \League\OAuth2\Client\Provider\Github
   *   The initialized 3rd party library instance.
   *
   * @throws SocialApiException
   *   If the SDK library does not exist.
   */
  protected function initSdk() {

    $class_name = '\League\OAuth2\Client\Provider\Github';
    if (!class_exists($class_name)) {
      throw new SocialApiException(sprintf('The Github Library for the league oAuth not found. Class: %s.', $class_name));
    }
    /* @var \Drupal\social_auth_github\Settings\GithubAuthSettings $settings */
    $settings = $this->settings;
    // Proxy configuration data for outward proxy.
    $proxyUrl = $this->siteSettings->get("http_client_config")["proxy"]["http"];
    if ($this->validateConfig($settings)) {
      // All these settings are mandatory.
      if ($proxyUrl) {
        $league_settings = [
          'clientId' => $settings->getClientId(),
          'clientSecret' => $settings->getClientSecret(),
          'redirectUri' => $this->requestContext->getCompleteBaseUrl() . '/user/login/github/callback',
          'accessType' => 'offline',
          'verify' => FALSE,
          'proxy' => $proxyUrl,
        ];
      }
      else {
        $league_settings = [
          'clientId' => $settings->getClientId(),
          'clientSecret' => $settings->getClientSecret(),
          'redirectUri' => $this->requestContext->getCompleteBaseUrl() . '/user/login/github/callback',
          'accessType' => 'offline',
          'verify' => FALSE,
        ];
      }

      return new Github($league_settings);
    }
    return FALSE;
  }

  /**
   * Checks that module is configured.
   *
   * @param \Drupal\social_auth_github\Settings\GithubAuthSettings $settings
   *   The Github auth settings.
   *
   * @return bool
   *   True if module is configured.
   *   False otherwise.
   */
  protected function validateConfig(GithubAuthSettings $settings) {
    $client_id = $settings->getClientId();
    $client_secret = $settings->getClientSecret();
    if (!$client_id || !$client_secret) {
      $this->loggerFactory
        ->get('social_auth_github')
        ->error('Define Client ID and Client Secret on module settings.');
      return FALSE;
    }

    return TRUE;
  }

}