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

use Scabbia\LightStack\ResponseInterface;

/**
 * Response implementation
 *
 * @package     Scabbia\LightStack
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 */
class Response implements ResponseInterface
{
    /**
     * Initializes a response
     *
     * @param string|null      $uContent           method
     * @param int|null         $uStatus            http status
     * @param array|null       $uHeaders           headers information will be sent
     *
     * @return Response response object
     */
    public function __construct($uContent = null, $uStatus = null, array $uHeaders = null)
    {
        // TODO not implemented
    }

    /**
     * Sets weather request is handled or not
     *
     * @param bool   $uHandled     the status if request is handled
     *
     * @return void
     */
    public function setHandled($uHandled)
    {
        // TODO not implemented
    }

    /**
     * Gets weather request is handled or not
     *
     * @return bool is handled
     */
    public function getHandled()
    {
        // TODO not implemented
    }

    /**
     * Sets the status code and description
     *
     * @param int    $uStatusCode  the status or exit code
     * @param string $uDescription description for the status
     *
     * @return void
     */
    public function setStatus($uStatusCode, $uDescription)
    {
        // TODO not implemented
    }

    /**
     * Sets session id
     *
     * @param string $uId session id to be set
     *
     * @return void
     */
    public function setSessionId($uId)
    {
        // TODO not implemented
    }

    /**
     * Sets a session variable to be sent
     *
     * @param string $uKey     key for the session variable
     * @param string $uValue   value for the session variable
     *
     * @return void
     */
    public function setSession($uKey, $uValue)
    {
        // TODO not implemented
    }

    /**
     * Sends a directive to remove session variable
     *
     * @param string $uKey     key for the session variable
     *
     * @return void
     */
    public function removeSession($uKey)
    {
        // TODO not implemented
    }

    /**
     * Gets a session variable to be sent
     *
     * @param string $uKey     key for the session variable
     *
     * @return string value
     */
    public function getSession($uKey)
    {
        // TODO not implemented
    }

    /**
     * Sends a directive to destroy all session data
     *
     * @return void
     */
    public function closeSession()
    {
        // TODO not implemented
    }

    /**
     * Sets a cookie variable to be sent
     *
     * @param string $uKey     key for the cookie variable
     * @param string $uValue   value for the cookie variable
     * @param int    $uTtl     time to live (in seconds)
     *
     * @return void
     */
    public function setCookie($uKey, $uValue, $uTtl = 0)
    {
        // TODO not implemented
    }

    /**
     * Sends a directive to remove cookie variable
     *
     * @param string $uKey     key for the cookie variable
     *
     * @return void
     */
    public function removeCookie($uKey)
    {
        // TODO not implemented
    }

    /**
     * Gets a cookie variable to be sent
     *
     * @param string $uKey     key for the cookie variable
     *
     * @return string value
     */
    public function getCookie($uKey)
    {
        // TODO not implemented
    }

    /**
     * Sets a header to be sent
     *
     * @param string $uKey     key for the header
     * @param string $uValue   value for the header
     * @param bool   $uReplace replace existing headers with the same name
     *
     * @return void
     */
    public function setHeader($uKey, $uValue, $uReplace = false)
    {
        // TODO not implemented
    }

    /**
     * Removes a header to be sent
     *
     * @param string $uKey     key for the header
     *
     * @return void
     */
    public function removeHeader($uKey)
    {
        // TODO not implemented
    }

    /**
     * Gets a header to be sent
     *
     * @param string $uKey     key for the header
     *
     * @return string value
     */
    public function getHeader($uKey)
    {
        // TODO not implemented
    }

    /**
     * Sets the content
     *
     * @param string $uContent response context
     *
     * @return void
     */
    public function setContent($uContent)
    {
        // TODO not implemented
    }

    /**
     * Gets the content to be sent
     *
     * @return string content
     */
    public function getContent()
    {
        // TODO not implemented
    }
}
