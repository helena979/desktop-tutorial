<?php
    /* Sadrzaj App klase
    kreira URL i ucitava kontroler jezgra
    URL forma-/controller/method/param 
    */

 class Core {
    protected $currentController = 'Pages'; 
    protected $currentMethod = 'index' ;  
    protected $params = []; 

public function __construct(){
  //  print_r ($this->getUrl()); 

  $url = $this->getUrl();

  if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
  $this->currentController = ucwords($url[0]);
  //unset 0 index
  unset($url[0]);
  }
require_once '../app/controllers/'. $this->currentController .'.php';

// Instanciranje kontrolera klase
$this->currentController = new $this->currentController;

  // Cekiramo drugi dio url-a
  if(isset($url[1])){
      // Ispitacemo da li metoda postoji u kontroler
      if(method_exists($this->currentController, $url[1])){
          // Provjerice metodu ako je tu onda:
          $this->currentMethod = $url[1];
          //Ako ne zelimo da nam se stalno ispisuje about onda moramo da unsetujemo metodu
         //Unset 1 index
          unset($url[1]);
        
      }
  }

    //  Pravimo parametre (Get parameters)
    $this->params = $url ? array_values($url) : [];

    // Pozivaj callback sa nizom parametara
   call_user_func_array([$this->currentController,$this->currentMethod], $this->params);
}
   
        public function getUrl(){
            if(isset($_GET['url'])){  
                $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
            }
            else{
               $url = ['']; 
               return $url;
            }
        }
}  
?>
