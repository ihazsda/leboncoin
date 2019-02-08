<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accept_newsletter", type="boolean")
     */
    protected $acceptNewsletter;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    protected $phone;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Ad", mappedBy="user")
     */
    protected $ads;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->ads = new ArrayCollection();
    }

    /**
     * @return bool
     */
    public function isAcceptNewsletter()
    {
        return $this->acceptNewsletter;
    }

    /**
     * @param bool $acceptNewsletter
     */
    public function setAcceptNewsletter($acceptNewsletter)
    {
        $this->acceptNewsletter = $acceptNewsletter;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
