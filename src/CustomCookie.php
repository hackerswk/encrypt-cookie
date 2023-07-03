<?php
/**
 * Custom cookie class
 *
 * @author      Stanley Sie <swookon@gmail.com>
 * @access      public
 * @version     Release: 1.0
 */

namespace Stanleysie\EncryptCookie;

use \Exception as Exception;

class CustomCookie
{
    /**
     * cookie name
     *
     * @var String
     */
    private $cookie_name;

    /**
     * cookie value
     *
     * @var String 
     */
    private $cookie_val;

    /**
     * cookie expire time
     *
     * @var String 
     */
    private $cookie_expire_time;
    
    /**
     * cookie path
     *
     * @var String 
     */
    private $cookie_path;

    /**
     * cookie domain
     *
     * @var String 
     */
    private $cookie_domain;

    /**
     * cookie secure
     *
     * @var Bool
     */
    private $cookie_secure;

    /**
     * cookie http only
     *
     * @var Bool
     */
    private $cookie_http;

    /**
     * initialize
     */
    public function __construct()
    {
    
    }

    /**
     * set cookie name
     * 
     * @param $canme
     */
    public function setCookieName($cname)
    {
        if (empty($cname)) {
            throw new Exception ("cname is empty!");
        }
        $this->cookie_name = $cname;
    }

    /**
     * set cookie value
     * 
     * @param $cvalue
     */
    public function setCookieValue($cvalue)
    {
        if (empty($cvalue)) {
            throw new Exception ("cvalue is empty!");
        }
        $this->cookie_val = $cvalue;
    }

    /**
     * set cookie expire time
     * 
     * @param $cexpire_time
     */
    public function setCookieExpireTime($cexpire_time)
    {
        if (empty($cexpire_time)) {
            throw new Exception ("cexpire_time is empty!");
        }
        if (!is_int($expire_time)) {
            throw new Exception ("cexpire_time is not integer!");
        }
        $this->cookie_expire_time = $cexpire_time;
    }

    /**
     * set cookie path
     * 
     * @param $cpath
     */
    public function setCookiePath($cpath)
    {
        if (empty($cpath)) {
            throw new Exception ("cpath is empty!");
        }
        $this->cookie_path = $cpath;
    }

    /**
     * set cookie domain
     * 
     * @param $cdomain
     */
    public function setCookieDomain($cdomain)
    {
        if (empty($cdomain)) {
            throw new Exception ("cdomain is empty!");
        }
        $this->cookie_domain = $cdomain;
    }

    /**
     * set cookie secure
     * 
     * @param $csecure
     */
    public function setCookieSecure($csecure)
    {
        if (empty($csecure)) {
            throw new Exception ("csecure is empty!");
        }
        if (!is_bool($csecure)) {
            throw new Exception ("csecure is not bool!");
        }
        $this->cookie_secure = $csecure;
    }

    /**
     * set cookie http
     * 
     * @param $chttp
     */
    public function setCookieHttp($chttp)
    {
        if (empty($chttp)) {
            throw new Exception ("chttp is empty!");
        }
        if (!is_bool($chttp)) {
            throw new Exception ("chttp is not bool!");
        }   
        $this->cookie_http = $chttp;
    }

    /**
     * get cookie name
     */
    public function getCookieName()
    {
        return $this->cookie_name;
    }

    /**
     * get cookie value
     */
    public function getCookieValue()
    {
        return $this->cookie_val;
    }

    /**
     * get cookie expire time
     */
    public function getCookieExpireTime()
    {
        return $this->cookie_expire_time;
    }

    /**
     * get cookie path
     */
    public function getCookiePath()
    {
        return $this->cookie_path;
    }

    /**
     * get cookie domain
     */
    public function getCookieDomain()
    {
        return $this->cookie_domain;
    }

    /**
     * get cookie secure
     */
    public function getCookieSecure()
    {
        return $this->cookie_secure;
    }

    /**
     * get cookie http
     */
    public function getCookieHttp()
    {
        return $this->cookie_http;
    }

    /**
     * combine cookie value
     * 
     * @param $uid, $data
     * @return String
     */
    public function combineCookieValue($uid, $data)
    {
        if (empty($uid)) {
            throw new Exception ("uid is empty!");
        }
        if (!is_int($uid)) {
            throw new Exception ("uid is not integer!");
        }
        if (empty($data)) {
            throw new Exception ("data is empty!");
        }

        $combine_data = $uid . ":::" . $data;

        return $combine_data;
    }

    /**
     * uncombine cookie value
     * 
     * @param $data
     * @return Array
     */
    public function unCombineCookieValue($data)
    {
        if (empty($data)) {
            throw new Exception ("Data is empty!");
        }

        $uncombine_data_array = explode(":::", $data);

        return $uncombine_data_array;
    }

    /**
     * verify cookie
     * 
     * @param $cname
     * @return Bool
     */
    public function verifyCookie($cname)
    {
        if (empty($cname)) {
            throw new Exception ("cname is empty!");
        }
        if (!isset($_COOKIE[$cname])) {
            return false;
        }

        return true;
    }

}