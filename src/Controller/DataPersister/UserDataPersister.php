<?php


namespace App\Controller\DataPersister;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;



class UserDataPersister
{
    
    
   /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
       
    }
  
    public function setCreatedBy(): void
    {
        $this->CreatedBy ='rien';
       
    }
    public function setIsDeleted(): void
    {
        $this->IsDeleted = false;
       
    }
    
    public function setIsActived(): void
    {
        $this->IsActived = true;
       
    }
}