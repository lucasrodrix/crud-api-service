<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractController
{
    public function indexAction(Request $request): Response
    {
        $customers = $this->getDoctrine()->getRepository(persistentObject: Customer::class)->findAll();
        return $this->json($customers);
    }

    public function createAction(Request $request): Response{
        return $this->json(data:'');
    }
}
