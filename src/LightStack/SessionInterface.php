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

/**
 * Default methods needed for implementation of a session object
 *
 * @package     Scabbia\LightStack
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 *
 * @todo session start and destroy if necessary
 */
interface SessionInterface
{
    /**
     * Gets session id
     *
     * @return string
     */
    public function getId();

    /**
     * Sets session id
     *
     * @param string $uId session id to be set
     *
     * @return void
     */
    public function setId($uId);

    /**
     * Checks session if it has the element with the key
     *
     * @param string $uKey     the key for the value
     *
     * @return bool true if session has the key
     */
    public function containsKey($uKey);

    /**
     * Gets an item from session
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uDefault default value if the key does not set in the session
     *
     * @return mixed value for the key
     */
    public function get($uKey, $uDefault = null);

    /**
     * Gets all items from session
     *
     * @return array
     */
    public function getAll();

    /**
     * Sets an item from session
     *
     * @param string $uKey     the key for the value
     * @param mixed  $uValue value for the item
     *
     * @return void
     */
    public function set($uKey, $uValue);

    /**
     * Sets an item from session
     *
     * @param array $uValues values to be set
     *
     * @return void
     */
    public function setRange($uValues);

    /**
     * Remove an item from session
     *
     * @param string $uKey     the key for the value
     *
     * @return void
     */
    public function remove($uKey);

    /**
     * Clears all items from session
     *
     * @return void
     */
    public function clear();
}
