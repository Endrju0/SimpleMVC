<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    // Index method is mandatory
    // call_user_func_array() expects parameter 1 to be a valid callback
    public function index() 
    {
        $posts = $this->postModel->getPosts();

        $this->view('pages/index', [
            'title' => 'Welcome',
            'posts' => $posts
        ]);
    }

    public function about() 
    {
        $this->view('pages/about', ['title' => 'About']);
    }
}