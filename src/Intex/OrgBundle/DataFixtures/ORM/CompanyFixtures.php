<?php
/**
 * Created by PhpStorm.
 * User: chmakav
 * Date: 01.11.2017
 * Time: 10:26
 */

namespace Intex\OrgBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Intex\OrgBundle\Entity\Company;


class CompanyFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $org1 = New Company();
        $org1->setName('Организация 1');
        $org1->setOgrn(1223231234);
        $org1->setOktmo(4564536746);
        $manager->persist($org1);

        $org2 = New Company();
        $org2->setName('Организация 2');
        $org2->setOgrn(474676756676);
        $org2->setOktmo(98067867867);
        $manager->persist($org2);
        $manager->flush();
        $this->addReference('org-1', $org1);
        $this->addReference('org-2', $org2);
    }

    public function getOrder()
    {
        return 1;
    }
}
