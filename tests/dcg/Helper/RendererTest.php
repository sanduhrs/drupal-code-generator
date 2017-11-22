<?php

namespace DrupalCodeGenerator\Tests\Helper;

use DrupalCodeGenerator\Helper\Renderer;
use DrupalCodeGenerator\Twig\TwigEnvironment;
use PHPUnit\Framework\TestCase;

/**
 * A test for renderer helper.
 */
class RendererTest extends TestCase {

  /**
   * Test callback.
   */
  public function testRenderer() {
    $twig_loader = new \Twig_Loader_Filesystem();
    $twig = new TwigEnvironment($twig_loader);
    $renderer = new Renderer($twig);
    static::assertEquals($renderer->getName(), 'dcg_renderer');
    $renderer->addPath(__DIR__);
    $content = $renderer->render('_renderer-fixture.twig', ['value' => 'foo']);
    static::assertEquals($content, "The value is: foo\n");
  }

}
