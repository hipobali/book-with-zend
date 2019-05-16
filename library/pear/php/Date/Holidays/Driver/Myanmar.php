<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * Driver for holidays in Japanese
 *
 * PHP Version 5
 *
 * Copyright (c) 1997-2008 The PHP Group
 *
 * This source file is subject to version 3.0 of the PHP license,
 * that is bundled with this package in the file LICENSE, and is
 * available at through the world-wide-web at
 * http://www.php.net/license/3_01.txt.
 * If you did not receive a copy of the PHP license and are unable to
 * obtain it through the world-wide-web, please send a note to
 * license@php.net so we can mail you a copy immediately.
 *
 * @category Date
 * @package  Date_Holidays
 * @author   Hideyuki Shimooka <shimooka@doyouphp.jp>
 * @license  http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version  CVS: $Id$
 * @link     http://pear.php.net/package/Date_Holidays
 * @see      http://www.h3.dion.ne.jp/~sakatsu/holiday_topic.htm
 */

/**
 * Extends Date_Holidays_Driver
 */
require_once 'Date/Holidays/Driver.php';

/**
 * The gradient parameter of the approximate expression
 * to calculate equinox day
 *
 * @access public
 */
define('DATE_HOLIDAYS_EQUINOX_GRADIENT', 0.242194);

/**
 * The initial parameter of the approximate expression
 * to calculate vernal equinox day from 1948 to 1979
 *
 * @access public
 */
define('DATE_HOLIDAYS_VERNAL_EQUINOX_PARAM_1979', 20.8357);

/**
 * The initial parameter of the approximate expression
 * to calculate vernal equinox day from 1980 to 2099
 *
 * @access public
 */
define('DATE_HOLIDAYS_VERNAL_EQUINOX_PARAM_2099', 20.8431);

/**
 * The initial parameter of the approximate expression
 * to calculate vernal equinox day from 2100 to 2150
 *
 * @access public
 */
define('DATE_HOLIDAYS_VERNAL_EQUINOX_PARAM_2150', 21.8510);

/**
 * The initial parameter of the approximate expression
 * to calculate autumnal equinox day from 1948 to 1979
 *
 * @access public
 */
define('DATE_HOLIDAYS_AUTUMNAL_EQUINOX_PARAM_1979', 23.2588);

/**
 * The initial parameter of the approximate expression
 * to calculate autumnal equinox day from 1980 to 2099
 *
 * @access public
 */
define('DATE_HOLIDAYS_AUTUMNAL_EQUINOX_PARAM_2099', 23.2488);

/**
 * The initial parameter of the approximate expression
 * to calculate autumnal equinox day from 2100 to 2150
 *
 * @access public
 */
define('DATE_HOLIDAYS_AUTUMNAL_EQUINOX_PARAM_2150', 24.2488);

/**
 * Class that calculates Japanese holidays
 *
 * @category   Date
 * @package    Date_Holidays
 * @subpackage Driver
 * @author     Hideyuki Shimooka <shimooka@doyouphp.jp>
 * @license    http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version    CVS: $Id$
 * @link       http://pear.php.net/package/Date_Holidays
 * @see        http://www.h3.dion.ne.jp/~sakatsu/holiday_topic.htm
 */
class Date_Holidays_Driver_Myanmar extends Date_Holidays_Driver
{
    /**
     * This driver's name
     *
     * @access protected
     * @var    string
     */
    var $_driverName = 'Myanmar';

    /**
     * A translation file name
     *
     * @access private
     */
    var $_translationFile = null;

    /**
     * A translation locale
     *
     * @access private
     */
    var $_translationLocale = null;

    /**
     * Constructor
     *
     * Use the Date_Holidays::factory() method to construct an object of a
     * certain driver
     *
     * @access protected
     */
    public function __construct()
    {
    }

    /**
     * Build the internal arrays that contain data about the calculated holidays
     *
     * @access protected
     * @return boolean true on success, otherwise a PEAR_ErrorStack object
     * @throws object PEAR_ErrorStack
     */
    function _buildHolidays()
    {
        parent::_buildHolidays();

        $this->_clearHolidays();

        $this->_buildIndependence();
        $this->_buildKayinNewYear();
        $this->_buildUnion();
        $this->_buildPeasants();
        $this->_buildArmedForces();
        $this->_buildMahaThingyan1();
        $this->_buildMahaThingyan2();
        $this->_buildMahaThingyan3();
        $this->_buildMahaThingyan4();
        $this->_buildMahaThingyan5();
        $this->_buildMahaThingyan6();
        $this->_buildMahaThingyan7();
        $this->_buildMahaThingyan8();
        $this->_buildMahaThingyan9();
        $this->_buildMahaThingyan10();
        $this->_buildMay();  
        $this->_buildMartyrs();   
        $this->_buildNational();
        $this->_buildChristmas();

        return true;
    }

    /**
     * Method that returns an array containing the ISO3166 codes that may possibly
     * identify a driver.
     *
     * @static
     * @access public
     * @return array possible ISO3166 codes
     */
    function getISO3166Codes()
    {
        return array('myan', 'myan');
    }

    /**
     * Build day of New Year's Day
     *
     * @access private
     * @return void
     */
    function _buildIndependence()
    {
        $this->_addHoliday(
            'Independence',
            $this->_year . '-01-04',
            'Independence\'s Day'
        );
    }

    /**
     * Build day of Coming of Age Day
     *
     * @access private
     * @return void
     */
    function _buildKayinNewYear()
    {
        
         $this->_addHoliday(
            'KayinNewYear',
            $this->_year . '-01-10',
            'KayinNewYear Day'
        );
    }

    /**
     * Build day of National Foundation Day
     *
     * @access private
     * @return void
     */
    function _buildUnion()
    {
       
            $this->_addHoliday(
                'Union',
                $this->_year . '-02-12',
                'Union Day'
            );
        
    }

    /**
     * Build day of Vernal Equinox Day
     *
     * Use approximate expression to calculate equinox day internally.
     *
     * @access private
     * @return void
     * @see    http://www.h3.dion.ne.jp/~sakatsu/holiday_topic.htm (in Japanese)
     */
    function _buildPeasants()
    {
       $this->_addHoliday(
                'Peasants',
                $this->_year . '-03-02',
                'Peasants Day'
            ); 
    }

    /**
     * Build day of Showa Day
     *
     * @access private
     * @return void
     */
    
    /**
     * Build day of Constitution Memorial Day
     *
     * @access private
     * @return void
     */
    function _buildArmedForces()
    {
       
            $this->_addHoliday(
                'ArmedForces',
                $this->_year . '-03-27',
                'ArmedForces  Day'
            );
        
    }

    /**
     * Build day of Greenery Day
     *
     * @access private
     * @return void
     */
    function _buildMahaThingyan1()
    {
       $this->_addHoliday(
                'MahaThingyan1',
                $this->_year . '-04-11',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan2()
    {
       $this->_addHoliday(
                'MahaThingyan2',
                $this->_year . '-04-12',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan3()
    {
       $this->_addHoliday(
                'MahaThingyan3',
                $this->_year . '-04-13',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan4()
    {
       $this->_addHoliday(
                'MahaThingyan4',
                $this->_year . '-04-14',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan5()
    {
       $this->_addHoliday(
                'MahaThingyan5',
                $this->_year . '-04-15',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan6()
    {
       $this->_addHoliday(
                'MahaThingyan6',
                $this->_year . '-04-16',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan7()
    {
       $this->_addHoliday(
                'MahaThingyan7',
                $this->_year . '-04-17',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan8()
    {
       $this->_addHoliday(
                'MahaThingyan8',
                $this->_year . '-04-18',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan9()
    {
       $this->_addHoliday(
                'MahaThingyan9',
                $this->_year . '-04-19',
                'MahaThingyan  Day'
            );
    }
    function _buildMahaThingyan10()
    {
       $this->_addHoliday(
                'MahaThingyan10',
                $this->_year . '-04-20',
                'MahaThingyan  Day'
            );
    }

    /**
     * Build day of Children's Day
     *
     * @access private
     * @return void
     */
    function _buildMay()
    {
       
            $this->_addHoliday(
                'May',
                $this->_year . '-05-01',
                'May\'s Day'
            );
        
    }

    
  
    function _buildMartyrs()
    {
       
        $this->_addHoliday(
            'Martyrs',
            $this->_year . '-07-19',
            'Martyrs  Day'
        );
    }

    

    
    function _buildNational()
    {
       
            $this->_addHoliday(
                'National',
                $this->_year . '-11-24',
                'National  Day'
            );
        
    }

    /**
     * Build day of Labor Thanksgiving Day
     *
     * @access private
     * @return void
     */
    function _buildChristmas()
    {
    
            $this->_addHoliday(
                'Christmas',
                $this->_year . '-12-25',
                'Christmas Day'
            );
        
    }

    /**
     * Build day of Emperor's Birthday
     *
     * @access private
     * @return void
     */
    
    function _clearHolidays()
    {
        $this->_holidays      = array();
        $this->_internalNames = array();
        $this->_dates         = array();
        $this->_titles        = array();
    }
}
?>
