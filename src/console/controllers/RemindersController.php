<?php
namespace mediabeastnz\abandonedcart\console\controllers;

use mediabeastnz\abandonedcart\AbandonedCart;

use Craft;
use craft\helpers\Console;

use yii\console\ExitCode;


use yii\console\Controller;

/**
 * Abandoned Cart CLI.
 *
 * @author Myles Derham. <myles.derham@gmail.com>
 */

class RemindersController extends Controller
{

    // Properties
    // =========================================================================
    
    public $defaultAction = 'sendEmails';

    // Public Methods
    // =========================================================================

    /**
     * @param string $actionID
     *
     * @return array|string[]
     */
    public function options($actionID): array
    {
        return [];
    }

    /**
     * Finds all abandoned carts and sends reminder
     *
     * @return int
     */
    public function actionSendEmails()
    {
        // $this->confirm('Are you sure?');
        $res = AbandonedCart::$plugin->carts->getEmailsToSend();
        $this->stdout('Running ... ' . PHP_EOL, Console::FG_YELLOW);
        $this->stdout('Total Carts found: ' . $res . PHP_EOL, Console::FG_YELLOW);
        $this->stdout('done' . PHP_EOL, Console::FG_GREEN);
        return ExitCode::OK;
    }

    // Protected Methods
    // =========================================================================
}
