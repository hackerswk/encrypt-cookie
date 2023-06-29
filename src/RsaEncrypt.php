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
     * initialize
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
        if (empty($pub_key_path)) {
            throw new Exception ("Public key path is empty!");
        }
        $this->pub_key_path = $pub_key_path;
    }

    /**
     * set private key path from server path
     * 
     * @param $pri_key_path
     */
    public function setPriKeyPath($pri_key_path)
    {
        if (empty($pri_key_path)) {
            throw new Exception ("Private key path is empty!");
        }
        $this->pri_key_path = $pri_key_path;
    }

    /**
     * get public key from $pub_key_path
     */
    public function getPubKey()
    {
        if (empty($this->pub_key_path)) {
            throw new Exception ("Public key path is empty!");
        }
        $this->pub_key = openssl_pkey_get_public(file_get_contents($this->pub_key_path));
    }

    /**
     * get private key from $pri_key_path
     */
    public function getPriKey()
    {
        if (empty($this->pri_key_path)) {
            throw new Exception ("Private key path is empty!");
        }
        $this->pri_key = openssl_pkey_get_private(file_get_contents($this->pri_key_path));
    }

    /**
     * encrypt data then return
     * 
     * @param $data
     * @return String
     */
    public function setEncrypt($data)
    {
        if (empty($data)) {
            throw new Exception ("Data is empty!");
        }
        if (empty($this->pub_key)) {
            throw new Exception ("Public key is null!");
        }
        openssl_public_encrypt($data, $encrypt_data, $this->pub_key);

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
        if (empty($data)) {
            throw new Exception ("Data is empty!");
        }
        if (empty($this->pri_key)) {
            throw new Exception ("Private key is null!");
        }
        openssl_private_decrypt($data, $decrypt_data, $this->pri_key);

        return $decrypt_data;
    }
}