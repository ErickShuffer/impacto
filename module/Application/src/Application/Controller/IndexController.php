<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            //get the email of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getEmail();
            //get the user_id of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getId();
            //get the username of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getUsername();
            //get the display name of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getDisplayname();
        }
        else{
            //echo "usuario no conectado";
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/user');
        }

        return new ViewModel();
    }
    
    public function multiplicadorAction()
    {
        return new ViewModel();
    }
    
    public function resultadosAction()
    {
        //Matriz que debiera generarse en un model del sistema
        
        $data = $this->getRequest()->getPost()->toArray();
        
        //trabajo algebraico con la matriz por ejemplo sumarle una unidad
        $nueva_matriz = array();
        foreach ($data as $value)
        {
            array_push($nueva_matriz, $value+1);
        }
        
        return new ViewModel(array('resultado'=>$nueva_matriz));
    }
    
    private function multiplicar_matrices($A=array(),$B=array())
    {
        $AB = array(array(),array(),array());
        for($i = 0; $i < 3; $i++) {
            //echo "<tr>";
            for($j = 0; $j < 2; $j++) {
                $AB[$i][$j] = 0;
                for($k = 0; $k < 2; $k++) {
                    $AB[$i][$j] += $A[$i][$k]*$B[$k][$j];
                }
                //echo "<td>" . $AB[$i][$j] . "</td>";
            }
            //echo "</tr>";
        }
    }
}
