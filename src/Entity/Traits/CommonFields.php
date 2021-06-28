<?php
    namespace App\Entity\Traits;

    trait CommonFields
    {

        /**
         * @ORM\Column(type="date")
        */
        private $createdAt;

        /**
         * @ORM\Column(type="date", nullable=true)
         */
        private $updatedAt;

        /**
         * @ORM\Column(type="boolean")
         */
        private $isDeleted;

        /**
         * @ORM\Column(type="boolean")
         */
        private $isActived;

        /**
         * @ORM\Column(type="string", length=100)
         */
        private $createdBy;

        public function getCreatedAt(): ?\DateTimeInterface
        {
            return $this->createdAt;
        }

        public function setCreatedAt(\DateTimeInterface $createdAt): self
        {
            $this->createdAt = $createdAt;

            return $this;
        }

        public function getUpdatedAt(): ?\DateTimeInterface
        {
            return $this->updatedAt;
        }

        public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
        {
            $this->updatedAt = $updatedAt;

            return $this;
        }

        public function getIsDeleted(): ?bool
        {
            return $this->isDeleted;
        }

        public function setIsDeleted(bool $isDeleted): self
        {
            $this->isDeleted = $isDeleted;

            return $this;
        }

        public function getIsActived(): ?bool
        {
            return $this->isActived;
        }

        public function setIsActived(bool $isActived): self
        {
            $this->isActived = $isActived;

            return $this;
        }

        public function getCreatedBy(): ?string
        {
            return $this->createdBy;
        }

        public function setCreatedBy(string $createdBy): self
        {
            $this->createdBy = $createdBy;

            return $this;
        }

        /**
         * @ORM\PrePersist
         */
        public function active(){
            $this->isActived = true;
            if ($this->getCreatedBy() === null){
                $this->setCreatedBy('inconnu') ;
            }
        }

        /**
         * @ORM\PrePersist
         */
        public function update(){
            if ($this->getCreatedAt() === null){
                $this->setCreatedAt(new \DateTime('now'));
            }
            $this->setUpdatedAt(new \DateTime('now'));
        }

    }