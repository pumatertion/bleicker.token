<?php

namespace Bleicker\Token;

use Bleicker\Account\AccountInterface;

/**
 * Class SessionTokenInterface
 *
 * @package Bleicker\Token
 */
interface SessionTokenInterface extends TokenInterface {

	const CREDENTIAL_VALUE = 'simulatedCredentialValueFromSession';

	/**
	 * @return string
	 */
	public function getSessionKey();

	/**
	 * @return AccountInterface
	 */
	public function reconstituteAccountFromSession();

	/**
	 * @return boolean
	 */
	public function logout();
}
