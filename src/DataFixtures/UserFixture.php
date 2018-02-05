<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    //put your code here
    public function load(ObjectManager $manager) {
        //On créer une liste factice de 20 utilisateurs
        for($i = 0; $i <= 20; $i++){
            $user = new User();
            $user->setUsername('user'. $i);
            $user->setEmail('user'. $i.'@mail.com');
            $user->setFirstname('user'. $i);
            $user->setLastname('Fake');
            $user->setPassword(password_hash('user' .$i, PASSWORD_BCRYPT));
            $user->setBirthdate(\DateTime::createFromFormat('Y/m/d h:i:s', (2000- $i).'/01/01 00:00:00'));
            
            //on demande au manager d'enregistrer l'utilisateur en base de données
            $manager ->persist($user);
       }
       $manager->flush(); //les INSERT INTO ne sont effectués qu'à ce moment là 
        
    }

}
