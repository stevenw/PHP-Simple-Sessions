<?PHP
#	Simple Easy & Secure Sessions
#	The goal of this class is to make PHP's session functions easier & safer to use.
#	Written for PHP 5.2
#
#	Steven W
#	4/5/2011
#	https://github.com/stevenw/PHP-Simple-Sessions
Class Sess
{
	public $sess_name = 'session';
	public $lifetime = 3600;	// Default lifetime is one hour
	public $path = '/';
	public $domain = '';
	public $secure_only = FALSE;
	public $http_only = TRUE;
	public $regen_delete = FALSE;

	public function start_session()
	{
		session_name($this->sess_name);
		session_set_cookie_params($this->lifetime, $this->path, $this->domain, $this->secure_only, $this->http_only);
		session_start();
		session_regenerate_id($this->regen_delete);
	}

	public function set_session($array = Array())
	{
		foreach ($array as $k => $v)
		{
			$_SESSION[$k] = $v;
		}
	}

	public function kill_session()
	{
		$_SESSION = Array();
		session_destroy();
		setcookie($this->sess_name, "", time() - $this->lifetime);
	}

	// Helper Methods
	public function lifetime_minutes($int = 1)
	{
		$this->lifetime = 60 * $int;
	}

	public function lifetime_hours($int = 1)
	{
		$this->lifetime = 3600 * $int;
	}

	public function lifetime_days($int = 1)
	{
		$this->lifetime = 86400 * $int;
	}
}

/* End of file sess,class.php */
/* Location: /sess.class.php */