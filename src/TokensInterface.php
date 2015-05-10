<?php
namespace Bleicker\Token;

use Bleicker\Container\Exception\AliasAlreadyExistsException;

/**
 * Class Tokens
 *
 * @package Bleicker\Token
 */
interface TokensInterface {

	/**
	 * @return array
	 */
	public static function storage();

	/**
	 * @param string $alias
	 * @return boolean
	 */
	public static function has($alias);

	/**
	 * @param string $alias
	 * @param TokenInterface $data
	 * @return static
	 * @throws AliasAlreadyExistsException
	 */
	public static function add($alias, $data);

	/**
	 * @return static
	 */
	public static function prune();

	/**
	 * @param string $alias
	 * @return TokenInterface
	 */
	public static function get($alias);

	/**
	 * @param string $alias
	 * @return static
	 */
	public static function remove($alias);
}