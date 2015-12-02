<?php

namespace Pyz\Zed\MailQueue\Business;

use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\QueueMessageTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method MailQueueDependencyContainer getDependencyContainer()
 */
class MailQueueFacade extends AbstractFacade
{

    /**
     * @param QueueMessageTransfer $queueMessage
     *
     * @return void
     */
    public function processEmailMessage(QueueMessageTransfer $queueMessage)
    {
        $this->getDependencyContainer()
            ->createMailQueueManager()
            ->processMailMessageFromQueue($queueMessage)
        ;
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return void
     */
    public function sendEmailToQueue(MailTransfer $mailTransfer)
    {
        $this->getDependencyContainer()
            ->createMailQueueManager()
            ->sendEmailToQueue($mailTransfer)
        ;
    }

    /**
     * @param MailTransfer $mailTransfer
     *
     * @return array
     */
    public function sendMail(MailTransfer $mailTransfer)
    {
        return $this->getDependencyContainer()
            ->createMailFacade()
            ->sendMail($mailTransfer)
        ;
    }

    /**
     * @param string $queueName
     * @param QueueMessageTransfer $queueMessage
     *
     * @return void
     */
    public function publishMessage($queueName, QueueMessageTransfer $queueMessage)
    {
        $this->getDependencyContainer()
            ->createQueueFacade()
            ->publishMessage($queueName, $queueMessage)
        ;
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return sprintf(
            '%s.%s',
            $this->getDependencyContainer()->getCurrentStore()->getCurrentCountry(),
            'mail.queue'
        );
    }

}