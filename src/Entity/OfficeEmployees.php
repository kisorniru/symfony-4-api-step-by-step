<?php
/**
 * Created by PhpStorm.
 * User: siddique
 * Date: 10/4/18
 * Time: 9:27 PM
 */

namespace App\Entity;


class OfficeEmployees
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Offices
     */
    protected $offices;

    /**
     * @var string
     */
    protected $emp_name;

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
    public function getEmpName()
    {
        return $this->emp_name;
    }

    /**
     * @param string $emp_name
     */
    public function setEmpName(string $emp_name)
    {
        $this->emp_name = $emp_name;
    }

    /**
     * @return Offices
     */
    public function getOffices()
    {
        return $this->offices;
    }

    /**
     * @param Offices $offices
     */
    public function setOffices(Offices $offices)
    {
        $this->offices = $offices;
    }
}