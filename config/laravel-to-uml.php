<?php

return [
    /**
     * Default route to see the UML diagram.
     */
    'route' => '/uml',

    /**
     * You can turn on or off the indexing of specific types
     * of classes. By default, LTU processes only controllers
     * and models.
     */
    'casts'         => false,
    'channels'      => false,
    'commands'      => false,
    'components'    => false,
    'controllers'   => true,
    'events'        => false,
    'exceptions'    => false,
    'jobs'          => false,
    'listeners'     => false,
    'mails'         => false,
    'middlewares'   => false,
    'models'        => true,
    'notifications' => false,
    'observers'     => false,
    'policies'      => false,
    'providers'     => false,
    'requests'      => true,
    'resources'     => false,
    'rules'         => false,

    /**
     * You can define specific nomnoml styling.
     * For more information: https://github.com/skanaar/nomnoml
     */
    'style' => [
    'background' => '#FFFFFF', // Fond blanc pour un meilleur contraste
    'stroke'     => '#000000', // Traits noirs pour une meilleure visibilité
    'arrowSize'  => 1.5,       // Augmenter la taille des flèches
    'bendSize'   => 0.5,       // Ajuster la courbure des lignes
    'direction'  => 'down',    // Conserver la direction
    'gutter'     => 20,        // Augmenter l'espace entre les éléments
    'edgeMargin' => 10,        // Ajouter une marge sur les bords
    'gravity'    => 1,         // Conserver la gravité
    'edges'      => 'rounded', // Conserver les bords arrondis
    'fill'       => '#D6EAF8', // Utiliser un bleu clair pour remplir les éléments
    'fillArrows' => true,      // Remplir les flèches
    'font'       => 'Arial',   // Utiliser une police plus commune et lisible
    'fontSize'   => 14,        // Augmenter la taille de la police
    'leading'    => 1.5,       // Augmenter l'interligne
    'lineWidth'  => 2,         // Réduire légèrement l'épaisseur des lignes pour un look plus fin
    'padding'    => 12,        // Augmenter le padding autour des éléments
    'spacing'    => 70,        // Augmenter l'espacement entre les éléments pour éviter le chevauchement
    'title'      => 'Diagramme UML', // Modifier le titre pour quelque chose de plus descriptif
    'zoom'       => 1,         // Conserver le niveau de zoom
    'acyclicer'  => 'greedy',  // Conserver l'acyclicer
    'ranker'     => 'longest-path', // Conserver le ranker
    'modelFill'  => '#A6CEE3', // Couleur de remplissage pour les modèles
    'controllerFill' => '#B2DF8A', // Couleur de remplissage pour les contrôleurs
],

    /**
     * Specific files can be excluded if need be.
     * By default, all default Laravel classes are ignored.
     */
    'excludeFiles' => [
        'Http/Kernel.php',
        'Console/Kernel.php',
        'Exceptions/Handler.php',
        'Http/Controllers/Controller.php',
        'Http/Middleware/Authenticate.php',
        'Http/Middleware/EncryptCookies.php',
        'Http/Middleware/PreventRequestsDuringMaintenance.php',
        'Http/Middleware/RedirectIfAuthenticated.php',
        'Http/Middleware/TrimStrings.php',
        'Http/Middleware/TrustHosts.php',
        'Http/Middleware/TrustProxies.php',
        'Http/Middleware/VerifyCsrfToken.php',
        'Providers/AppServiceProvider.php',
        'Providers/AuthServiceProvider.php',
        'Providers/BroadcastServiceProvider.php',
        'Providers/EventServiceProvider.php',
        'Providers/RouteServiceProvider.php',
    ],

    /**
     * In case you changed any of the default directories
     * for different classes, please amend below.
     */
    'directories' => [
        'casts'         => 'Casts/',
        'channels'      => 'Broadcasting/',
        'commands'      => 'Console/Commands/',
        'components'    => 'View/Components/',
        'controllers'   => 'Http/Controllers/',
        'events'        => 'Events/',
        'exceptions'    => 'Exceptions/',
        'jobs'          => 'Jobs/',
        'listeners'     => 'Listeners/',
        'mails'         => 'Mail/',
        'middlewares'   => 'Http/Middleware/',
        'models'        => 'Models/',
        'notifications' => 'Notifications/',
        'observers'     => 'Observers/',
        'policies'      => 'Policies/',
        'providers'     => 'Providers/',
        'requests'      => 'Http/Requests/',
        'resources'     => 'Http/Resources/',
        'rules'         => 'Rules/',
    ],
];
