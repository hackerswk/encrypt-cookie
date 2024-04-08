<?php
/**
 * AES256 encrypt class
 *
 * @author      Stanley Sie <swookon@gmail.com>
 * @access      public
 * @version     Release: 1.0
 */

 namespace Stanleysie\EncryptCookie;

/**
 * AES256Encryption class provides methods for AES-256 encryption and decryption using OpenSSL.
 *
 * This class encrypts and decrypts data using AES-256-CBC algorithm with a given secret key.
 */
class AES256Encryption {
    /**
     * The secret key used for encryption and decryption.
     *
     * @var string
     */
    private $key;

    /**
     * Constructor to initialize the AES256Encryption object with the secret key.
     *
     * @param string $key The secret key used for encryption and decryption.
     */
    public function __construct($key) {
        $this->key = $key;
    }

    /**
     * Encrypts the given data using AES-256-CBC algorithm.
     *
     * @param string $data The data to be encrypted.
     * @return string The encrypted data.
     */
    public function encrypt($data) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
    }

    /**
     * Decrypts the given encrypted data using AES-256-CBC algorithm.
     *
     * @param string $data The encrypted data to be decrypted.
     * @return string|false The decrypted data, or false on failure.
     */
    public function decrypt($data) {
        $data = base64_decode($data);
        $ivLength = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($data, 0, $ivLength);
        $encrypted = substr($data, $ivLength);
        return openssl_decrypt($encrypted, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $iv);
    }
}
