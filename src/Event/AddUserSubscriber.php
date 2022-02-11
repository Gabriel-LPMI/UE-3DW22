<?php

namespace App\Event;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class AddUserSubscriber implements EventSubscriberInterface
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setUserToBook'],
        ];
    }

    public function setUserToBook(BeforeEntityPersistedEvent $event)
    {
        $book = $event->getEntityInstance();

        if (!($book instanceof Book)) {
            return;
        }

        $user = $this->security->getUser();
        $book->setUser($user);
    }
}