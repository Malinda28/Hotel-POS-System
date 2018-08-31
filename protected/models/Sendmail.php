<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Sendmail{
    
public function mailsend()
    {   
        $message            = new YiiMailMessage;
        //this points to the file test.php inside the view path
        $message->view = "test";
        $sid                 = 1;
        $criteria            = new CDbCriteria();
        $criteria->condition = "studentID=".$sid."";            
        //$studModel1          = Student::model()->findByPk($sid);        
        //$params              = array('myMail'=>$studModel1);
        $message->subject    = 'My TestSubject';
       // $message->setBody($params, 'text/html');                
        $message->setBody ='TESING';
        $message->addTo('malinda.techcube@gmail.com');
        $message->from = 'updates@techcubeglobal.com';   
        Yii::app()->mail->send($message); 
        
        echo'mail send';
        exit(); 
    }
  
    
    
    } 
  ?>  