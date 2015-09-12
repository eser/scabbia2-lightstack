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
use Scabbia\LightStack\ResponseInterface;

/**
 * Default methods needed for implementation of a middleware
 *
 * @package     Scabbia\LightStack
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 */
interface MiddlewareInterface
{
    /**
     * Generates a request object
     *
     * @param string $uMethod          method
     * @param string $uPathInfo        pathinfo
     * @param array  $uQueryParameters query parameters
     *
     * @return RequestInterface request object
     */
    public function generateRequest($uMethod, $uPathInfo, array $uQueryParameters);

    /**
     * Generates a request object from globals
     *
     * @return RequestInterface request object
     */
    public function generateRequestFromGlobals();

    /**
     * Handles a request
     *
     * @param RequestInterface $uRequest        request object
     * @param bool             $uIsSubRequest   whether is a sub-request or not
     *
     * @return ResponseInterface response object
     */
    public function handleRequest(RequestInterface $uRequest, $uIsSubRequest);
}
