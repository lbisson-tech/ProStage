<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\entity\Stage;
use App\entity\Entreprise;
use App\entity\Formation;

class ProStageController extends AbstractController
{
    public function index()
    {
        //Récupérer le repository
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        //Récupérer les ressources en BD
        $stages = $repositoryStage->findAll();

        //Envoyer les données à la vue
        return $this->render('pro_stage/index.html.twig',['stages'=>$stages]);
    }
    public function afficherStage($idStage)
    {
        return $this->render('pro_stage/afficherStage.html.twig',['idStage'=>$idStage]);
    }
	public function afficherEntreprises()
	{
		return $this->render('pro_stage/afficherEntreprises.html.twig');
	}
	public function afficherFormations()
	{
		return $this->render('pro_stage/afficherFormations.html.twig');
	}
}
