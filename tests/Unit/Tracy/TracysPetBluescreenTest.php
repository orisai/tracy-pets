<?php declare(strict_types = 1);

namespace Tests\OriNette\TracysPet\Unit\Tracy;

use OriNette\TracysPet\Tracy\TracysPetPanel;
use PHPUnit\Framework\TestCase;
use function class_exists;

final class TracysPetBluescreenTest extends TestCase
{

	public function test(): void
	{
		self::assertTrue(class_exists(TracysPetPanel::class));
	}

}
