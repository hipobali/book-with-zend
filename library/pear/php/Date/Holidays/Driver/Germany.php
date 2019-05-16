<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * Driver for holidays in Germany
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
 * @author   Stephan Schmidt <schst@php-tools.net>
 * @author   Carsten Lucke <luckec@tool-garage.de>
 * @license  http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version  CVS: $Id$
 * @link     http://pear.php.net/package/Date_Holidays
 */

/**
 * Extends Christian driver
 */
require_once 'Date/Holidays/Driver/Christian.php';

/**
 * class that calculates German holidays
 *
 * @category   Date
 * @package    Date_Holidays
 * @subpackage Driver
 * @author     Carsten Lucke <luckec@tool-garage.de>
 * @author     Stephan Schmidt <schst@php.net>
 * @license    http://www.php.net/license/3_01.txt PHP License 3.0.1
 * @version    CVS: $Id$
 * @link       http://pear.php.net/package/Date_Holidays
 */
class Date_Holidays_Driver_Germany extends Date_Holidays_Driver_Christian
{
    /**
     * this driver's name
     *
     * @access   protected
     * @var      string
     */
    var $_driverName = 'Germany';

    /**
     * Constructor
     *
     * Use the Date_Holidays::factory() method to construct an object of a
     * certain driver
     *
     * @access   protected
     */
    public function __construct()
    {
    }

    /**
     * Build the internal arrays that contain data about the calculated holidays
     *
     * @access   protected
     * @return   boolean true on success, otherwise a PEAR_ErrorStack object
     * @throws   object PEAR_ErrorStack
     */
    function _buildHolidays()
    {
        parent::_buildHolidays();

        $easterDate       = $this->getHolidayDate('easter');
        $ashWednesdayDate = $this->getHolidayDate('ashWednesday');
        $ascensionDayDate = $this->getHolidayDate('ascensionDay');
        $advent1Date      = $this->getHolidayDate('advent1');

        /**
         * New Year's Day
         */
        $this->_addHoliday('german_newYearsDay',
                           $this->_year . '-01-01',
                           ' New Year\'s Day');

        /**
         * Valentine's Day
         */
        $this->_addHoliday('german_valentinesDay',
                           $this->_year . '-02-14',
                           'Valentine\'s Day');

        /**
         * "Weiberfastnacht"
         */
        $wFasnetDate = $this->_addDays($ashWednesdayDate, -6);
        $this->_addHoliday('german_womenFasnet', $wFasnetDate, 'Carnival');

        /**
         * Carnival / "Fastnacht"
         */
        $fasnetDate = $this->_addDays($easterDate, -47);
        $this->_addHoliday('german_fasnet', $fasnetDate, 'Carnival');

        /**
         * Rose Monday
         */
        $roseMondayDate = $this->_addDays($easterDate, -48);
        $this->_addHoliday('german_roseMonday', $roseMondayDate, 'Rose Monday');

        /**
         * International Women's Day
         */
        $this->_addHoliday('german_womensDay',
                           $this->_year . '-03-08',
                           'International Women\'s Day');

        /**
         * April 1st
         */
        $this->_addHoliday('german_april1st', $this->_year . '-04-01', 'April 1st');

        /**
         * Girls' Day (fourth Thursday in April)
         */
        $girlsDayDate = new DateTime($this->_year . '-04-01');
        $dayOfWeek    = $girlsDayDate->format('w');
        switch ($dayOfWeek) {
        case 0:
        case 1:
        case 2:
        case 3:
            $girlsDayDate = $this->_addDays($girlsDayDate, 4 - $dayOfWeek + 21);
            break;
        case 4:
            $girlsDayDate = $this->_addDays($girlsDayDate, 21);
            break;
        case 5:
        case 6:
            $girlsDayDate = $this->_addDays($girlsDayDate, -1 * $dayOfWeek + 11 + 21);
            break;
        }
        $this->_addHoliday('german_girlsDay', $girlsDayDate, 'Girls\' Day');

        /**
         * International Earth' Day
         */
        $this->_addHoliday('german_earthDay',
                           $this->_year . '-04-22',
                           'International Earth\' Day');

        /**
         * German Beer's Day
         */
        $this->_addHoliday('german_beersDay',
                           $this->_year . '-04-23',
                           'German Beer\'s Day');

        /**
         * Walpurgis Night
         */
        $this->_addHoliday('german_walpurgisNight',
                           $this->_year . '-04-30',
                           'Walpurgis Night');

        /**
         * Day of Work
         */
        $this->_addHoliday('german_dayOfWork',
                           $this->_year . '-05-01',
                           'Day of Work');

        /**
         * World's Laughing Day
         */
        $laughingDayDate = new DateTime($this->_year . '-05-01');
        while ($laughingDayDate->format('w') != 0) {
            $laughingDayDate = $laughingDayDate->add( new DateInterval('P1D'));
        }
        $this->_addHoliday('german_laughingDay',
                           $laughingDayDate,
                           'World\'s Laughing Day');

        /**
         * Europe Day
         */
        $this->_addHoliday('german_europeDay',
                           $this->_year . '-05-05',
                           'Europe Day');

        /**
         * Mothers' Day
         */
        $mothersDay = $this->_addDays($laughingDayDate, 7);
        $this->_addHoliday('german_mothersDay', $mothersDay, 'Mothers\' Day');

        /**
         * End of World War 2 in Germany
         */
        $this->_addHoliday('german_endOfWWar2',
                           $this->_year . '-05-08',
                           'End of World War 2 in Germany');

        /**
         * Fathers' Day
         */
        $this->_addHoliday('german_fathersDay', $ascensionDayDate, 'Fathers\' Day');

        /**
         * Amnesty International Day
         */
        $this->_addHoliday('german_aiDay',
                           $this->_year . '-05-28',
                           'Amnesty International Day');

        /**
         * International Children' Day
         */
        $this->_addHoliday('german_intChildrenDay',
                           $this->_year . '-06-01',
                           'International Children\'s Day');

        /**
         * Day of organ donation
         */
        $organDonationDate = new DateTime($this->_year . '-06-01');
        while ($organDonationDate->format('w') != 6) {
            $organDonationDate = $organDonationDate->add( new DateInterval('P1D'));
        }
        $this->_addHoliday('german_organDonationDay',
                           $organDonationDate,
                           'Day of organ donation');

        /**
         * Dormouse' Day
         */
        $this->_addHoliday('german_dormouseDay',
                           $this->_year . '-06-27',
                           'Dormouse\' Day');

        /**
         * Christopher Street Day
         */
        $this->_addHoliday('german_christopherStreetDay',
                           $this->_year . '-06-27',
                           'Christopher Street Day');

        /**
         * Hiroshima Commemoration Day
         */
        $this->_addHoliday('german_hiroshimaCommemorationDay',
                           $this->_year . '-08-06',
                           'Hiroshima Commemoration Day');

        /**
         * Augsburg peace celebration
         */
        $this->_addHoliday('german_augsburgPeaceCelebration',
                           $this->_year . '-08-08',
                           'Augsburg peace celebration');

        /**
         * International left-handeds' Day
         */
        $this->_addHoliday('german_leftHandedDay',
                           $this->_year . '-08-13',
                           'International left-handeds\' Day');

        /**
         * Anti-War Day
         */
        $this->_addHoliday('german_antiWarDay',
                           $this->_year . '-09-01',
                           'Anti-War Day');

        /**
         * Day of German Language
         */
        $germanLangDayDate = new DateTime($this->_year . '-09-01');
        while ($germanLangDayDate->format('w') != 6) {
            $germanLangDayDate = $germanLangDayDate->add( new DateInterval('P1D'));
        }
        $germanLangDayDate = $this->_addDays($germanLangDayDate, 7);
        $this->_addHoliday('german_germanLanguageDay',
                           $germanLangDayDate,
                           'Day of German Language');

        /**
         * International diabetes day
         */
        $this->_addHoliday('german_diabetesDay',
                           $this->_year . '-11-14',
                           'International diabetes day');

        /**
         * German Unification Day
         */
        $this->_addHoliday('german_germanUnificationDay',
                           $this->_year . '-10-03',
                           'German Unification Day');

        /**
         * Libraries' Day
         */
        $this->_addHoliday('german_librariesDay',
                           $this->_year . '-10-24',
                           'Libraries\' Day');

        /**
         * World's Savings Day
         */
        $this->_addHoliday('german_savingsDay',
                           $this->_year . '-10-30',
                           'World\'s Savings Day');

        /**
         * Halloween
         */
        $this->_addHoliday('german_halloween', $this->_year . '-10-31', 'Halloween');

        /**
         * Stamp's Day
         *
         * year <= 1948: 7th of January
         * year > 1948: last Sunday in October
         */
        $stampsDayDate = null;
        if ($this->_year <= 1948) {
            $stampsDayDate = new DateTime($this->_year . '-01-07');
            while ($stampsDayDate->format('w') != 0) {
                $stampsDayDate = $stampsDayDate->add( new DateInterval('P1D'));
            }
        } else {
            $stampsDayDate = new DateTime($this->_year . '-10-31');
            while ($stampsDayDate->format('w') != 0) {
                $stampsDayDate = $stampsDayDate->sub( new DateInterval('P1D'));
            }
        }
        $this->_addHoliday('german_stampsDay', $stampsDayDate, 'Stamp\'s Day');

        /**
         * International Men's Day
         */
        $this->_addHoliday('german_mensDay',
                           $this->_year . '-11-03',
                           'International Men\'s Day');

        /**
         * Fall of the Wall of Berlin
         */
        $this->_addHoliday('german_wallOfBerlin',
                           $this->_year . '-11-09',
                           'Fall of the Wall of Berlin 1989');

        /**
         * Beginning of the Carnival
         */
        $this->_addHoliday('german_carnivalBeginning',
                           $this->_year . '-11-11',
                           'Beginning of the Carnival');

        /**
         * People's Day of Mourning
         */
        $dayOfMourning = $this->_addDays($advent1Date, -14);
        $this->_addHoliday('german_dayOfMourning',
                           $dayOfMourning,
                           'People\'s Day of Mourning');

        if (Date_Holidays::errorsOccurred()) {
            return Date_Holidays::getErrorStack();
        }
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
        return array('de', 'deu');
    }
}
?>
