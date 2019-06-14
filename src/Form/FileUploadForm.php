<?php
    namespace Drupal\file_upload\Form;

    use Drupal\Core\Form\FormBase;
    use Drupal\Core\Form\FormStateInterface;
    use Drupal\Core\Ajax\AjaxResponse;
    use Drupal\Core\Ajax\CssCommand;
    use Drupal\Core\Ajax\HtmlCommand;
    use Drupal\file\Entity\File;



    class FileUploadForm extends FormBase{

        public function getFormID(){
            return 'file_upload_form';
        }

        public function buildForm(array $form, FormStateInterface $form_state){
       
            $form['file_upload'] = [
                '#type' => 'managed_file',
                '#title' => $this->t('File Upload'),
                '#upload_location' => 'public://my_files',
                '#upload_validators' => [
                  'file_validate_extensions' => ['pdf'],
                ],
              ];
  

            return $form;
        }

        public function submitForm(array &$form, FormStateInterface $form_state){
            $form_file = $form_state->getValue('file_upload', 0);
            if (isset($form_file[0]) && !empty($form_file[0])) {
              $file = File::load($form_file[0]);
              $file->setPermanent();
              $file->save();
              
            }
            
            

        }

        public function validateForm(array &$form, FormStateInterface $form_state){
            if ($form_state->getValue('file_upload') == NULL) {
                $form_state->setErrorByName('feli_upload', $this->t('File.'));
              }


             kint($form_state->getValue('file_upload'));
              
              // $files = \Drupal::entityTypeManager()->getStorage('file')->loadMultiple();
             
              // \Drupal::messenger()->addMessage(t('File uploaded'));
              // foreach($files as $item){
              //   if($item->Filename == $file)
              //   $item->delete();
              // }
          
        }
    }