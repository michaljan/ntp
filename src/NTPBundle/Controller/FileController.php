<?php
namespace NTPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NTPBundle\Entity\FileUpload;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FileController extends Controller
{
    /**
 * @Template()
 */
    public function uploadFileAction(Request $request,$dataset)
    {
    $fileUpload = new FileUpload();
    $form = $this->createFormBuilder($fileUpload)
                ->add('name')
                ->add('file')
                ->add('planDate','date',array('widget'=>'single_text',
                                               'format'=>'dd-MM-yyyy',
                                               'data'=> new \DateTime(),
                                               'attr' => array('class' => 'form-control')
                                               )
                        )
                ->add('save', SubmitType::class, array('label' => 'Upload file'))
                
            ->getForm();
    $form->handleRequest($request);
    
    if ($form->isValid()) {
        $fileUpload->setDataset($dataset);
        $em = $this->getDoctrine()->getManager();
        $em->persist($fileUpload);
        $em->flush();
        return $this->render('NTPBundle:Default:index.html.twig');
    }
        
    return $this->render('NTPBundle:Forms:upload_form.html.twig',array('form' => $form->createView()));
    }
}

