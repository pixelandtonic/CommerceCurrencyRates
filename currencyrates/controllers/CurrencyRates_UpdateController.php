<?php
/**
 * Currency Rates plugin for Craft CMS
 *
 * CurrencyRates_Update Controller
 *
 * @author    Luke Holder
 * @copyright Copyright (c) 2016 Luke Holder
 * @link      http://craftcommerce.com
 * @package   CurrencyRates
 * @since     0.1
 */

namespace Craft;

use Fadion\Fixerio\Exchange;
use Fadion\Fixerio\Exceptions\ConnectionException;
use Fadion\Fixerio\Exceptions\ResponseException;

require __DIR__.'/../vendor/autoload.php';

class CurrencyRates_UpdateController extends BaseController
{
    protected $allowAnonymous = true;

    public function actionRates()
    {
        $code = craft()->request->getRequiredParam('code');

        $secret = craft()->config->get('secret','currencyrates');

        if ($code !== $secret || $secret == '')
        {
            throw new HttpException(400, Craft::t('Not Authorized.'));
        }

        $paymentCurrencies = craft()->commerce_paymentCurrencies->getAllPaymentCurrencies();
        $primaryCurrency = craft()->commerce_paymentCurrencies->getPrimaryPaymentCurrency();


        try {
            $exchange = new Exchange();
            $exchange->base($primaryCurrency->alphabeticCode);
            $rates = $exchange->get();
        }
        catch (ConnectionException $e) {
            $error = "Fixer.io Connection Error: ".$e->getMessage();
            CurrencyRatesPlugin::log($error,LogLevel::Error,true);
            craft()->end();
        }
        catch (ResponseException $e) {
            $error = "Fixer.io Response Error: ".$e->getMessage();
            CurrencyRatesPlugin::log($error,LogLevel::Error,true);
            craft()->end();
        }

        foreach ($paymentCurrencies as $currency)
        {
            if (!$currency->primary)
            {
                if (isset($rates[$currency->getAlphabeticCode()]))
                {
                    $value = $rates[$currency->getAlphabeticCode()];
                    $currency->rate = $value;
                    craft()->commerce_paymentCurrencies->savePaymentCurrency($currency);
                }

            }
        }

        echo "Rates Updated.";
        craft()->end();
    }
}