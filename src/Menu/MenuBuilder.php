<?php

namespace App\Menu;

use Knp\Menu\Attribute\AsMenuBuilder;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    #[AsMenuBuilder(name: 'main')] // The name is what is used to retrieve the menu
    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menuJV = $menu->addChild('Jeux Vidéo', [
            'route' => 'app_jeu_video_index',
            'extras' => ['icon' => 'joystick']
        ]);

        $menuG = $menu->addChild('Genres', [
            'route' => 'app_genre_index',
            'extras' => ['icon' => 'tag']
        ]);

        $menuE = $menu->addChild('Éditeurs', [
            'route' => 'app_editeur_index',
            'extras' => ['icon' => 'building']
        ]);

        $menuJV->addChild("Liste", ['route' => 'app_jeu_video_index']);
        $menuJV->addChild("Créer", ['route' => 'app_jeu_video_new']);

        $menuG->addChild("Liste", ['route' => 'app_genre_index']);
        $menuG->addChild("Créer", ['route' => 'app_genre_new']);

        $menuE->addChild("Liste", ['route' => 'app_editeur_index']);
        $menuE->addChild("Créer", ['route' => 'app_editeur_new']);

        return $menu;
    }
}
