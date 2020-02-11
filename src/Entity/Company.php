<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompanyAddress",mappedBy="company", orphanRemoval=true, cascade={"persist"})
     */
    private $companyAddresses;

    public function __construct()
    {
        $this->companyAddresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|CompanyAddress[]
     */
    public function getCompanyAddresses(): Collection
    {
        return $this->companyAddresses;
    }

    public function addCompanyAddress(CompanyAddress $companyAddress): self
    {
        if (!$this->companyAddresses->contains($companyAddress)) {
            $this->companyAddresses[] = $companyAddress;
            $companyAddress->setCompany($this);
        }

        return $this;
    }

    public function removeCompanyAddress(CompanyAddress $companyAddress): self
    {
        if ($this->companyAddresses->contains($companyAddress)) {
            $this->companyAddresses->removeElement($companyAddress);
            // set the owning side to null (unless already changed)
            if ($companyAddress->getCompany() === $this) {
                $companyAddress->setCompany(null);
            }
        }

        return $this;
    }
}
