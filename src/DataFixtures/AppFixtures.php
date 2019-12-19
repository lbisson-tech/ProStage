<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        //Création des formations
        $formation1 = new Formation();
        $formation1->setNomF("DU TIC");
        $formation1->setNomComplet("Diplome Universitaire en Technologies de l'Information et de la Communication");
        $manager->persist($formation1);
        $formation2 = new Formation();
        $formation2->setNomF("DUT INFO");
        $formation2->setNomComplet("Diplome Universitaire Technologique Informatique");
        $manager->persist($formation2);
        $formation3 = new Formation();
        $formation3->setNomF("LP M");
        $formation3->setNomComplet("Licence Professionnelle Multimedia");
        $manager->persist($formation3);
        $listeFormations = array($formation1,$formation2,$formation3);

        //Création des entreprises
        $listeEntreprises = array();
        $nbEntreprises = $faker->numberBetween(9,12);
        for($i=0;$i<$nbEntreprises;$i++)
        {
            $entreprise = new Entreprise();
            $entreprise->setNomE($faker->company);
            $entreprise->setActivite($faker->catchphrase);
            $entreprise->setAdresse($faker->address);
            $entreprise->setSite($faker->url);
            $listeEntreprises[] = $entreprise;
            $manager->persist($entreprise);
        }

        //Création des stages
        for($i=0;$i<50;$i++)
        {
            $stage = new Stage();
            $stage->setTitre($faker->jobTitle);
            $stage->setDescription($faker->realText(300,2));
            $stage->setEmail($faker->email);
            $stage->setIdEntreprise($listeEntreprises[$faker->numberBetween(0,$nbEntreprises-1)]);
            for($j=0;$j<$faker->numberBetween(1,3);$j++)
            {
                //Ajouter des formations
                $numero = $faker->numberBetween(0,2);
                $stage->addListeFormation($listeFormations[$numero]);
            }
            $manager->persist($stage);
        }

        $manager->flush();
    }
}
