<?php

namespace Bleicker\Token;

use Bleicker\Container\AbstractContainer;

/**
 * Class Tokens
 *
 * @package Bleicker\Token
 */
class Tokens extends AbstractContainer implements TokensInterface {

	/**
	 * @var array
	 */
	public static $storage = [];

	/**
	 * @param string $alias
	 * @return TokenInterface
	 */
	public static function get($alias) {
		return parent::get($alias);
	}

	/**
	 * @param string $alias
	 * @param TokenInterface $data
	 * @return static
	 */
	public static function add($alias, $data) {
		return parent::add($alias, $data);
	}
}
