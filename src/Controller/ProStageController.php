<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\ntity\Formation;

class ProStageController extends AbstractController
{
    public function index()
    {
        //Récupérer le repository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les ressources en BD
        $stages = $repositoryStage->findAll();

        //Envoyer les données à la vue
        return $this->render('pro_stage/index.html.twig',['listeStages'=>$stages]);
    }

    public function afficherStagesEntreprise($idEntreprise)
    {
        //Récupérer le repository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les ressources en BD
        $stages = $repositoryStage->findBy(['id_entreprise'=>$idEntreprise]);

        //Envoyer les données à la vue
        return $this->render('pro_stage/index.html.twig',['listeStages'=>$stages]);
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
        $repositoryStage = $this->getDoctrine()->getRepository(Entreprise::class);

        //Récupérer les ressources en BD
        $entreprises = $repositoryStage->findAll();

        //Envoyer les données à la vue
		return $this->render('pro_stage/afficherEntreprises.html.twig',['entreprises'=>$entreprises]);
    }
    
	public function afficherFormations()
	{
		return $this->render('pro_stage/afficherFormations.html.twig');
	}
}
