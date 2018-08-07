<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.07.18
 * Time: 11:24
 */

namespace App\Controller;
use App\Service\Login;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StartpageController extends Controller
{
    /**
     * @Route("/")
     *
     */
    public function indexAction(){
        phpinfo();
        return $this->render('/login.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, Login $login){
//        $username = $request->query->get('username');
        $username = 'admin';
        $result = $login->execute($username);
        $message = $result != null ? "Successfully logged in." : "Could not logged in.";
        $twigParameter = array(
            'message' => $message
        );
        return $this->render('/main.html.twig', $twigParameter);
    }
}