<?php
namespace Itb;

/**
<th> ID </th>
<th> employment status </th>
<th> name </th>
<th> phone </th>
<th> experience </th>
<th> photo </th>
 *
 */
class Cv
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
     * @var string $name
     *
     */
    private $name;


    /**
     * photo
     * @var text
     * Produces image
     */
    private $photo;
    /**
     * (should become ID of separate CATEGORY class ...)
     * @var string $category
     */
    private $phone;

    /**
     * @var int
     */
    private $experience;


    /**
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }


    /**
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }


    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

}