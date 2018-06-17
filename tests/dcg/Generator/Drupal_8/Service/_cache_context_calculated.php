<?php

namespace Drupal\bar\Cache\Context;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CalculatedCacheContextInterface;
use Drupal\Core\Cache\Context\RequestStackCacheContextBase;

/**
 * Defines the ExampleCacheContext service.
 *
 * Cache context ID: 'example'.
 *
 * @DCG
 * Check out the core/lib/Drupal/Core/Cache/Context directory for examples of
 * cache contexts provided by Drupal core.
 */
class ExampleCacheContext extends RequestStackCacheContextBase implements CalculatedCacheContextInterface {

  /**
   * {@inheritdoc}
   */
  public static function getLabel() {
    return t('Example');
  }

  /**
   * {@inheritdoc}
   */
  public function getContext($parameter = NULL) {
    // @DCG: Define the cache context here.
    $context = 'some_string_value';
    return $context;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheableMetadata($parameter = NULL) {
    return new CacheableMetadata();
  }

}
