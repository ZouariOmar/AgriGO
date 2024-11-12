<?php

$routes = [
    'offre' => [
        'index' => 'OffreController@readOffres',
        'create' => 'OffreController@createOffre',
        'update' => 'OffreController@updateOffre',
        'delete' => 'OffreController@deleteOffre',
        'show' => 'OffreController@showOffre',
    ],
    'categorie' => [
        'index' => 'CategorieController@readCategories',
        'create' => 'CategorieController@createCategorie',
        'update' => 'CategorieController@updateCategorie',
        'delete' => 'CategorieController@deleteCategorie',
        'show' => 'CategorieController@showCategorie',
    ],
];

return $routes;