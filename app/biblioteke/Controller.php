<?php
/* Osnovni kontroler
On ucitava modele i view-se
*/

class Controller {
    //Imacemo dvije funkcije ili modele jedna model i drga view

// Ucitavanje modela
public function model($model){
    // Zahtjevati model fajl 
    require_once '../app/models/'. $model . '.php' ; // spajamo model sa metodom i spajamo ga sa .php-om

    // Instanciranje modela 
    return new $model();
}
// Ucitavanje view-a

public function view($view, $data = []){

    // Sada cemo da ispitamo view file 
    if(file_exists('../app/views/'. $view . '.php')){
        //Ako ovo postoji onda cemo da ga zatrazimo
        require_once '../app/views/'. $view . '.php';
    }else {
        // view ne postoji
        die('View ne postoji'); // zaustavice aplikaciju
    }


}

}
?>