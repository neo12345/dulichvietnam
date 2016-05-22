<?php
/**
 * PHP version 5
 *  
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 * 
 * 
 */

namespace Vendor\Package;

use FooInterface;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

/**
 * Class Foo
 * 
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Foo extends Bar implements FooInterface
{

    /**
     * Sample function()
     * 
     * @param int $a Dasdasdsa
     * @param int $b Adsadas
     * 
     * @return type Description
     */
    public function sampleFunction($a, $b = null)
    {
        if ($a === $b) {
            bar();
        } else if ($a > $b) {
            $foo->bar($arg1);
        } else {
            BazClass::bar($arg2, $arg3);
        }
    }
//end sampleFunction()

    /**
     * Bar()
     * 
     * @return string Description
     */
    final public static function bar()
    {
        // Method body.
        echo 1;
    }
//end bar()
}

//end class

?>