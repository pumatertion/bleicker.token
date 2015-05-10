<?php

namespace Bleicker\Token;

use Bleicker\ObjectManager\ObjectManager;
use Prophecy\Argument\Token\TokenInterface;
use ReflectionClass;

/**
 * Class AbstractToken
 *
 * @package Bleicker\Token
 */
abstract class AbstractToken implements TokenInterface {

	/**
	 * @param string $alias
	 * @return static
	 */
	public static function register($alias = NULL) {
		if ($alias === NULL) {
			$alias = static::class;
		}
		$reflection = new ReflectionClass(static::class);
		/** @var static $instance */
		$instance = $reflection->newInstanceArgs(array_slice(func_get_args(), 1));
		/** @var TokensInterface $tokens */
		$tokens = ObjectManager::get(TokensInterface::class, function () {
			$tokens = new Tokens();
			ObjectManager::add(TokensInterface::class, $tokens, TRUE);
			return $tokens;
		});
		$tokens->add($alias, $instance);
		return $instance;
	}
}
