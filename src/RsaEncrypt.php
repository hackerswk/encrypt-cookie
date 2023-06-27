<?php
/**
 * OPENSSL encrypt class
 *
 * @author      Stanley Sie <swookon@gmail.com>
 * @access      public
 * @version     Release: 1.0
 */

namespace Encrypt;

class RsaEncrypt
{
    /**
     * rsa public key path
     *
     * @var String
     */
    private $pub_key_path;

    /**
     * rsa private key path
     *
     * @var String 
     */
    private $pri_key_path;

    /**
     * rsa public key
     *
     * @var String 
     */
    private $pub_key;
    
    /**
     * rsa private key
     *
     * @var String 
     */
    private $pri_key;

    /**
     * initialize needed vars and read config.php
     */
    public function __construct()
    {
    
    }

    /**
     * set public key path from server path
     * 
     * @param $pub_key_path
     */
    public function setPubKeyPath($pub_key_path)
    {
        $this->pub_key_path = $pub_key_path;
    }

    /**
     * set private key path from server path
     * 
     * @param $pri_key_path
     */
    public function setPriKeyPath($pri_key_path)
    {
        $this->pri_key_path = $pri_key_path;
    }

    /**
     * get public key from $pub_key_path
     */
    public function getPubKey()
    {
        $this->pub_key = openssl_pkey_get_public(file_get_contents($this->pub_key_path));
    }

    /**
     * get private key from $pri_key_path
     */
    public function getPriKey()
    {
        $this->pri_key = openssl_pkey_get_private(file_get_contents($pri_key_path));
    }

    /**
     * encrypt data then return
     * 
     * @param $data
     * @return String
     */
    public function setEncrypt($data)
    {
        $encrypt_data = openssl_public_encrypt($data, $encrypt_data, $this->pub_key);

        return $encrypt_data;
    }

    /**
     * decrypt data then return
     * 
     * @param $data
     * @return String
     */
    public function setDecrypt($data)
    {
        $decrypt_data = openssl_private_decrypt($data, $decrypt_data, $this->pri_key);

        return $decrypt_data;
    }
}