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
}