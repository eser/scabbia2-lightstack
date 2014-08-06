<?php
/**
 * Scabbia2 LightStack
 * http://www.scabbiafw.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        http://github.com/scabbiafw/scabbia2-lightstack for the canonical source repository
 * @copyright   2010-2013 Scabbia Framework Organization. (http://www.scabbiafw.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace Scabbia\LightStack;

/**
 * Default methods needed for implementation of a response object
 *
 * @package     Scabbia\LightStack
 * @author      Eser Ozvataf <eser@sent.com>
 * @since       2.0.0
 *
 * @todo caching (etag, max-age, public/private etc.)
 * @todo http redirect if necessary
 * @todo mass cookie operations if necessary
 */
interface ResponseInterface
{
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

    /**
     * Sets a cookie
     *
     * @param string $uKey    name for the cookie
     * @param string $uValue  value for the cookie
     * @param int    $uTtl    time to live (in seconds)
     *
     * @return void
     */
    public function setCookie($uKey, $uValue, $uTtl = 0);
}
