<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user/create", name="admin_user_create")
     * @IsGranted("ROLE_ADMIN")
     */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $form = $this->createForm(UserType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $user->getPlainPassword())
            );
            $user->setRoles(['ROLE_USER']);

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();
        }

        return $this->render('admin/user_create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
