<?php

namespace Otus\Mvc\Models\Doctrine;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
/**
 * @Entity
 * @Table(name="users")
 **/
class User
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $username;

    /** @Column(type="string") **/
    protected $email;

    /** @Column(type="string") **/
    protected $info;


    public function __construct(string $name, string $email, string $info)
    {
        $this->username = $name;
        $this->email = $email;
        $this->info = $info;
    }

    # Accessors
    public function getId() : int { return $this->id; }
    public function getName() : string { return $this->username; }
    public function getEmail() : string { return $this->email; }
    public function getInfo() : string { return $this->info; }
    public function setInfo($info) : void { $this->info = $info; }
}
