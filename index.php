<?php

class MailTemplate 
{
	protected $file;
	protected $read;

	public function __construct($file)
	{
		$this->file_patch = $file;

		return $this;
	}

	public function open()
	{
		$this->file = fopen($this->file_patch, "r");
		return $this;
	}

	public function read()
	{
		$this->read = fread($this->file, filesize($this->file_patch));

		return $this;
	}

	public function setmail(array $search, array $replace)
	{
		$set = str_replace($search, $replace, $this->read);
		
		return $set;
	}

	public function __destruct()
	{
		fclose($this->file);
	}
}

$tpl = new MailTemplate('mail.html');
$test = $tpl->open()->read()
			->setmail(
				['{col1}', '{col2}', '{col3}', '{col4}', '{btn_text}', '{btn_link}'],
				['Farid', 'Test', 'tset', 'testestst', 'Atlasa daxil ol', 'http://localhost/attendance/daily']
			);
			
echo $test;
?>