<?php declare(strict_types = 1);

namespace OriNette\TracysPet\Tracy;

use Throwable;

final class TracysPetPanel
{

	/**
	 * @return array{tab: string, panel: string}
	 */
	public function __invoke(?Throwable $e): array
	{
		return [
			'tab' => 'Tracy\'s pet',
			'panel' => '',
		];
	}

}
