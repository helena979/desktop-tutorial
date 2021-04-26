<?php
class Pages extends Controller
{
   public function __construct()
   {
   }
   public function index(){
if(isLoggedIn()){
   redirect('posts');

}

      $data = [
         'title' => 'Project-SharePosts',
         'description' => 'Simple social network bild on the PROJECT PHP'
      ];
      $this->view('pages/index', $data);
   }

   public function about()
   {
      $data = [
         'title' => 'About US',
         'description' => 'App to share posts with other users of Project-SharePosts '

      ];
      $this->view('pages/about', $data);
   }
}
