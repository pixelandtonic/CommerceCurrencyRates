# Commerce Currency Rates

This is an example plugin that enables commerce currency rates to be updated with live rates from the fixer.io api.

## Installation & Setup

1) Copy the `currencyrates` folder into your `craft/plugins` folder.

2) Click install on the plugin within `settings > plugins`

3) Make a currencyrates.php file in your `craft/config/` directory with the following:

```
<?php
return [
    'secret' => '123'
];
```
4) Replace `123` from the file above with a long unique password or hash.

5) Set up a cron job to hit this url:

```
http://yourdomain.dev/actions/currencyRates/update/rates?code=123
```
6) Notice the `code=123`. Replace `123` with the unique password that you populated in step 4.

7) Set the cron to hit that url periodically. The example below is a cron command which hits the url every 24 hours at midnight:

```
0 0 * * * wget -O - http://yourdomain.dev/actions/currencyRates/update/rates?code=123 >/dev/null 2>&1
```

You can manually visit the url to test the rates are updated correctly before setting up your cron job.

