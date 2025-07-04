<?php

declare(strict_types=1);

/**
 * This file is part of the SmsInput package
 *
 * https://github.com/Spoje-NET/Sms-Input
 *
 * (c) SpojeNetIT s.r.o. <http://spojenet.it/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SpojeNet\SmsInput;

/**
 * Description of Sms.
 *
 * @author vitex
 */
class Sms extends \Ease\Brick
{
    public $smstat;
    public $index;
    public $phone;
    public $content;

    public \DateTime $date;
    public $sca;
    public $saveType;
    public $priority;
    public $smsType;

    /**
     * @param string $smstat
     * @param string $index
     * @param string $phone
     * @param string $content
     * @param string $date
     * @param array  $sca
     * @param int    $saveType
     * @param bool   $priority
     * @param int    $smsType
     */
    public function __construct(
        $smstat,
        $index,
        $phone,
        $content,
        $date,
        $sca,
        $saveType,
        $priority,
        $smsType,
    ) {
        $this->smstat = $smstat;
        $this->index = $index;
        $this->phone = $phone;
        $this->content = $content;
        $this->date = new \DateTime($date);
        $this->sca = $sca;
        $this->saveType = $saveType;
        $this->priority = $priority;
        $this->smsType = $smsType;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->getData(), \Ease\Shared::cfg('DEBUG') ? \JSON_PRETTY_PRINT : 0);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'smstat' => $this->smstat,
            'index' => $this->index,
            'phone' => $this->phone,
            'content' => $this->content,
            'date' => $this->date->format('Y-m-d H:i:s'),
            'sca' => $this->sca,
            'saveType' => $this->saveType,
            'priority' => $this->priority,
            'smsType' => $this->smsType,
        ];
    }
}
