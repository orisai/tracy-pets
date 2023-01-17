<?php declare(strict_types = 1);

namespace OriNette\TracysPet\Tracy;

use Throwable;
use Tracy\Helpers;
use function array_rand;
use function base64_encode;
use function file_get_contents;

final class TracysPetPanel
{

	/** @var list<string> */
	private array $texts = [
		'Error? Good.',
		'Go back to work',
		'How about... no.',
		'Pretend like it\'s Friday',
		'You call this code?',
		'You deserve it',
		'You made it a Cacophony',
		'Your code is like Monday',
		'Your struggling made my day',
		'Stop looking at me',
		'This is my happy face',
		'This is your fault',
		'What\'s the test coverage?',
		'Why are they keeping you again?',
	];

	/** @var list<string> */
	private array $images = [
		__DIR__ . '/grumpy.png',
		__DIR__ . '/sadge.png',
		__DIR__ . '/mouse.png',
	];

	/**
	 * @return array{tab: string, panel: string}|null
	 */
	public function __invoke(?Throwable $e): ?array
	{
		if ($e !== null) {
			return null;
		}

		return [
			'tab' => 'Test',
			'panel' => Helpers::capture(function (): void {
				// phpcs:disable SlevomatCodingStandard.Variables.UnusedVariable
				$message = $this->texts[array_rand($this->texts)];

				$bubble = 'data:image/svg+xml;base64,' . base64_encode(
					file_get_contents(__DIR__ . '/bubble.svg'),
				);

				$pet = 'data:image/png;base64,' . base64_encode(
					file_get_contents($this->images[array_rand($this->images)]),
				);
				// phpcs:enable SlevomatCodingStandard.Variables.UnusedVariable

				require __DIR__ . '/TracysPetPanel.phtml';
			}),
		];
	}

}
