<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;

class ProStageController extends AbstractController
{
    public function index()
    {
        //Récupérer le repository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les ressources en BD
        $stages = $repositoryStage->findAll();

        //Envoyer les données à la vue
        return $this->render('pro_stage/index.html.twig',['listeStages'=>$stages,'affichage'=>0]);
    }

    public function afficherStagesEntreprise($idEntreprise)
    {
        //Récupérer le repository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les ressources en BD
        $stages = $repositoryStage->findBy(['id_entreprise'=>$idEntreprise]);
        $entreprise = $repositoryEntreprise->findOneBy(['id'=>$idEntreprise])->getNomE();

        //Envoyer les données à la vue
        return $this->render('pro_stage/index.html.twig',['listeStages'=>$stages,'affichage'=>1,'entreprise'=>$entreprise]);
    }

    public function afficherStagesFormation($idFormation)
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        $stages = $repositoryFormation->findOneById($idFormation)->getListeStages();
        $formation = $repositoryFormation->findOneBy(['id'=>$idFormation])->getNomF();

        //Envoyer les données à la vue
        return $this->render('pro_stage/index.html.twig',['listeStages'=>$stages,'affichage'=>2,'formation'=>$formation]);
    }

    public function afficherStage($idStage)
    {
        //Récupérer le repository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer la ressource en BD
        $stage = $repositoryStage->findOneById($idStage);

        //Envoyer les données à la vue
        return $this->render('pro_stage/afficherStage.html.twig',['stage'=>$stage]);
    }

	public function afficherEntreprises()
	{
        //Récupérer le repository
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les ressources en BD
        $entreprises = $repositoryEntreprise->findAll();

        //Envoyer les données à la vue
		return $this->render('pro_stage/afficherEntreprises.html.twig',['entreprises'=>$entreprises]);
    }
    
	public function afficherFormations()
	{
        //Récupérer le repository
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        //Récupérer les ressources en BD
        $formations = $repositoryFormation->findAll();

        //Envoyer les données à la vue
		return $this->render('pro_stage/afficherFormations.html.twig',['formations'=>$formations]);
	}
}
