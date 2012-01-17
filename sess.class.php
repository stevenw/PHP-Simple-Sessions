<?PHP
#	Simple Easy & Secure Sessions
#	The goal of this class is to make PHP's session functions easier & safer to use.
#	Written for PHP 5.2
#
#	Steven W
#	https://github.com/stevenw/PHP-Simple-Sessions

Class Sess
{
	public $name = 'session';
	public $lifetime = 3600;	// Default lifetime is one hour
	public $path = '/';
	public $domain = '';
	public $forceSSL = FALSE;
	public $forceHTTP = TRUE;
	public $regenId = FALSE;

	public function start()
	{
		session_name($this->name);
		session_set_cookie_params($this->lifetime, $this->path, $this->domain, $this->forceSSL, $this->forceHTTP);
		session_start();
		session_regenerate_id($this->regenId);
	}

	public function set($array = Array())
	{
		foreach ($array as $k => $v)
		{
			$_SESSION[$k] = $v;
		}
	}

	public function kill()
	{
		$_SESSION = Array();
		session_destroy();
		setcookie($this->name, "", time() - $this->lifetime);
	}

	// Helper Methods
	public function lifetime_minutes($int = 1)
	{
		$this->lifetime = 60 * (int)$int;
	}

	public function lifetime_hours($int = 1)
	{
		$this->lifetime = 3600 * (int)$int;
	}

	public function lifetime_days($int = 1)
	{
		$this->lifetime = 86400 * (int)$int;
	}
}

/* End of file sess.class.php */