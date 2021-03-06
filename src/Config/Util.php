<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace CaptainHook\App\Config;

use CaptainHook\App\Hook\Util as HookUtil;

/**
 * Class Util
 *
 * @package CaptainHook
 * @author  Sebastian Feldmann <sf@sebastian-feldmann.info>
 * @link    https://github.com/captainhookphp/captainhook
 * @since   Class available since Release 1.0.3
 */
abstract class Util
{
    /**
     * Validate a configuration
     *
     * @param  array $json
     * @return void
     * @throws \RuntimeException
     */
    public static function validateJsonConfiguration(array $json) : void
    {
        foreach (HookUtil::getValidHooks() as $hook => $class) {
            if (isset($json[$hook])) {
                self::validateHookConfig($json[$hook]);
            }
        }
    }

    /**
     * Validate a hook configuration
     *
     * @param  array $json
     * @return void
     * @throws \RuntimeException
     */
    public static function validateHookConfig(array $json) : void
    {
        if (!self::keysExist(['enabled', 'actions'], $json)) {
            throw new \RuntimeException('Config error: invalid hook configuration');
        }
        if (!is_array($json['actions'])) {
            throw new \RuntimeException('Config error: \'actions\' must be an array');
        }
        self::validateActionsConfig($json['actions']);
    }

    /**
     * Validate a list of action configurations
     *
     * @param  array $json
     * @return void
     * @throws \RuntimeException
     */
    public static function validateActionsConfig(array $json) : void
    {
        foreach ($json as $action) {
            if (!self::keysExist(['action'], $action)) {
                throw new \RuntimeException('Config error: \'action\' missing');
            }
            if (empty($action['action'])) {
                throw new \RuntimeException('Config error: \'action\' can\'t be empty');
            }
        }
    }

    /**
     * Does an array have the expected keys
     *
     * @param  array $keys
     * @param  array $subject
     * @return bool
     */
    private static function keysExist(array $keys, array $subject) : bool
    {
        foreach ($keys as $key) {
            if (!isset($subject[$key])) {
                return false;
            }
        }
        return true;
    }
}
