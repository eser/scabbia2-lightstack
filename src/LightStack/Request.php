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
    /** @type string  $method     request method */
    protected $method;
    /** @type string  $pathinfo   request path info */
    protected $pathinfo;
    /** @type array   $details    request details */
    protected $details;


    /**
     * Generates a request object from globals
     *
     * @return RequestInterface request object
     *
     * @todo fixme: start session if necessary
     */
    public static function generateFromGlobals()
    {
        // request method
        if (isset($_SERVER["X-HTTP-METHOD-OVERRIDE"])) {
            $tMethod = strtoupper($_SERVER["X-HTTP-METHOD-OVERRIDE"]);
        } elseif (isset($_POST["_method"])) {
            $tMethod = strtoupper($_POST["_method"]);
        } elseif (isset($_SERVER["REQUEST_METHOD"])) {
            $tMethod = strtoupper($_SERVER["REQUEST_METHOD"]);
        } else {
            $tMethod = "GET";
        }

        // request uri
        if (isset($_SERVER["REQUEST_URI"])) {
            if (strncmp(
                $_SERVER["REQUEST_URI"],
                $_SERVER["HTTP_HOST"],
                $tHostLength = strlen($_SERVER["HTTP_HOST"])
            ) === 0) {
                $tRequestUri = substr($_SERVER["REQUEST_URI"], $tHostLength);
            } else {
                $tRequestUri = $_SERVER["REQUEST_URI"];
            }
        } elseif (isset($_SERVER["ORIG_PATH_INFO"])) {
            $tRequestUri = $_SERVER["ORIG_PATH_INFO"];

            if (isset($_SERVER["QUERY_STRING"]) && strlen($_SERVER["QUERY_STRING"]) > 0) {
                $tRequestUri .= "?" . $_SERVER["QUERY_STRING"];
            }
        } else {
            $tRequestUri = "";
        }

        // request pathroot
        $tPathRoot = trim(str_replace("\\", "/", pathinfo($_SERVER["SCRIPT_NAME"], PATHINFO_DIRNAME)), "/");
        if (strlen($tPathRoot) > 0) {
            $tPathRoot = "/{$tPathRoot}";
        }

        // request pathinfo
        if (($tPos = strpos($tRequestUri, "?")) !== false) {
            $tBaseUriPath = substr($tRequestUri, 0, $tPos);
        } else {
            $tBaseUriPath = $tRequestUri;
        }

        $tPathInfo = substr($tBaseUriPath, strlen($tPathRoot));

        // generate request
        return new static(
            $tMethod,
            $tPathInfo,
            [
                "get" => $_GET,
                "post" => $_POST,
                "files" => $_FILES,
                "server" => $_SERVER,
                "session" => isset($_SESSION) ? $_SESSION : null,
                "cookies" => $_COOKIE,
                "headers" => function_exists('getallheaders') ? getallheaders() : null
            ]
        );
    }

    /**
     * Initializes a request
     *
     * @param string      $uMethod            method
     * @param string      $uPathInfo          pathinfo
     * @param array|null  $uDetails           available keys: get, post, files, server, session, cookies, headers
     *
     * @return Request request object
     */
    public function __construct($uMethod, $uPathInfo, array $uDetails = null)
    {
        $this->method = $uMethod;
        $this->pathinfo = $uPathInfo;
        $this->details = $uDetails;

        foreach (["get", "post", "files", "server", "session", "cookies", "headers"] as $tCollection) {
            if (!isset($this->details[$tCollection])) {
                $this->details[$tCollection] = [];
            }
        }
    }

    /**
     * Gets endpoint
     *
     * For http, it's scheme://host:port/directory/
     *
     * @return string
     */
    public function getEndpoint()
    {
        return sprintf(
            "%s://%s%s",
            $this->details["server"]["REQUEST_SCHEME"],
            $this->details["server"]["HTTP_HOST"],
            $this->details["server"]["SERVER_PORT"] != "80" ? ":" . $this->details["server"]["SERVER_PORT"] : ""
        );
    }

    /**
     * Gets method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Gets path info
     *
     * @return string
     */
    public function getPathInfo()
    {
        return $this->pathinfo;
    }

    /**
     * Gets remote ip
     *
     * @return string
     */
    public function getRemoteIp()
    {
        if (isset($this->details["server"]["HTTP_CLIENT_IP"])) {
            return $this->details["server"]["HTTP_CLIENT_IP"];
        }

        if (isset($this->details["server"]["REMOTE_ADDR"])) {
            return $this->details["server"]["REMOTE_ADDR"];
        }

        if (isset($this->details["server"]["HTTP_X_FORWARDED_FOR"])) {
            return $this->details["server"]["HTTP_X_FORWARDED_FOR"];
        }

        return "0.0.0.0";
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
        if (!isset($this->details["server"]["HTTP_X_REQUESTED_WITH"])) {
            return false;
        }

        return (strtolower($this->details["server"]["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest");
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
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function get($uKey, $uDefault = null)
    {
        if (!isset($this->details["get"][$uKey])) {
            return $uDefault;
        }

        return $this->details["get"][$uKey];
    }

    /**
     * Gets an item from POST collection
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function post($uKey, $uDefault = null)
    {
        if (!isset($this->details["post"][$uKey])) {
            return $uDefault;
        }

        return $this->details["post"][$uKey];
    }

    /**
     * Gets an item from FILES collection
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function file($uKey, $uDefault = null)
    {
        if (!isset($this->details["files"][$uKey])) {
            return $uDefault;
        }

        return $this->details["files"][$uKey];

    }

    /**
     * Gets an item from GET/POST/FILE collections
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function data($uKey, $uDefault = null)
    {
        foreach (["get", "post", "files"] as $tCollection) {
            if (isset($this->details[$tCollection][$uKey])) {
                return $this->details[$tCollection][$uKey];
            }
        }

        return $uDefault;
    }

    /**
     * Gets an item from SERVER collection
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function server($uKey, $uDefault = null)
    {
        if (!isset($this->details["server"][$uKey])) {
            return $uDefault;
        }

        return $this->details["server"][$uKey];

    }

    /**
     * Gets an item from SESSION collection
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function session($uKey, $uDefault = null)
    {
        if (!isset($this->details["session"][$uKey])) {
            return $uDefault;
        }

        return $this->details["session"][$uKey];

    }

    /**
     * Gets an item from COOKIE collection
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function cookie($uKey, $uDefault = null)
    {
        if (!isset($this->details["cookies"][$uKey])) {
            return $uDefault;
        }

        return $this->details["cookies"][$uKey];

    }

    /**
     * Gets an item from HEADER collection
     *
     * @param string      $uKey         the key for the value
     * @param mixed       $uDefault     default value if the key does not exist in the collection
     *
     * @return mixed value for the key
     */
    public function header($uKey, $uDefault = null)
    {
        if (!isset($this->details["headers"][$uKey])) {
            return $uDefault;
        }

        return $this->details["headers"][$uKey];

    }

    /**
     * Checks if item is in the specified collection
     *
     * @param string|null $uCollection  the key of the collection
     * @param string      $uKey         the key for the value
     *
     * @return bool true if item exists in the collection
     */
    public function has($uCollection, $uKey)
    {
        return isset($this->details[$uCollection][$uKey]));
    }

    /**
     * Gets all items from GET/POST/FILE/SERVER/SESSION/COOKIE/HEADER collections
     *
     * @param string|null $uCollection  the key if only one collection's items are needed
     *
     * @return array available collections: get, post, files, server, session, cookies, headers
     */
    public function all($uCollection = null)
    {
        if ($uCollection !== null) {
            return $this->details[$uCollection];
        }

        return $this->details;
    }
}
