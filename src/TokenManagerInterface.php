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
	 * @param PrototypeTokenInterface $token
	 */
	public static function registerPrototypeToken($alias, PrototypeTokenInterface $token);

	/**
	 * @param string $alias
	 * @return PrototypeTokenInterface|NULL
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