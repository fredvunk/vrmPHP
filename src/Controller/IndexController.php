<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Bookings;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\ORM\EntityManagerInterface;

class IndexController extends AbstractController
{

    public function index()
    {
       	return $this->render("main.html.twig");
    }
    /**
     * @Route("/bookings/create")
     */
    public function create(EntityManagerInterface $em)
    {
        $booking = new Bookings();
        $booking->setFirstName('Lars');
        $booking->setLastName('Samm');
        $booking->setPhone('55555555');
        $booking->setEmail('lars.samm@test.ee');
        $booking->setBirthdate(new \DateTime('1995-09-01'));
        $booking->setStartDate(new \DateTime('2019-09-16'));
        $booking->setEndDate(new \DateTime('2019-09-18'));
        $booking->setArrivalTime(new \DateTime('14:00'));
        $booking->setNumberOfPeople(2);
        $booking->setAdditionaInformation('mingi oluline info');
        $booking->setPayingMethod('cash');
        $em->persist($booking);
        $em->flush();
        return new Response(
            '<html><body><h1>'.$booking->getFirstName().' '.$booking->getLastName().', booking data is saved.</h1></body></html>'
        );
    }
}

