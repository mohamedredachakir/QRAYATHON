<?php

class HomeController {

    public function index() {
        
        $features = [
            ['icon' => 'fa-chess-king', 'title' => 'Elite Selection', 'desc' => 'Only the finest literature approved by the high council.'],
            ['icon' => 'fa-scroll', 'title' => 'Digital Scrolls', 'desc' => 'Access the entire kingdom\'s knowledge from your quarters.'],
            ['icon' => 'fa-shield-halved', 'title' => 'Secure Archives', 'desc' => 'Your reading history is protected within the royal vaults.']
        ];

        
        require_once __DIR__ . '/../../views/home.php';
    }
}