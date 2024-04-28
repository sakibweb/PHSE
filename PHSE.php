<?php
/**
 * Class PHSE
 * Author: Sakibur Rahman @sakibweb
 * A utility class for managing sessions in PHP applications.
 * Provides methods for adding, updating, removing, and accessing session variables.
 */
 
class PHSE {
    private static $instance;

    private function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

	/**
	 * Starts a PHP session if not already started.
	 */
	public static function start() {
		if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
	}

    /**
     * Add a session variable.
     *
     * @param string $key The key of the session variable.
     * @param mixed $value The value of the session variable.
     * @param int|null $expiry The expiration time for the session variable in minutes. Null for no expiration.
     */
    public static function add($key, $value, $expiry = null) {
        $_SESSION[$key] = array(
            'value' => $value,
            'expiry' => $expiry !== null ? time() + ($expiry * 60) : null
        );
    }

    /**
     * Update a session variable.
     *
     * @param string $key The key of the session variable.
     * @param mixed $value The new value of the session variable.
     */
    public static function update($key, $value) {
        if (isset($_SESSION[$key])) {
            $_SESSION[$key]['value'] = $value;
        }
    }

    /**
     * Remove a session variable.
     *
     * @param string $key The key of the session variable to remove.
     */
    public static function remove($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Get the value of a session variable.
     *
     * @param string $key The key of the session variable.
     * @return mixed|null The value of the session variable if exists and not expired, null otherwise.
     */
    public static function get($key) {
        if (isset($_SESSION[$key])) {
            if ($_SESSION[$key]['expiry'] !== null && $_SESSION[$key]['expiry'] < time()) {
                self::remove($key);
                return null;
            }
            return $_SESSION[$key]['value'];
        }
        return null;
    }

    /**
     * Check if a session variable is active (exists and not expired).
     *
     * @param string $key The key of the session variable.
     * @return bool True if the session variable is active, false otherwise.
     */
    public static function isActive($key) {
        return isset($_SESSION[$key]);
    }

    /**
     * Expire a session variable.
     *
     * @param string $key The key of the session variable to expire.
     */
    public static function expire($key) {
        self::remove($key);
    }

    /**
     * Expire all session variables.
     */
    public static function expireAll() {
        session_unset();
    }

    /**
     * Remove all session variables and destroy the session.
     */
    public static function removeAll() {
        session_destroy();
    }

    /**
     * Regenerate the session ID.
     */
    public static function regenerateId() {
        session_regenerate_id(true);
    }

    /**
     * Get all session variables.
     *
     * @return array An associative array of session variables.
     */
    public static function getAll() {
        return $_SESSION;
    }

    /**
     * Get details of expired session variables.
     *
     * @return array An associative array containing details of expired session variables.
     */
    public static function getExpiredDetails() {
        $expired = array();
        foreach ($_SESSION as $key => $value) {
            if ($value['expiry'] !== null && $value['expiry'] < time()) {
                $expired[$key] = $value['value'];
            }
        }
        return $expired;
    }
}
?>
