<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ProjectController extends AbstractController
{
    #[Route("/proj", name: "project")]
    public function project(): Response
    {
        return $this->render('proj/project.html.twig');
    }

    #[Route("/proj/about", name: "about_proj")]
    public function about(): Response
    {
        return $this->render('proj/about.html.twig');
    }

    #[Route("/proj/halsa", name: "halsa")]
    public function halsa(): Response
    {
        return $this->render('proj/halsa.html.twig');
    }

    #[Route('/diagram/mat', name: 'diagram_matern')]
    public function diagMaternity(ChartBuilderInterface $chartBuilder): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
            'labels' => ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2012', '2013', '2014', '2015', '2016', '2017'],
            'datasets' => [[
                'label' => 'Maternal mortality',
                'backgroundColor' => 'rgb(50, 160, 180)',
                'data' => [4.4, 3.3, 4.2, 2.0, 2.0, 5.9, 4.7, 1.9, 5.5, 5.4, 2.6, 0.9, 4.4, 6.2, 3.5, 0.9, 2.6, 3.5],
            ]],
        ]);

        $chart->setOptions([
            'responsive' => true,
        ]);

        return $this->render('proj/treett.html.twig', [
            'chart' => $chart,
        ]);
    }

    #[Route('/diagram/barn', name: 'diagram_barn')]
    public function diagBarn(ChartBuilderInterface $chartBuilder): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
            'labels' => ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2012', '2013', '2014', '2015', '2016', '2017'],
            'datasets' => [[
                'label' => 'Mortality rate under five years',
                'backgroundColor' => 'rgb(50, 160, 180)',
                'data' => [3.9, 4.4, 4.0, 3.9, 3.9, 3.3, 3.5, 3.1, 3.0, 3.3, 3.1, 2.6, 3.1, 3.2, 2.6, 3.0, 3.0, 2.9],
            ]],
        ]);

        $chart->setOptions([
            'responsive' => true,
        ]);

        return $this->render('proj/tretva.html.twig', [
            'chart' => $chart,
        ]);
    }
}
