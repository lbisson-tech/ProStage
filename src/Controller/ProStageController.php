<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    public function index()
    {
        return $this->render('pro_stage/index.html.twig');
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
