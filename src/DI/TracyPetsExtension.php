<?php declare(strict_types = 1);

namespace OriNette\TracyPets\DI;

use Nette\DI\CompilerExtension;
use Nette\PhpGenerator\Literal;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use OriNette\TracyPets\Tracy\TracyPetsPanel;
use stdClass;
use Tracy\BlueScreen;
use Tracy\Debugger;

/**
 * @property-read stdClass $config
 */
final class TracyPetsExtension extends CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure([]);
	}

	public function loadConfiguration(): void
	{
		parent::loadConfiguration();

		self::setupPanel(Debugger::getBlueScreen(), true);
	}

	public function beforeCompile(): void
	{
		parent::beforeCompile();
		$builder = $this->getContainerBuilder();

		$this->getInitialization()->addBody('?::setupPanel($this->getService(?));', [
			new Literal(self::class),
			$builder->getDefinitionByType(BlueScreen::class)->getName(),
		]);
	}

	public static function setupPanel(BlueScreen $blueScreen, bool $renderOnceCheck = false): void
	{
		$blueScreen->addPanel(new TracyPetsPanel($renderOnceCheck));
	}

}
