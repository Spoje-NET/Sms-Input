<?php

declare(strict_types=1);

/**
 *
 *
 * @author     Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2023 Vitex Software
 */

namespace SpojeNet\SmsInput;

/**
 * Description of Sms
 *
 * @author vitex
 */
class Sms extends \Ease\Brick
{
    public $smstat;
    public $index;
    public $phone;
    public $content;

    /**
     *
     * @var \DateTime
     */
    public $date;
    public $sca;
    public $saveType;
    public $priority;
    public $smsType;

    /**
     *
     * @param string $smstat
     * @param string $index
     * @param string $phone
     * @param string $content
     * @param string $date
     * @param array $sca
     * @param int $saveType
     * @param bool $priority
     * @param int $smsType
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
        $smsType
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
     *
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
            'smsType' => $this->smsType
        ];
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->getData(), \Ease\Shared::cfg('DEBUG') ? JSON_PRETTY_PRINT : 0);
    }
}
