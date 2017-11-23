<?php

namespace Intex\OrgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as JMS;

/**
 *
 * @ORM\Entity(repositoryClass="Intex\OrgBundle\Entity\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"inn","snils"}
 * )
 * @ORM\Table(name="user")
 * @JMS\ExclusionPolicy("all")
 *
 */
class User
{
    /**
     * Id user
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * First Name user
     * @Assert\NotBlank()
     * @ORM\Column(type="string",length=100)
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @var string
     */
    protected $firstname;

    /**
     * Last Name user
     * @Assert\NotBlank()
     * @ORM\Column(type="string",length=100)
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @var string
     */
    protected $lastname;

    /**
     * Middle Name user
     * @Assert\NotBlank()
     * @ORM\Column(type="string",length=100)
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @var string
     */
    protected $middlename;

    /**
     * Bithday user
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     * @JMS\Type("DateTime<'Y-m-d','','|Y-m-d'>")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @var \DateTime
     */
    protected $bithday;

    /**
     * Individual Taxpayer Number user's
     * @Assert\NotBlank()
     * @Assert\Regex("/^\d{12}$/")
     * @ORM\Column(type="bigint",unique=true)
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @var int
     */
    protected $inn;

    /**
     * Insurance Number of Individual Ledger Account user's
     * @Assert\NotBlank()
     * @Assert\Regex("/^\d{11}$/")
     * @ORM\Column(type="bigint",unique=true)
     * @JMS\Type("string")
     * @JMS\Expose
     * @JMS\XmlAttribute
     * @var int
     */
    protected $snils;

    /**
     * User's company
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="users")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * @var \Intex\OrgBundle\Entity\Company
     */
    protected $company;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getMiddlename()
    {
        return $this->middlename;
    }

    /**
     * @param string $middlename
     */
    public function setMiddlename($middlename)
    {
        $this->middlename = $middlename;
    }

    /**
     * @return mixed
     */
    public function getBithday()
    {
        return $this->bithday;
    }

    /**
     * @param \DateTime $bithday
     */
    public function setBithday($bithday)
    {
        $this->bithday = $bithday;
    }

    /**
     * @return mixed
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * @param int $inn
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    }

    /**
     * @return mixed
     */
    public function getSnils()
    {
        return $this->snils;
    }

    /**
     * @param int $snils
     */
    public function setSnils($snils)
    {
        $this->snils = $snils;
    }

    /**
     * Set company
     * @param \Intex\OrgBundle\Entity\Company $company
     * @return User
     */
    public function setCompany(\Intex\OrgBundle\Entity\Company $company = null)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Get company
     * @return \Intex\OrgBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}
