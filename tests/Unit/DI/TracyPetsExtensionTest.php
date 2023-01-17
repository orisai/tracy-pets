<?php declare(strict_types = 1);

namespace Tests\OriNette\TracyPets\Unit\DI;

use OriNette\DI\Boot\ManualConfigurator;
use PHPUnit\Framework\TestCase;
use function dirname;
use function mkdir;
use const PHP_VERSION_ID;

final class TracyPetsExtensionTest extends TestCase
{

	private string $rootDir;

	protected function setUp(): void
	{
		parent::setUp();

		$this->rootDir = dirname(__DIR__, 3);
		if (PHP_VERSION_ID < 8_01_00) {
			@mkdir("$this->rootDir/var/build");
		}
	}

	public function testHttpWrongHeaderCase(): void
	{
		$configurator = new ManualConfigurator($this->rootDir);
		$configurator->setForceReloadContainer();
		$configurator->addConfig(__DIR__ . '/TracyPetsExtension.neon');

		$configurator->createContainer();
		self::assertTrue(true); // Make phpunit happy
	}

}
