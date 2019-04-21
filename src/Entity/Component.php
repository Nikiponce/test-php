<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComponentRepository")
 */
class Component implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="types")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $format;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=140, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $x_axis;

    /**
     * @ORM\Column(type="integer")
     */
    private $y_axis;

    /**
     * @ORM\Column(type="integer")
     */
    private $z_axis;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ad", inversedBy="components")
     */
    private $ad;

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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getXAxis(): ?int
    {
        return $this->x_axis;
    }

    public function setXAxis(int $x_axis): self
    {
        $this->x_axis = $x_axis;

        return $this;
    }

    public function getYAxis(): ?int
    {
        return $this->y_axis;
    }

    public function setYAxis(int $y_axis): self
    {
        $this->y_axis = $y_axis;

        return $this;
    }

    public function getZAxis(): ?int
    {
        return $this->z_axis;
    }

    public function setZAxis(int $z_axis): self
    {
        $this->z_axis = $z_axis;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAd(): ?Ad
    {
        return $this->ad;
    }

    public function setAd(?Ad $ad): self
    {
        $this->ad = $ad;

        return $this;
    }

    public function jsonSerialize() : array
    {
        return [
            'id' => $this->id,
            'ad' => $this->ad,
            'name' => $this->name,
            'type' => $this->type,
            'link' => $this->link,
            'format' => $this->format,
            'size' => $this->size,
            'text' => $this->text,
            'x_axis' => $this->x_axis,
            'y_axis' => $this->y_axis,
            'z_axis' => $this->z_axis,
            'width' => $this->width,
            'height' => $this->height,
            'created_at' => $this->created_at,
        ];
    }
}
