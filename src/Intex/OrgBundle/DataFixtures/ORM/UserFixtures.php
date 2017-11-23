<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 30.10.2017
 * Time: 12:09
 */

namespace Intex\OrgBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intex\OrgBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = New User();
        $user1->setFirstname('Иван');
        $user1->setLastname('Иванов');
        $user1->setMiddlename('Иванович');
        $user1->setBithday(new \DateTime("1990-07-25"));
        $user1->setInn(111111111111);
        $user1->setSnils(11111111112);
        $user1->setCompany($manager->merge($this->getReference('org-1')));
        $manager->persist($user1);

        $user2 = New User();
        $user2->setFirstname('Петр');
        $user2->setLastname('Петров');
        $user2->setMiddlename('Петрович');
        $user2->setBithday(new \DateTime("1988-06-15"));
        $user2->setInn(22222222222);
        $user2->setSnils(2222222223);
        $user2->setCompany($manager->merge($this->getReference('org-1')));
        $manager->persist($user2);

        $user3 = New User();
        $user3->setFirstname('Сергей');
        $user3->setLastname('Сидоров');
        $user3->setMiddlename('Иванович');
        $user3->setBithday(new \DateTime("1993-08-08"));
        $user3->setInn(111111111111);
        $user3->setSnils(11111111112);
        $user3->setCompany($manager->merge($this->getReference('org-2')));
        $manager->persist($user3);

        $manager->flush();

    }

    public function getOrder()
    {
        return 2;
    }
}
