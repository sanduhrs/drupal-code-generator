<?php declare(strict_types=1);

namespace DrupalCodeGenerator\Test\Functional;

use Composer\InstalledVersions;
use DrupalCodeGenerator\Application;
use DrupalCodeGenerator\BootstrapHandler;
use DrupalCodeGenerator\Helper\Renderer;
use DrupalCodeGenerator\Twig\TwigEnvironment;
use PHPUnit\Framework\TestCase;
use Twig\Loader\FilesystemLoader;

/**
 * Base class for functional tests.
 */
abstract class FunctionalTestBase extends TestCase {

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();
    $this->application = $this->createApplication();
  }

  /**
   * Creates DCG application.
   */
  protected function createApplication(): Application {

    $root_package = InstalledVersions::getRootPackage();
    $class_loader = require $root_package['install_path'] . 'vendor/autoload.php';

    $bootstrap_handler = new BootstrapHandler($class_loader);
    $container = $bootstrap_handler->bootstrap();

    $application = Application::create($container);

    $helper_set = $application->getHelperSet();

    // Replace default question helper to ease parsing output.
    $helper_set->set(new QuestionHelper());

    // Replace default renderer to enable 'strict_variables' in tests.
    $twig_environment = new TwigEnvironment(new FilesystemLoader([Application::TEMPLATE_PATH]), ['strict_variables' => TRUE]);
    $helper_set->set(new Renderer($twig_environment));
    return $application;
  }

}
