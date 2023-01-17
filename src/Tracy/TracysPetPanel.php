<?php declare(strict_types = 1);

namespace OriNette\TracysPet\Tracy;

use Throwable;
use Tracy\Helpers;

final class TracysPetPanel
{

	/** @var list<string> */
	private array $texts = [
		'Error? Good.',
		'Go back to work',
		'How about... no.',
		'Lorem ipsum bla blah blah Lorem ipsum bla blah blah Lorem ipsum bla blah blah ',
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

	/**
	 * @return array{tab: string, panel: string}
	 */
	public function __invoke(?Throwable $e): array
	{
		return [
			'tab' => 'Tracy\'s pet',
			'panel' => Helpers::capture(function (): void {
				// phpcs:disable SlevomatCodingStandard.Variables.UnusedVariable
				$message = $this->texts[array_rand($this->texts)];
				// phpcs:enable SlevomatCodingStandard.Variables.UnusedVariable

				require __DIR__ . '/TracysPetPanel.phtml';
			}),
		];
	}

}
