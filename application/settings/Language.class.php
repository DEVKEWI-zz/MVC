<?php
class Language
{
	private static $content;

	public function setLanguage($language = '')
	{
		$file = "application/settings/langs/{$language}.json";
		if (file_exists($file)) {
			self::$content = file_get_contents($file);
		}
	}

	public function getTranslation()
	{
		if (is_null(self::$content)) {
			$this->setLanguage(language);
		}
		return json_decode(self::$content);
	}

}