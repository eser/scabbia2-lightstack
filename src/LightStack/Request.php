<?php
/**
 * Scabbia2 LightStack Component
 * http://www.scabbiafw.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        https://github.com/scabbiafw/scabbia2-lightstack for the canonical source repository
 * @copyright   2010-2015 Scabbia Framework Organization. (http://www.scabbiafw.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace Scabbia\LightStack;

use Scabbia\LightStack\RequestInterface;

/**
 * Request implementation
 *
 * @package     Scabbia\LightStack
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 */
class Request implements RequestInterface
{
    /**
     * Gets endpoint
     *
     * For http, it's scheme://host:port/directory/
     *
     * @return string
     */
    public function getEndpoint()
    {

    }

    /**
     * Gets method
     *
     * @return string
     */
    public function getMethod()
    {

    }

    /**
     * Gets path info
     *
     * @return string
     */
    public function getPathInfo()
    {

    }

    /**
     * Gets remote ip
     *
     * @return string
     */
    public function getRemoteIp()
    {

    }

    /**
     * Gets accepted content-types
     *
     * @return array
     */
    public function getAcceptedContentTypes()
    {

    }

    /**
     * Gets accepted charsets
     *
     * @return array
     */
    public function getAcceptedCharsets()
    {

    }

    /**
     * Gets accepted encodings
     *
     * @return array
     */
    public function getAcceptedEncodings()
    {

    }

    /**
     * Gets accepted languages
     *
     * @return array
     */
    public function getAcceptedLanguages()
    {

    }

    /**
     * Determines whether the request is asynchronous or not
     *
     * @return bool
     */
    public function isAsynchronous()
    {

    }

    /**
     * Gets session id
     *
     * @return string
     */
    public function getSessionId()
    {

    }

    /**
     * Gets an item from GET collection
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function get($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from GET collection
     *
     * @return array
     */
    public function getAll()
    {

    }

    /**
     * Gets an item from POST collection
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function post($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from POST collection
     *
     * @return array
     */
    public function postAll()
    {

    }

    /**
     * Gets an item from FILES collection
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function file($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from FILES collection
     *
     * @return array
     */
    public function fileAll()
    {

    }

    /**
     * Gets an item from GET/POST/FILE collections
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function data($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from GET/POST/FILE collection
     *
     * @return array
     */
    public function dataAll()
    {

    }

    /**
     * Gets an item from SERVER collection
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function server($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from SERVER collection
     *
     * @return array
     */
    public function serverAll()
    {

    }

    /**
     * Gets an item from SESSION collection
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function session($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from SESSION collection
     *
     * @return array
     */
    public function sessionAll()
    {

    }

    /**
     * Gets an item from COOKIE collection
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function cookie($uKey, $uDefault = null)
    {

    }

    /**
     * Gets all items from COOKIE collection
     *
     * @return array
     */
    public function cookieAll()
    {

    }
}
