<?php
/**
 * Created by PhpStorm.
 * User: siddique
 * Date: 10/4/18
 * Time: 9:41 PM
 */

namespace App\Entity;


class Offices
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $office_name;

    /**
     * @var string
     */
    protected $office_description;

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
    public function getOfficeName()
    {
        return $this->office_name;
    }

    /**
     * @param string $office_name
     */
    public function setOfficeName(string $office_name)
    {
        $this->office_name = $office_name;
    }

    /**
     * @return string
     */
    public function getOfficeDescription()
    {
        return $this->office_description;
    }

    /**
     * @param string $office_description
     */
    public function setOfficeDescription(string $office_description)
    {
        $this->office_description = $office_description;
    }
}