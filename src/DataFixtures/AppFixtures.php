<?php

namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $clients = [
            ["admin@gmail.com","ROLE_ADMIN","mdp","Vilfeu","Quentin","20 rue b","far","75200","0612130000"],
            ["sacha@gmail.com","ROLE_USER","mdp","Sacha","hamond","20 rue b","far","75200","0612130000"],
            ["opra@gmail.com","ROLE_CONSEILLER","mdp","ouch","diamond","20 rue b","far","75200","0612130000"]
        ];

        foreach ( $clients as $u ){

            $client = new Client();

            $password = $this->encoder->hashPassword($client, $u[2]);

            $client     ->setEmail($u[0])
                        ->setRoles([$u[1]])
                        ->setPassword($password)
                        ->setNom($u[3]) 
                        ->setPrenom($u[4])
                        // ->setAdresse($u[5])        
                        ->setVille($u[6])      
                        ->setCodePostal($u[7])   
                        ->setTelephone($u[8])
                            
            ;

            $manager->persist($client);
        }

        $manager->flush();
    }
    
}
