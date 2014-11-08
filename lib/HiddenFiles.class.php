<?php

/**
 * Class : HiddenFiles
 * 
 * @name HiddenFiles
 * @author Sauleau Sven
 * @copyright Sauleau Sven (http://www.xtuc.fr) 2014
 * @license CC BY 4.0 (http://creativecommons.org/licenses/by/4.0/)
 * @version 1.0
 */

class HiddenFiles {

	protected $dir;
	
	/**
	 * Constructer
	 * @param string $dir
	 */
	function __construct($dir = NULL)
	{
		if(is_null($dir))
		{
			$this->dir = getcwd() . DIRECTORY_SEPARATOR;
		}
		else 
		{
			if(is_dir($dir))
			{
				$this->dir = $dir;
			}
			else 
			{
				exit($dir . " isn't a dir or isn't writable");
			}
		}
	}
	
	/**
	 * @name create image
	 * @param string $image
	 * @param string $archive
	 * @param string $output
	 * @return string
	 */
	function create($image = "image.jpg", $archive = "archive", $output = "ArchivedImage")
	{
		if(file_exists($this->dir . $image))
		{		
			if(file_exists($this->dir . $archive . ".rar"))
			{
				$path_parts = pathinfo($this->dir . $image);
				$output = $this->dir . "$output." . $path_parts['extension'];
				
				/**
				 * Remove file for update
				 */
				if(file_exists($output))
				{
					unlink($output);
				}
				
				return exec("copy /b " . $this->dir . "$image + " . $this->dir . "$archive.rar $output");
			}
			else
			{
				exit("Invalid parameters in create function, archive : " . $this->dir . $archive . ".rar doesn't exists");
			}
		}
		else 
		{
			exit("Invalid parameters in create function, image : " . $this->dir . $image . " doesn't exists");
		}
	}
	
	/**
	 * @name Extract hidden archive from an image
	 * @param string $image
	 * @param string $output
	 * @return boolean
	 */
	function extract($image = "image.jpg", $output = "archive")
	{
		$image = $this->dir . $image;
		
		if(file_exists($image))
		{
			if(rename($image, $this->dir . $output . ".rar"))
			{
				return TRUE;
			}
			else 
			{
				return FALSE;
			}
		}
		else
		{
			exit("Invalid parameters in create function, image : $image doesn't exists");
		}
	}
	
}