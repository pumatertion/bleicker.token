<?php
namespace Bleicker\Token;

/**
 * Interface TokenManager
 *
 * @package Bleicker\Token
 */
interface TokenManagerInterface {

	/**
	 * @param string $alias
	 * @param TokenInterface $token
	 */
	public static function registerPrototypeToken($alias, TokenInterface $token);

	/**
	 * @param string $alias
	 * @return TokenInterface|NULL
	 */
	public static function getPrototypeToken($alias);

	/**
	 * @param string $alias
	 * @return boolean
	 */
	public static function hasToken($alias);

	/**
	 * @return array
	 */
	public static function getPrototypeTokens();
}