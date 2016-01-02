<?php
/**
 * Scabbia2 LightStack Component
 * https://github.com/eserozvataf/scabbia2
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        https://github.com/eserozvataf/scabbia2-lightstack for the canonical source repository
 * @copyright   2010-2016 Eser Ozvataf. (http://eser.ozvataf.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace Scabbia\LightStack;

/**
 * Default methods needed for implementation of a response object
 *
 * @package     Scabbia\LightStack
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 *
 * @todo caching (etag, max-age, public/private etc.)
 * @todo http redirect if necessary
 * @todo mass header, cookie and session operations if necessary
 */
interface ResponseInterface
{
    /**
     * Sets weather request is handled or not
     *
     * @param bool   $uHandled     the status if request is handled
     *
     * @return void
     */
    public function setHandled($uHandled);

    /**
     * Gets weather request is handled or not
     *
     * @return bool is handled
     */
    public function getHandled();

    /**
     * Sets the status code and description
     *
     * @param int    $uStatusCode  the status or exit code
     * @param string $uDescription description for the status
     *
     * @return void
     */
    public function setStatus($uStatusCode, $uDescription);

    /**
     * Sets session id
     *
     * @param string $uId session id to be set
     *
     * @return void
     */
    public function setSessionId($uId);

    /**
     * Sets a session variable to be sent
     *
     * @param string $uKey     key for the session variable
     * @param string $uValue   value for the session variable
     *
     * @return void
     */
    public function setSession($uKey, $uValue);

    /**
     * Sends a directive to remove session variable
     *
     * @param string $uKey     key for the session variable
     *
     * @return void
     */
    public function removeSession($uKey);

    /**
     * Gets a session variable to be sent
     *
     * @param string $uKey     key for the session variable
     *
     * @return string value
     */
    public function getSession($uKey);

    /**
     * Sends a directive to destroy all session data
     *
     * @return void
     */
    public function closeSession();

    /**
     * Sets a cookie variable to be sent
     *
     * @param string $uKey     key for the cookie variable
     * @param string $uValue   value for the cookie variable
     * @param int    $uTtl     time to live (in seconds)
     *
     * @return void
     */
    public function setCookie($uKey, $uValue, $uTtl = 0);

    /**
     * Sends a directive to remove cookie variable
     *
     * @param string $uKey     key for the cookie variable
     *
     * @return void
     */
    public function removeCookie($uKey);

    /**
     * Gets a cookie variable to be sent
     *
     * @param string $uKey     key for the cookie variable
     *
     * @return string value
     */
    public function getCookie($uKey);

    /**
     * Sets a header to be sent
     *
     * @param string $uKey     key for the header
     * @param string $uValue   value for the header
     * @param bool   $uReplace replace existing headers with the same name
     *
     * @return void
     */
    public function setHeader($uKey, $uValue, $uReplace = false);

    /**
     * Removes a header to be sent
     *
     * @param string $uKey     key for the header
     *
     * @return void
     */
    public function removeHeader($uKey);

    /**
     * Gets a header to be sent
     *
     * @param string $uKey     key for the header
     *
     * @return string value
     */
    public function getHeader($uKey);

    /**
     * Sets the content
     *
     * @param string $uContent response context
     *
     * @return void
     */
    public function setContent($uContent);

    /**
     * Gets the content to be sent
     *
     * @return string content
     */
    public function getContent();
}
