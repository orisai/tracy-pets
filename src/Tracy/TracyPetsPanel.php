<?php declare(strict_types = 1);

namespace OriNette\TracyPets\Tracy;

use Throwable;
use Tracy\Helpers;
use function addcslashes;
use function array_rand;
use function base64_encode;
use function file_get_contents;

final class TracyPetsPanel
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
		__DIR__ . '/animals/grumpy.png',
		__DIR__ . '/animals/sadge.png',
		__DIR__ . '/animals/mouse.png',
	];

	private static bool $renderOnceCheck = false;

	private static bool $isRendered = false;

	public function __construct(bool $renderOnceCheck = false)
	{
		if ($renderOnceCheck) {
			self::$renderOnceCheck = $renderOnceCheck;
		}
	}

	/**
	 * @return array{tab: string, panel: string}|null
	 */
	public function __invoke(?Throwable $e): ?array
	{
		if ($e !== null) {
			return null;
		}

		if (self::$renderOnceCheck) {
			if (self::$isRendered) {
				return null;
			}

			self::$isRendered = true;
		}

		return [
			'tab' => 'Test',
			'panel' => Helpers::capture(function (): void {
				// phpcs:disable SlevomatCodingStandard.Variables.UnusedVariable
				$message = $this->texts[array_rand($this->texts)];
				$message = addcslashes($message, "\x00..\x1F!\"#$%&'()*+,./:;<=>?@[\\]^`{|}~");

				$bubble = 'data:image/svg+xml;base64,' . base64_encode(
					file_get_contents(__DIR__ . '/bubble.svg'),
				);

				$pet = 'data:image/png;base64,' . base64_encode(
					file_get_contents($this->images[array_rand($this->images)]),
				);
				// phpcs:enable SlevomatCodingStandard.Variables.UnusedVariable

				require __DIR__ . '/TracyPets.panel.phtml';
			}),
		];
	}

}
