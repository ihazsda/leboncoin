<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="ads")
 * @ORM\Entity(repositoryClass="App\Repository\AdRepository")
 * @Vich\Uploadable
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    protected $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    protected $price;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hide_phone", type="boolean")
     */
    protected $hidePhone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="ads")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="ads")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @var City
     *
     * @ORM\ManyToOne(targetEntity="City", inversedBy="ads")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="photo1", type="string", length=255, nullable=true)
     */
    private $photo1;

    /**
     * @var File
     * @Vich\UploadableField(mapping="ad_image", fileNameProperty="photo1")
     */
    private $photo1File;

    /**
     * @var string
     *
     * @ORM\Column(name="photo2", type="string", length=255, nullable=true)
     */
    private $photo2;

    /**
     * @var File
     * @Vich\UploadableField(mapping="ad_image", fileNameProperty="photo2")
     */
    private $photo2File;

    /**
     * @var string
     *
     * @ORM\Column(name="photo3", type="string", length=255, nullable=true)
     */
    private $photo3;

    /**
     * @var File
     * @Vich\UploadableField(mapping="ad_image", fileNameProperty="photo3")
     */
    private $photo3File;

    /**
     * Ad constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isHidePhone()
    {
        return $this->hidePhone;
    }

    /**
     * @param bool $hidePhone
     */
    public function setHidePhone($hidePhone)
    {
        $this->hidePhone = $hidePhone;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param City $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }

    /**
     * @param string $photo1
     */
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    /**
     * @return File
     */
    public function getPhoto1File()
    {
        return $this->photo1File;
    }

    /**
     * @param File $photo1File
     */
    public function setPhoto1File($photo1File)
    {
        $this->photo1File = $photo1File;

        if (null !== $photo1File) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return string
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }

    /**
     * @param string $photo2
     */
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    /**
     * @return File
     */
    public function getPhoto2File()
    {
        return $this->photo2File;
    }

    /**
     * @param File $photo2File
     */
    public function setPhoto2File($photo2File)
    {
        $this->photo2File = $photo2File;

        if (null !== $photo2File) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return string
     */
    public function getPhoto3()
    {
        return $this->photo3;
    }

    /**
     * @param string $photo3
     */
    public function setPhoto3($photo3)
    {
        $this->photo3 = $photo3;
    }

    /**
     * @return File
     */
    public function getPhoto3File()
    {
        return $this->photo3File;
    }

    /**
     * @param File $photo3File
     */
    public function setPhoto3File($photo3File)
    {
        $this->photo3File = $photo3File;

        if (null !== $photo3File) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
