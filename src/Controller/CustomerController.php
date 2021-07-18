<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\Type\CustomerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractApiController
{
    public function indexAction(Request $request): Response
    {
        $customers = $this->getDoctrine()->getRepository(persistentObject: Customer::class)->findAll();
        return $this->json($customers);
    }

    public function createAction(Request $request): Response{
        $form = $this->buildForm(type: CustomerType::class);
        $form->handleRequest($request);

        if(!$form->isSubmitted() || !$form->isValid()){
            return $this->respond($form, statusCode:Response::HTTP_BAD_REQUEST);
        }

        /**@var Customer $customer */
        $customer = $form->getData();

        $this->getDoctrine()->getManager()->persist($customer);
        $this->getDoctrine()->getManager()->flush();

        return $this->respond($customer);
    }
}
