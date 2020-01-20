<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use function MongoDB\BSON\toJSON;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/api/users/authentication", name="auth", methods={"POST"})
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function postUser(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        //$u = $this->getDoctrine()->getRepository(User::class)->findByLogin($data['email'], $data['password']);
        $u = $this->userRepository->findByLogin($data['email'], $data['password']);

        return ($this->json($u[0]
        , Response::HTTP_OK));
    }


}
