<?php declare(strict_types = 1);

namespace OriNette\TracysPet\DI;

use Nette\DI\CompilerExtension;
use Nette\PhpGenerator\Literal;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use OriNette\TracysPet\Tracy\TracysPetPanel;
use stdClass;
use Tracy\BlueScreen;
use Tracy\Debugger;

/**
 * @property-read stdClass $config
 */
final class TracysPetExtension extends CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure([]);
	}

	public function loadConfiguration(): void
	{
		parent::loadConfiguration();

		self::setupPanel(Debugger::getBlueScreen());
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

	public static function setupPanel(BlueScreen $blueScreen): void
	{
		$blueScreen->addPanel(new TracysPetPanel());
	}

}
