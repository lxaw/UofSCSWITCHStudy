<?php
namespace App\Entity;

use App\Repository\FoodRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodRepository::class)]
class Food
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $FoodName;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Restaurant = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $FoodCategory = null;

    #[ORM\Column(nullable: true)]
    private ?float $ServingSize = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ServingSizeUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $EnergyAmount = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $EnergyUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $FatAmount = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $FatUnit= null;

    #[ORM\Column(nullable: true)]
    private ?float $CarbAmount = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $CarbUnit = null;

    #[ORM\Column(nullable: true)]
    private ?float $ProteinAmount = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ProteinUnit = null;

    #[ORM\ManyToOne(inversedBy: 'food', cascade: ['persist'])]
    private ?User $User = null;

    #[ORM\Column(nullable:true)]
    private ?int $Quantity = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $DataType = null;

    #[ORM\Column(nullable:true)]
    private ?int $DataId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFoodName(): ?string
    {
        return $this->FoodName;
    }

    public function setFoodName(string $name): self
    {
        $this->FoodName = $name;

        return $this;
    }

    public function getRestaurant(): ?string
    {
        return $this->Restaurant;
    }

    public function setRestaurant(?string $Restaurant): self
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

    public function getServingSize(): ?float
    {
        return $this->ServingSize;
    }

    public function setServingSize(?float $ServingSize): self
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

    public function setEnergyUnit(?string $EnergyUnit): self
    {
        $this->EnergyUnit = $EnergyUnit;

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

    public function getCarbAmount(): ?float
    {
        return $this->CarbAmount;
    }

    public function setCarbAmount(?float $CarbAmount): self
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

    public function setProteinUnit(?string $ProteinUnit): self
    {
        $this->ProteinUnit = $ProteinUnit;

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

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getDataType(): ?string
    {
        return $this->DataType;
    }

    public function setDataType(string $DataType): self
    {
        $this->DataType = $DataType;

        return $this;
    }

    public function getDataId(): ?int
    {
        return $this->DataId;
    }

    public function setDataId(int $DataId): self
    {
        $this->DataId = $DataId;

        return $this;
    }
}
