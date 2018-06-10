<?php
/**
* @author 		Peter Taiwo <peter@phoxphp.com>
* @package 		App\Composer
* @license 		MIT License
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
* SOFTWARE.
*/

namespace App;

use Kit\Glider\Composer as GliderConfigResolver;
use Kit\Console\Composer as ConsoleConfigResolver;
use Kit\Auth\Composer as AuthConfigResolver;
use Kit\Glider\Composer as GliderConfigResolver;
use Kit\Translation\Composer as TranslationConfigResolver;
use Kit\Validator\Composer as ValidatorConfigResolver;
use Kit\PhoxEngine\Composer as PhoxEngineConfigResolver;

class Composer
{

	/**
	* Runs after framework has been installed.
	*
	* @access 	public
	* @return 	<void>
	* @static
	*/
	public static function postCreateProjectCmd()
	{
		foreach(Composer::getConfigResolvers() as $configResolver) {
			$configResolver::postCreateProjectCmd();
		}
	}

	/**
	* Returns an array of configuration resolver class.
	*
	* @access 	protected
	* @return 	<Array>
	* @static
	*/
	protected static function getConfigResolvers() : Array
	{
		return [
			GliderConfigResolver::class, ConsoleConfigResolver::class, AuthConfigResolver::class,
			GliderConfigResolver::class, TranslationConfigResolver::class, ValidatorConfigResolver::class,
			PhoxEngineConfigResolver::class
		];
	}

}