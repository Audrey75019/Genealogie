<?php


namespace App\Entity;


class PropertySearch
{
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */

    private $firstname;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return string|null
     */
    public function setName(?string $name): PropertySearch
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $name
     * @return string|null
     */
    public function setFirstName(?string $firstname): PropertySearch
    {
        $this->firstname = $firstname;
        return $this;
    }


}