<?php declare(strict_types=1);

namespace DrupalCodeGenerator\Tests\Functional\Generator;

use DrupalCodeGenerator\Command\Controller;
use DrupalCodeGenerator\Test\Functional\GeneratorTestBase;

/**
 * Test for controller command.
 */
final class ControllerTest extends GeneratorTestBase {

  protected string $fixtureDir = __DIR__;

  public function testController(): void {

    $input = [
      'foo',
      'FooController',
      'Yes',
      'database',
      '',
      'Yes',
      'example.bar',
      '/foo/example',
      'Bar',
      'access content',
    ];
    $this->execute(new Controller(), $input);

    $expected_display = <<< 'TXT'

     Welcome to controller generator!
    ––––––––––––––––––––––––––––––––––

     Module machine name [%default_name%]:
     ➤ 

     Class [FooController]:
     ➤ 

     Would you like to inject dependencies? [No]:
     ➤ 

     Type the service name or use arrows up/down. Press enter to continue:
     ➤ 

     Type the service name or use arrows up/down. Press enter to continue:
     ➤ 

     Would you like to create a route for this controller? [Yes]:
     ➤ 

     Route name [foo.example]:
     ➤ 

     Route path [/foo/example]:
     ➤ 

     Route title [Example]:
     ➤ 

     Route permission [access content]:
     ➤ 

     The following directories and files have been created or updated:
    –––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
     • foo.routing.yml
     • src/Controller/FooController.php


    TXT;
    $this->assertDisplay($expected_display);

    $this->assertGeneratedFile('src/Controller/FooController.php', '_controller.php');
    $this->assertGeneratedFile('foo.routing.yml', '_controller_routing.yml');
  }

}
