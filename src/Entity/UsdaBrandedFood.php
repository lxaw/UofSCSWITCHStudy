<?php

namespace App\Entity;

use App\Repository\UsdaBrandedFoodRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// util
use App\FoodDatabaseInteraction\Classes\Util;
use App\FoodDatabaseInteraction\Configs\DatabaseConfig;

#[ORM\Entity(repositoryClass: UsdaBrandedFoodRepository::class)]
class UsdaBrandedFood
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
    private ?string $DbId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $BrandName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $BrandOwner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Ingredients = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingSize = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ServingSizeUnit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FoodCategory = null;

    #[ORM\Column(nullable: true)]
    private ?float $SugarAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SugarUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $FattyAcidTotalSaturatedAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FattyAcidTotalSaturatedUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $CholesterolAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CholestolUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $VitaminCTotalAscorbidAcidAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VitaminCTotalAscorbicAcidUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $VitaminCTotalAscorbicAcidAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $VitaminDAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VitaminDUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $VitaminAAmount = null;

    #[ORM\Column(nullable: true)]
    private ?float $VitaminAUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $SodiumAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $SodiumUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $PotassiumAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PotassiumUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $IronAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $IronUnit = null;

    #[ORM\Column(nullable:true)]
    private ?float $CalciumAmount = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $CalciumUnit = null;

    #[ORM\Column(nullable:true)]
    private ?float $FiberAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FiberUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $EnergyAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $EnergyUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $CarbAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CarbUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $FatAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FatUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $ProteinAmount = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ProteinUnit = null;

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

    public function getDbId(): ?string
    {
        return $this->DbId;
    }

    public function setDbId(?string $DbId): self
    {
        $this->DbId= $DbId;

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

    public function getBrandName(): ?string
    {
        return $this->BrandName;
    }

    public function setBrandName(?string $BrandName): self
    {
        $this->BrandName = $BrandName;

        return $this;
    }

    public function getBrandOwner(): ?string
    {
        return $this->BrandOwner;
    }

    public function setBrandOwner(?string $BrandOwner): self
    {
        $this->BrandOwner = $BrandOwner;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->Ingredients;
    }

    public function setIngredients(?string $Ingredients): self
    {
        $this->Ingredients = $Ingredients;

        return $this;
    }

    public function getServingSize(): ?string
    {
        return $this->ServingSize;
    }

    public function setServingSize(?string $ServingSize): self
    {
        $this->ServingSize = $ServingSize;

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

    public function getFoodCategory(): ?string
    {
        return $this->FoodCategory;
    }

    public function setFoodCategory(?string $FoodCategory): self
    {
        $this->FoodCategory = $FoodCategory;

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

    public function getSugarUnit(): ?string
    {
        return $this->SugarUnit;
    }

    public function setSugarUnit(?string $SugarUnit): self
    {
        $this->SugarUnit = $SugarUnit;

        return $this;
    }

    public function getFattyAcidTotalSaturatedAmount(): ?float
    {
        return $this->FattyAcidTotalSaturatedAmount;
    }

    public function setFattyAcidTotalSaturatedAmount(?float $FattyAcidTotalSaturatedAmount): self
    {
        $this->FattyAcidTotalSaturatedAmount = $FattyAcidTotalSaturatedAmount;

        return $this;
    }

    public function getFattyAcidTotalSaturatedUnit(): ?string
    {
        return $this->FattyAcidTotalSaturatedUnit;
    }

    public function setFattyAcidTotalSaturatedUnit(?string $FattyAcidTotalSaturatedUnit): self
    {
        $this->FattyAcidTotalSaturatedUnit = $FattyAcidTotalSaturatedUnit;

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

    public function getCholestolUnit(): ?string
    {
        return $this->CholestolUnit;
    }

    public function setCholestolUnit(?string $CholestolUnit): self
    {
        $this->CholestolUnit = $CholestolUnit;

        return $this;
    }

    public function getVitaminCTotalAscorbidAcidAmount(): ?float
    {
        return $this->VitaminCTotalAscorbidAcidAmount;
    }

    public function setVitaminCTotalAscorbidAcidAmount(?float $VitaminCTotalAscorbidAcidAmount): self
    {
        $this->VitaminCTotalAscorbidAcidAmount = $VitaminCTotalAscorbidAcidAmount;

        return $this;
    }

    public function getVitaminCTotalAscorbicAcidUnit(): ?string
    {
        return $this->VitaminCTotalAscorbicAcidUnit;
    }

    public function setVitaminCTotalAscorbicAcidUnit(?string $VitaminCTotalAscorbicAcidUnit): self
    {
        $this->VitaminCTotalAscorbicAcidUnit = $VitaminCTotalAscorbicAcidUnit;

        return $this;
    }

    public function getVitaminCTotalAscorbicAcidAmount(): ?float
    {
        return $this->VitaminCTotalAscorbicAcidAmount;
    }

    public function setVitaminCTotalAscorbicAcidAmount(?float $VitaminCTotalAscorbicAcidAmount): self
    {
        $this->VitaminCTotalAscorbicAcidAmount = $VitaminCTotalAscorbicAcidAmount;

        return $this;
    }

    public function getVitaminDAmount(): ?float
    {
        return $this->VitaminDAmount;
    }

    public function setVitaminDAmount(?float $VitaminDAmount): self
    {
        $this->VitaminDAmount = $VitaminDAmount;

        return $this;
    }

    public function getVitaminDUnit(): ?string
    {
        return $this->VitaminDUnit;
    }

    public function setVitaminDUnit(?string $VitaminDUnit): self
    {
        $this->VitaminDUnit = $VitaminDUnit;

        return $this;
    }

    public function getVitaminAAmount(): ?float
    {
        return $this->VitaminAAmount;
    }

    public function setVitaminAAmount(?float $VitaminAAmount): self
    {
        $this->VitaminAAmount = $VitaminAAmount;

        return $this;
    }

    public function getVitaminAUnit(): ?float
    {
        return $this->VitaminAUnit;
    }

    public function setVitaminAUnit(?float $VitaminAUnit): self
    {
        $this->VitaminAUnit = $VitaminAUnit;

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

    public function getSodiumUnit(): ?string
    {
        return $this->SodiumUnit;
    }

    public function setSodiumUnit(?string $SodiumUnit): self
    {
        $this->SodiumUnit = $SodiumUnit;

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

    public function getIronAmount(): ?string
    {
        return $this->IronAmount;
    }

    public function setIronAmount(?string $IronAmount): self
    {
        $this->IronAmount = $IronAmount;

        return $this;
    }

    public function getIronUnit(): ?string
    {
        return $this->IronUnit;
    }

    public function setIronUnit(?string $IronUnit): self
    {
        $this->IronUnit = $IronUnit;

        return $this;
    }

    public function getCalciumAmount(): ?string
    {
        return $this->CalciumAmount;
    }

    public function setCalciumAmount(string $CalciumAmount): self
    {
        $this->CalciumAmount = $CalciumAmount;

        return $this;
    }

    public function getCalciumUnit(): ?string
    {
        return $this->CalciumUnit;
    }

    public function setCalciumUnit(string $CalciumUnit): self
    {
        $this->CalciumUnit = $CalciumUnit;

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

    public function getEnergyAmount(): ?float
    {
        return $this->EnergyAmount;
    }

    public function setEnergyAmount(?float $EnergyAmount): self
    {
        $this->EnergyAmount = $EnergyAmount;

        return $this;
    }

    public function getEnergyUnit(): ?string
    {
        return $this->EnergyUnit;
    }

    public function setEnergyUnit(string $EnergyUnit): self
    {
        $this->EnergyUnit = $EnergyUnit;

        return $this;
    }

    public function getCarbAmount(): ?float
    {
        return $this->CarbAmount;
    }

    public function setCarbAmount(float $CarbAmount): self
    {
        $this->CarbAmount = $CarbAmount;

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

    public function getFatAmount(): ?float
    {
        return $this->FatAmount;
    }

    public function setFatAmount(?float $FatAmount): self
    {
        $this->FatAmount = $FatAmount;

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

    public function getProteinAmount(): ?float
    {
        return $this->ProteinAmount;
    }

    public function setProteinAmount(?float $ProteinAmount): self
    {
        $this->ProteinAmount = $ProteinAmount;

        return $this;
    }

    public function getProteinUnit(): ?string
    {
        return $this->ProteinUnit;
    }

    public function setProteinUnit(string $ProteinUnit): self
    {
        $this->ProteinUnit = $ProteinUnit;

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
        return Util::strGetImgPath($this->getDescription(),$this->getBrandName(),DatabaseConfig::$IMG_DIR.'/'.DatabaseConfig::$USDA_BRANDED_IMGS);
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
