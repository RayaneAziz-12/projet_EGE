<?php
    namespace App\Entity\Traits;

    trait UserCommonFields
    {

        /**
        * @ORM\Column(type="string")
        * @Groups({"user:read", "user:write"})
        */
        private $nom;

        /**
         * @ORM\Column(type="string")
         * @Groups({"user:read", "user:write"})
         */
        private $prenom;

        

        public function getNom(): ?string
        {
            return $this->nom;
        }

        public function setNom(string $nom): self
        {
            $this->nom = $nom;

            return $this;
        }

        public function getPrenom(): ?string
        {
            return $this->prenom;
        }

        public function setPrenom(string $prenom): self
        {
            $this->prenom = $prenom;

            return $this;
        }

        
    }