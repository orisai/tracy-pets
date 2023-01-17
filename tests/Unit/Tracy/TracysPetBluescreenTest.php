<?php declare(strict_types = 1);

namespace Tests\OriNette\TracysPet\Unit\Tracy;

use Exception;
use OriNette\TracysPet\Tracy\TracysPetPanel;
use PHPUnit\Framework\TestCase;

final class TracysPetBluescreenTest extends TestCase
{

	public function test(): void
	{
		$panel = new TracysPetPanel();

		for ($i = 1; $i <= 10; $i++) {
			$result = $panel(new Exception());
			self::assertNull($result);

			$result = $panel(null);
			self::assertIsArray($result);
		}
	}

}
