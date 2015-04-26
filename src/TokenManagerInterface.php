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
	 * @return static
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
	 * @param array $tokens
	 * @return static
	 */
	public static function setSessionTokens(array $tokens = array());

	/**
	 * @param $alias
	 * @return PrototypeTokenInterface|NULL
	 */
	public static function getSessionToken($alias);

	/**
	 * @return array
	 */
	public static function getPrototypeTokens();

	/**
	 * @return array
	 */
	public static function getSessionTokens();

	/**
	 * @param string $alias
	 * @return boolean
	 */
	public static function hasSessionToken($alias);

	/**
	 * @param string $alias
	 * @param SessionTokenInterface $token
	 * @return static
	 */
	public static function registerSessionToken($alias, SessionTokenInterface $token);
}
