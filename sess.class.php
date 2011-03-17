<?PHP
#	Sess
#	The goal of this class is to make PHP's session functions easier & safer to use.
#
#	Steven W
#	03/16/2011
#	https://github.com/stevenw/PHP-Simple-Sessions
Class Sess
{
	public $sess_name = 'session';
	public $lifetime = 3600;	// Default lifetime is One Hour
	public $path = '/';
	public $domain = '';
	public $secure_only = FALSE;
	public $http_only = TRUE;

	function start_session()
	{
		session_name($this->sess_name);
		session_set_cookie_params($this->lifetime, $this->path, $this->domain, $this->secure_only, $this->http_only);
		session_start();
	}

	function set_session($info = Array())
	{
		session_regenerate_id(TRUE);

		foreach ($info as $k => $v)
		{
			$_SESSION[$k] = $v;
		}
	}

	function kill_session()
	{
		$_SESSION = Array();
		session_destroy();
		setcookie($this->sess_name, "", time() - $this->lifetime);
	}
}

/* End of file sess,class.php */
/* Location: /sess,class.php */