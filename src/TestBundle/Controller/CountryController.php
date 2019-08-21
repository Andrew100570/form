<?php

namespace TestBundle\Controller;

use AndrewBundle\Entity\Post;
use TestBundle\Entity\Country;
use TestBundle\Entity\Region;
use TestBundle\Entity\City;
use TestBundle\Entity\User;
use TestBundle\Entity\UserCount;
use TestBundle\Entity\Rubrika;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Country controller.
 *
 */
class CountryController extends Controller
{
    /**
     * Lists all country entities.
     *
     */
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
//        $expr = $em->getExpressionBuilder();


        $user = new User();
        $form = $this->createForm('TestBundle\Form\CountryType', $user);
        $form->handleRequest($request);
        if (isset($_GET["city"])) {


//            $Query_String  = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] );
//            var_dump($Query_String);

//
//            foreach ($Query_String as $e) {
//
//                    echo  urldecode(substr(strrchr($e, "="), 1));
//            }
//
            $var = iconv(' UTF-8', 'utf-8', $_GET["city"]);
            echo $var;
            $qb = $em->createQuery("SELECT co.id FROM TestBundle:Country co where co.id=
            (SELECT r.countryId FROM TestBundle:Region r where r.id=
            (SELECT c.regionId FROM TestBundle:City c WHERE c.name='$var')
            )                  
            ");
            $countries = $qb->getResult();



//            $countries = $em->createQueryBuilder()
//                ->select('co.id')
//                ->from('TestBundle:Country', 'co')
//                ->where(
//                    $expr->in(
//                        'co.id',
//                        $em->createQueryBuilder()
//                            ->select('r.countryId')
//                            ->from('TestBundle:Region', 'r')
//                            ->where(
//                                $expr->in(
//                                    'r.id',
//                                    $em->createQueryBuilder()
//                                        ->select('c.regionId')
//                                        ->from('TestBundle:City', 'c')
//                                        ->where('c.id=12')
//                                        ->getDQL()
//                                )
//                            )
//                            ->getDQL()
//                    )
//                )
//                ->getQuery()->getResult();

//            var_dump($countries);


            foreach ($countries as $k) {
                foreach ($k as $n) {
                    switch ($n) {
                        case 0:
                            $q = $em->createQuery("UPDATE TestBundle:UserCount u SET u.rusCount = u.rusCount + 1");
                            $rusUpdated = $q->execute();
                            break;
                        case 1:
                            $countTwo = $em->createQuery("UPDATE TestBundle:UserCount u SET u.ykrCount=u.ykrCount+1");
                            $counterTwoRus = $countTwo->execute();

                            break;
                        case 21:
                            $countThree = $em->createQuery("UPDATE TestBundle:UserCount u SET u.belCount=u.belCount+1");
                            $counterThreeYkr = $countThree->execute();
                            break;
                        case 81:
                            $countFour = $em->createQuery("UPDATE TestBundle:UserCount u SET u.kazCount=u.kazCount+1");
                            $counterFourKaz = $countFour->execute();
                            break;
                        default:
                            return $this->redirectToRoute('country_index', array('city' => $user->getCity()));
                            break;

                    }
                }
            }

        }



        $queryBel = $em->createQuery('SELECT uc.belCount FROM TestBundle:UserCount uc WHERE uc.id=1');
        $counterBel = $queryBel->getResult();

        $queryRus = $em->createQuery('SELECT uc.rusCount FROM TestBundle:UserCount uc WHERE uc.id=1');
        $counterRus = $queryRus->getResult();

        $queryYkr = $em->createQuery('SELECT uc.ykrCount FROM TestBundle:UserCount uc WHERE uc.id=1');
        $counterYkr = $queryYkr->getResult();

        $queryKaz = $em->createQuery('SELECT uc.kazCount FROM TestBundle:UserCount uc WHERE uc.id=1');
        $counterKaz = $queryKaz->getResult();



        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();


            return $this->redirectToRoute('country_index', array('city' => $user->getCity()));

        }


        return $this->render('country/index.html.twig', array(
//            'countries' => $countries,
            'user' => $user,
            'counterBel' => $counterBel,
            'counterRus' => $counterRus,
            'counterYkr' => $counterYkr,
            'counterKaz' => $counterKaz,
            'form' => $form->createView(),

        ));
    }


    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('country/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('country_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $city = $em->getRepository('TestBundle:City')->findEntitiesByString($requestString);

        return new Response(json_encode($city, JSON_UNESCAPED_UNICODE));
    }

    public function rubrikaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        $rubrika = $em->getRepository('TestBundle:Rubrika')->findEntitiesByString($requestString);

        return new Response(json_encode($rubrika, JSON_UNESCAPED_UNICODE));
    }


}
