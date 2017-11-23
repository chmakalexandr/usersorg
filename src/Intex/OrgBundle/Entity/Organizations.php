<?php

namespace Intex\OrgBundle\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Organizations
 * @JMS\XmlRoot("orgs")
 */
class Organizations
{
    /**
     * @JMS\Type("ArrayCollection<Intex\OrgBundle\Entity\Company>")
     * @JMS\XmlList(inline=true, entry="org")
     */
    private $companies;

    /**
     * @return mixed
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param \Intex\OrgBundle\Entity\Company $companies
     */
    public function setCompanies($companies)
    {
        $this->companies = $companies;
    }

}
