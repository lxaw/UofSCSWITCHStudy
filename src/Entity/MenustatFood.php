<?php

namespace App\Entity;

use App\Repository\MenustatFoodRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// util
use App\FoodDatabaseInteraction\Classes\Util;
use App\FoodDatabaseInteraction\Configs\DatabaseConfig;

#[ORM\Entity(repositoryClass: MenustatFoodRepository::class)]
class MenustatFood
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'menustatfood', cascade: ['persist'])]
    private ?User $User = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?int $MenustatId = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $Restaurant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FoodCategory = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ItemDescription = null;

    #[ORM\Column(nullable: true)]
    private ?float $ServingSize = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingSizeText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingSizeUnit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingSizeHousehold = null;

    #[ORM\Column(nullable: true)]
    private ?float $EnergyAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $FatAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $SaturatedFatAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $TransFatAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $CholesterolAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $SodiumAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $PotassiumAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $CarbAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $ProteinAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $SugarAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $FiberAmount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTime $Date = null;

    #[ORM\Column(nullable: true)]
    private ?float $Quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenustatId(): ?string
    {
        return $this->MenustatId;
    }

    public function setMenustatId(string $MenustatId): self
    {
        $this->MenustatId = $MenustatId;

        return $this;
    }

    public function getRestaurant(): ?string
    {
        return $this->Restaurant;
    }

    public function setRestaurant(string $Restaurant): self
    {
        $this->Restaurant = $Restaurant;

        return $this;
    }

    public function getFoodCategory(): ?string
    {
        return $this->FoodCategory;
    }

    public function setFoodCategory(?string $FoodCategory): self
    {
        $this->FoodCategory = $FoodCategory;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->ItemDescription;
    }

    public function setItemDescription(?string $ItemDescription): self
    {
        $this->ItemDescription = $ItemDescription;

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

    public function getServingSizeText(): ?string
    {
        return $this->ServingSizeText;
    }

    public function setServingSizeText(?string $ServingSizeText): self
    {
        $this->ServingSizeText = $ServingSizeText;

        return $this;
    }

    public function getServingSizeUnit(): ?string
    {
        return $this->ServingSizeUnit;
    }

    public function setServingSizeUnit(?string $ServingSizeUnit): self
    {
        $this->ServingSizeUnit = $ServingSizeUnit;

        return $this;
    }

    public function getServingSizeHousehold(): ?string
    {
        return $this->ServingSizeHousehold;
    }

    public function setServingSizeHousehold(?string $ServingSizeHousehold): self
    {
        $this->ServingSizeHousehold = $ServingSizeHousehold;

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

    public function getFatAmount(): ?float
    {
        return $this->FatAmount;
    }

    public function setFatAmount(?float $FatAmount): self
    {
        $this->FatAmount = $FatAmount;

        return $this;
    }

    public function getSaturatedFatAmount(): ?float
    {
        return $this->SaturatedFatAmount;
    }

    public function setSaturatedFatAmount(?float $SaturatedFatAmount): self
    {
        $this->SaturatedFatAmount = $SaturatedFatAmount;

        return $this;
    }

    public function getTransFatAmount(): ?float
    {
        return $this->TransFatAmount;
    }

    public function setTransFatAmount(?float $TransFatAmount): self
    {
        $this->TransFatAmount = $TransFatAmount;

        return $this;
    }

    public function getCholesterolAmount(): ?float
    {
        return $this->CholesterolAmount;
    }

    public function setCholesterolAmount(?float $CholesterolAmount): self
    {
        $this->CholesterolAmount = $CholesterolAmount;

        return $this;
    }

    public function getSodiumAmount(): ?float
    {
        return $this->SodiumAmount;
    }

    public function setSodiumAmount(?float $SodiumAmount): self
    {
        $this->SodiumAmount = $SodiumAmount;

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

    public function getCarbAmount(): ?float
    {
        return $this->CarbAmount;
    }

    public function setCarbAmount(?float $CarbAmount): self
    {
        $this->CarbAmount = $CarbAmount;

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

    public function getSugarAmount(): ?float
    {
        return $this->SugarAmount;
    }

    public function setSugarAmount(?float $SugarAmount): self
    {
        $this->SugarAmount = $SugarAmount;

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

    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    public function setDate(?\DateTime $Date): self
    {
        $this->Date = $Date;

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
        return Util::strGetImgPath($this->getDescription(),$this->getRestaurant(),DatabaseConfig::$IMG_DIR.'/'.DatabaseConfig::$MENUSTAT_IMGS);
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
