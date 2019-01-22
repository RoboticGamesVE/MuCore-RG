<?php
/**
 * 2017-2018 RoboticGames
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * https://opensource.org/licenses/OSL-3.0
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade RoboticGames to newer
 * versions in the future. If you wish to customize RoboticGames for your
 * needs please refer to http://roboticgames.web.ve for more information.
 *
 * @author    RoboticGames FP <roboticgames.ve@gmail.com>
 * @copyright 2017-2018 RoboticGames FP
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @Credits   Isumeru & MaryJo & Dao Van Trong - Trong.CF                      ¦
*/
if (!class_exists('MAIL5')) {
    require_once 'engine/mail/MAIL.php';
}
class MAIL extends MAIL5
{
}

if (!class_exists('FUNC5')) {
    require_once 'engine/mail/FUNC.php';
}

if (!class_exists('SMTP5')) {
    require_once 'engine/mail/SMTP.php';
}
if (!class_exists('MIME5')) {
    require_once 'engine/mail/MIME.php';
    class MIME extends MIME5
    {
    }
}
?> 