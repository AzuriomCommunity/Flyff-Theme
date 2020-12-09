<?php

return [
    'config' => [
        'global' => [
            'name' => 'Général',
            'id' => 'general',
            'article' => [
                'comment' => 'Permet d\'afficher les commentaire dans les articles',
                'like' => 'Permet d\'afficher les jaime dans les articles'
            ]
        ],
        'slider' => [
            'name' => 'Slider',
            'id' => 'slider'
        ],
        'social' => [
            'name' => 'Réseau social',
            'id' => 'social-link'
        ],
        'footer' => [
            'name' => 'Pied de page',
            'id' => 'footer-back'
        ],
        'cgu' => [
            'name' => 'Condition général d\'utilisation',
            'input_link' => 'Lien de page des CGU',
            'abbreviation' => 'CGU',
            'warning' => '<i class="fas fa-exclamation-triangle pr-1"></i></span>Penser a crée la <a href="/admin/pages" target="_blank" title="Page">page</a> avec le même lien que vous avez entrez si dessous'
        ],
        'cgv' => [
            'name' => 'Condition général de vente',
            'input_link' => 'Lien de page des CGV',
            'abbreviation' => 'CGV',
            'warning' => '<i class="fas fa-exclamation-triangle pr-1"></i></span>Penser a crée la <a href="/admin/pages" target="_blank" title="Page">page</a> avec le même lien que vous avez entrez si dessous'
        ],
        'download' => [
            'name' => 'Téléchargement',
            'input_link' => 'Lien de la page de téléchargement',
            'warning' => '<i class="fas fa-exclamation-triangle pr-1"></i></span>Penser a crée la <a href="/admin/pages" target="_blank" title="Page">page</a> avec le même lien que vous avez entrez si dessous'
        ],
        'image' => 'Image',
        'title' => 'Titre',
        'description' => 'Description',
        'icon' => 'Icon  exemple: <i class="fab fa-discord"></i>',
        'name' => 'Nom',
        'lien' => 'Lien',
        'fontawesome' => 'Pour obtenir les icon veuillez utiliser les classe de',
        'discord' => 'ID du serveur Discord',
    ],
];
