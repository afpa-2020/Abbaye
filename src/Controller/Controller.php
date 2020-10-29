<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Project;
use App\Entity\Customer;
use App\Repository\CustomerRepository;
use App\Repository\EmployeeRepository;
use App\Repository\ProjectRepository;
use App\Repository\DocumentRepository;
use App\Forms\RegisterForm;
use App\Forms\LoginForm;
use App\Forms\AddCustomerForm;
use App\Forms\UpdateCustomerForm;
use App\Forms\DeleteCustomerForm;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;

abstract class Controller
{
    public static function homeController()
    {
        session_start();
        ob_start();
        include '../templates/index.php';
        ob_end_flush();
    }

    public static function loginController()
    {
        session_start();

        if (!empty($_POST) && isset($_POST['identifiant'])){
            $signin = new LoginForm($_POST);
            $signin->authentification();
        } 
       
    }

    public static function signupController() //Formulaire d'enregistrement
    {
        ob_start();
        include '../templates/signup.php';
        ob_end_flush();
    }

    public static function registrationController() // Vérification des données
    {
        session_start();
        if (!empty($_POST)){
            $signup = new RegisterForm($_POST);
            echo $signup->register();
        }
    }

    public static function error404Controller()
    {
        session_start();
        ob_start();
        include '../templates/404.php';
        ob_end_flush();
    }

        
    /**
     * customersController: Controller de la page customer.php,
     * Permet d'authentifier le visiteur,
     * afficher une table avec sa pagination et la possibilité de faire une recherche dans celle-ci
     *
     * @return void
     */
    public static function customersController()
    {
        session_start();

        if(!isset($_SESSION['login'])) {
            header('Location:/logplz');
        }
        ob_start();
            

        $customerRepository = new CustomerRepository();

        $arraysult = $customerRepository->paginate('company_name');
        if(isset($_GET['search'])) {
            $customers = $customerRepository->searching($_GET['search'],["id"=>"ASC"],$arraysult[0], $arraysult[1], 'company_name');
        }
        else {
            $customers = $customerRepository->findBy([],["id"=>"ASC"],$arraysult[0], $arraysult[1]);
            $_GET['search'] = null;
        }
        
        $currentPage = $arraysult[2];
        $pages = $arraysult[3];
        include '../templates/customers.php';
        
        ob_end_flush();
    }

    public static function projectsController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/logplz');
        }

        ob_start();

        $projectRepository = new ProjectRepository();
        $arraysult = $projectRepository->paginate('shortname');
        if(isset($_GET['search'])) {
            $projects = $projectRepository->searching($_GET['search'],["id"=>"ASC"],$arraysult[0], $arraysult[1],'shortname');
        }
        else {
            $projects = $projectRepository->findBy([],["id"=>"ASC"],$arraysult[0], $arraysult[1]);
            $_GET['search'] = null;

        }
        
        $currentPage = $arraysult[2];
        $pages = $arraysult[3];
        include '../templates/projects.php';

        
        ob_end_flush();
    }

    public static function contactsController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/logplz');
        } 
        ob_start();
        $contactRepository = new ContactRepository();
        $contacts = $contactRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/contacts.php';
        ob_end_flush();
    }

    public static function employeesController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/logplz');
        } 
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $arraysult = $employeeRepository->paginate('lastname');
        if(isset($_GET['search'])) {
            $employees = $employeeRepository->searching($_GET['search'],["id"=>"ASC"],$arraysult[0], $arraysult[1],'lastname');
        }
        else {
            $employees = $employeeRepository->findBy([],["id"=>"ASC"],$arraysult[0], $arraysult[1]);
            $_GET['search'] = null;

        }
        
        $currentPage = $arraysult[2];
        $pages = $arraysult[3];
       
        
        include '../templates/employees.php';
        ob_end_flush();
    }

    public static function disconnectController(){
        session_start();
        session_destroy();
        header("location:/");
    }

    public static function logplzController(){
        session_start();
        ob_start();
        include '../templates/logplz.php';
        ob_end_flush();
    }

    public static function shapeController()
    {
        ob_start();
        include '../templates/shape.php';
        ob_end_flush();
    }

    public static function selectcustomerController(){
        $customerRepository = new CustomerRepository();
        $data = file_get_contents("php://input");
        $data = json_decode($data);
        $customer = $customerRepository->find($data->id);

        $contactRepository = new ContactRepository();
        $contacts = $contactRepository->findSampleByCustomer($customer);
        $contacts = array_map(fn($contact)=>$contact->toJsonArray(), $contacts);
        $customer->contacts = $contacts;

        echo $customer->toJson();
    } 

    public static function addcustomerController(){
        if (isset($_POST['form'])) {
            $newCustomerForm = new AddCustomerForm($_POST);
            echo $newCustomerForm->addToDatabase();
        } else {
            header('Location:/');
        }
    }
    
    public static function selectprojectController(){
        $projectRepository = new ProjectRepository();
        $project = $projectRepository->find($_POST['id']);
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->find($project->getCustomerId());
        $project->clientName = $customer->getCompanyName();
        $project->clientPhone = $customer->getPhone();
        echo $project->toJson();
    }

    public function selectemployeeController(){
        $employeeRepository = new EmployeeRepository();
        $employee = $employeeRepository->find($_POST['id']);
        echo $employee->toJson();
    }
    

  
    public static function nouscontacterController(){
        ob_start();
        include '../templates/nouscontacter.php';
        ob_end_flush();
    }

    public static function sendmailController(){
        if (isset($_POST['message']) && !empty($_POST['message'])) {
          
            $objet = $_POST['objet'];
            $message = $_POST['firstname'] . $_POST['lastname'] . "vous a envoyé un message !
                        Le voici  !".$_POST['message']. "et voila c'est tout !
                        Pour lui répondre, écrivez à cette adresse :" . $_POST['email'];
    
            mail('abi.fictive@gmail.com', $objet , $message );
            header('Location:/mercipourvotremail');
        } else {
            header('Location:/');
        }
    }

    public static function mercipourvotremailController()
    {
        session_start();
        ob_start();
        include '../templates/mercipourvotremail.php';
        ob_end_flush();
    }

    public static function updatecustomerController() {
        if ($_POST['id']) {
            $updateCustomer = new UpdateCustomerForm($_POST);
            echo $updateCustomer->updateCustomer();
        } else {
            header('Location:/');
        }
    }

    public static function deletecustomerController() {
        if ($_POST['id']) {
            $deleteCustomer = new DeleteCustomerForm($_POST);
            echo $deleteCustomer->deleteCustomer();
        } else {
            header('Location:/');
        }
    }
}
