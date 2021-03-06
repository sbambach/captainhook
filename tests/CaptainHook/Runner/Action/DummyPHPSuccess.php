<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace CaptainHook\App\Runner\Action;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Hook\Action as ActionInterface;
use SebastianFeldmann\Git\Repository;

class DummyPHPSuccess implements ActionInterface
{
    /**
     * Execute static action without errors or exceptions
     */
    public static function executeStatic()
    {
        // do something fooish statically
    }

    /**
     * Execute action without errors or exceptions
     *
     * @param  \CaptainHook\App\Config           $config
     * @param  \CaptainHook\App\Console\IO       $io
     * @param  \SebastianFeldmann\Git\Repository $repository
     * @param  \CaptainHook\App\Config\Action    $action
     * @return void
     */
    public function execute(Config $config, IO $io, Repository $repository, Config\Action $action) : void
    {
        // do something fooish
    }
}
