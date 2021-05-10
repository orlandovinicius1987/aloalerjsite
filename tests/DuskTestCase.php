<?php

namespace Tests;

use Laravel\Dusk\Browser;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    private function bootMacros()
    {
        /**
         * Scrolls page to a specific element.
         *
         * Leaves a buffer at the top to account for a fixed header.
         */
        Browser::macro('scrollTo', function ($id) {
            $this->script("document.getElementById('$id').scrollIntoView()");

            $this->script('window.scroll(0, window.scrollY - 250)');

            return $this;
        });
    }

    public function setUp()
    {
        parent::setUp();

        $this->bootMacros();
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions())->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=2500,1920',
            '--disable-web-security'
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(ChromeOptions::CAPABILITY, $options)
        );
    }
}
