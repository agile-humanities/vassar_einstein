<?php

namespace Drupal\vassar_einstein\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RedirectController.
 */
class RedirectController extends ControllerBase {

  /**
   * Drupal\Core\Http\RequestStack definition.
   *
   * @var \Drupal\Core\Http\RequestStack
   */
  protected $requestStack;

  /**
   * Drupal\Core\Messenger\MessengerInterface definition.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->requestStack = $container->get('request_stack');
    $instance->messenger = $container->get('messenger');
    return $instance;
  }

  /**
   * einsteinRedirect
   *
   * @return RedirectResponse
   *   Return new destination.
   */
  public function einsteinRedirect() {
    $message = "You have been redirected to our new site.  Please update your bookmarks";
    $this->messenger->addMessage($message);
    return new RedirectResponse("/");
  }
}
