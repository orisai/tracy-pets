<?php declare(strict_types = 1);

namespace Tests\OriNette\TracyPets\Unit\Tracy;

use Exception;
use OriNette\TracyPets\Tracy\TracyPetsPanel;
use PHPUnit\Framework\TestCase;

final class TracyPetsBluescreenTest extends TestCase
{

	public function test(): void
	{
		$panel = new TracyPetsPanel();

		for ($i = 1; $i <= 10; $i++) {
			$result = $panel(new Exception());
			self::assertNull($result);

			$result = $panel(null);
			self::assertIsArray($result);
		}
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testRenderOnce(): void
	{
		$panel = new TracyPetsPanel();
		self::assertIsArray($panel(null));

		$panel = new TracyPetsPanel(true);
		self::assertIsArray($panel(null));

		$panel = new TracyPetsPanel();
		self::assertNull($panel(null));
	}

}
