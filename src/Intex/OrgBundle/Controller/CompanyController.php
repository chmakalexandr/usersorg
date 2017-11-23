<?php

namespace Intex\OrgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CompanyController
 * @package Intex\OrgBundle\Controller
 */
class CompanyController extends Controller
{
    /**
     * Render list all companies
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCompaniesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $companies = $em->getRepository('IntexOrgBundle:Company')->findAll();

        return $this->render('IntexOrgBundle:Company:index.html.twig', array(
            'companies' => $companies
        ));
    }

    /**
     * Render information about company by id
     * @param int $companyId Id organization's
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showCompanyAction($companyId)
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('IntexOrgBundle:Company')->find($companyId);
        if (!$company) {
            throw $this->createNotFoundException('Unable to find company.');
        }
        return $this->render('IntexOrgBundle:Company:show.html.twig', array(
            'company' => $company,
        ));
    }
}
