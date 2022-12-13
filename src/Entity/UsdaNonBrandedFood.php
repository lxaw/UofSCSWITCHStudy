<?php

namespace App\Entity;

use App\Repository\UsdaNonBrandedFoodRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// util
use App\FoodDatabaseInteraction\Classes\Util;
use App\FoodDatabaseInteraction\Configs\DatabaseConfig;

#[ORM\Entity(repositoryClass: UsdaNonBrandedFoodRepository::class)]
class UsdaNonBrandedFood
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'usdabrandedfood',cascade:['persist'])]
    private ?User $User = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $FdcId = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $DbId= null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingText = null;

    #[ORM\Column(nullable: true)]
    private ?float $ServingSize = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ProteinUnit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CarbUnit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FatUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $FatAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $CarbAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $EnergyAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $ProteinAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $FiberAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FiberUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $PotassiumAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PotassiumUnit = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(nullable: true)]
    private ?float $Quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFdcId(): ?string
    {
        return $this->FdcId;
    }

    public function setFdcId(?string $FdcId): self
    {
        $this->FdcId = $FdcId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getServingAmount(): ?string
    {
        return $this->ServingAmount;
    }

    public function setServingAmount(?string $ServingAmount): self
    {
        $this->ServingAmount = $ServingAmount;

        return $this;
    }

    public function getServingText(): ?string
    {
        return $this->ServingText;
    }

    public function setServingText(?string $ServingText): self
    {
        $this->ServingText = $ServingText;

        return $this;
    }

    public function getServingSize(): ?float
    {
        return $this->ServingSize;
    }

    public function setServingSize(?float $ServingSize): self
    {
        $this->ServingSize = $ServingSize;

        return $this;
    }

    public function getProteinUnit(): ?string
    {
        return $this->ProteinUnit;
    }

    public function setProteinUnit(?string $ProteinUnit): self
    {
        $this->ProteinUnit = $ProteinUnit;

        return $this;
    }

    public function getCarbUnit(): ?string
    {
        return $this->CarbUnit;
    }

    public function setCarbUnit(?string $CarbUnit): self
    {
        $this->CarbUnit = $CarbUnit;

        return $this;
    }

    public function getFatUnit(): ?string
    {
        return $this->FatUnit;
    }

    public function setFatUnit(?string $FatUnit): self
    {
        $this->FatUnit = $FatUnit;

        return $this;
    }

    public function getFatAmount(): ?string
    {
        return $this->FatAmount;
    }

    public function setFatAmount(?string $FatAmount): self
    {
        $this->FatAmount = $FatAmount;

        return $this;
    }

    public function getCarbAmount(): ?float
    {
        return $this->CarbAmount;
    }

    public function setCarbAmount(?float $CarbAmount): self
    {
        $this->CarbAmount = $CarbAmount;

        return $this;
    }

    public function getEnergyAmount(): ?float
    {
        return $this->EnergyAmount;
    }

    public function setEnergyAmount(?float $EnergyAmount): self
    {
        $this->EnergyAmount = $EnergyAmount;

        return $this;
    }

    public function getProteinAmount(): ?float
    {
        return $this->ProteinAmount;
    }

    public function setProteinAmount(?float $ProteinAmount): self
    {
        $this->ProteinAmount = $ProteinAmount;

        return $this;
    }

    public function getFiberAmount(): ?float
    {
        return $this->FiberAmount;
    }

    public function setFiberAmount(?float $FiberAmount): self
    {
        $this->FiberAmount = $FiberAmount;

        return $this;
    }

    public function getFiberUnit(): ?string
    {
        return $this->FiberUnit;
    }

    public function setFiberUnit(?string $FiberUnit): self
    {
        $this->FiberUnit = $FiberUnit;

        return $this;
    }

    public function getPotassiumAmount(): ?float
    {
        return $this->PotassiumAmount;
    }

    public function setPotassiumAmount(?float $PotassiumAmount): self
    {
        $this->PotassiumAmount = $PotassiumAmount;

        return $this;
    }

    public function getPotassiumUnit(): ?string
    {
        return $this->PotassiumUnit;
    }

    public function setPotassiumUnit(?string $PotassiumUnit): self
    {
        $this->PotassiumUnit = $PotassiumUnit;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(?\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getDbId(): ?string
    {
        return $this->DbId;
    }

    public function setDbId(?string $DbId): self
    {
        $this->DbId= $DbId;

        return $this;
    }
    public function getUser(): ?User
    {
        return $this->User;
    }
    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

    public function setQuantity(?float $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }
    public function getImgPath(): string{
        return Util::strGetImgPathNoRestaurant($this->getDescription(),DatabaseConfig::$IMG_DIR.'/'.DatabaseConfig::$USDA_NON_BRANDED_IMGS);
    }
    public function getTotalEnergyAmount(): float{
        return $this->getEnergyAmount() * $this->getQuantity();
    }
    public function getTotalPotassiumAmount(): float{
        return $this->getPotassiumAmount() * $this->getQuantity();
    }
    public function getTotalFiberAmount(): float{
        return $this->getFiberAmount() * $this->getQuantity();
    }
    public function getTotalFatAmount(): float{
        return $this->getFatAmount() * $this->getQuantity();
    }
}
