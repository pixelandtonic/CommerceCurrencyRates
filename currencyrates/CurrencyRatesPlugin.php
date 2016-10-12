<?php
/**
 * Currency Rates plugin for Craft CMS
 *
 * Commerce Payment Currency Rates Updater
 *
 * @author    Luke Holder
 * @copyright Copyright (c) 2016 Luke Holder
 * @link      http://craftcommerce.com
 * @package   CurrencyRates
 * @since     0.1
 */

namespace Craft;

class CurrencyRatesPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Currency Rates');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Commerce Payment Currency Rates Updater');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/pixelandtonic/currencyrates/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/pixelandtonic/currencyrates/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '0.1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '0.1';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Luke Holder';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://craftcommerce.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }
}