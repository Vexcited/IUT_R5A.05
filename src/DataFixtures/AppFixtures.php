<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\Editeur;
use App\Entity\JeuVideo;
use App\Entity\JeuVideoPs;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $genreAction = new Genre();
        $genreAction->setNom('ACTION');
        $genreAction->setDescription('Jeux d\'action : jeux de plateforme, combat, tir (FPS, TPS, …)');
        $manager->persist($genreAction);

        $genreAventure = new Genre();
        $genreAventure->setNom('AVENTURE');
        $genreAventure->setDescription('Jeux d\'aventure narrative, point and click…');
        $manager->persist($genreAventure);

        $genreActionAventure = new Genre();
        $genreActionAventure->setNom('ACTION_AVENTURE');
        $genreActionAventure->setDescription('Infiltration, survival, …');
        $manager->persist($genreActionAventure);

        $genreRpg = new Genre();
        $genreRpg->setNom('RPG');
        $genreRpg->setDescription('Jeux de rôle, MMORPG, …');
        $manager->persist($genreRpg);

        $genreStrategie = new Genre();
        $genreStrategie->setNom('STRATEGIE');
        $genreStrategie->setDescription('Jeux de stratégie (RTS, turn-based)');
        $manager->persist($genreStrategie);

        $genreSimulation = new Genre();
        $genreSimulation->setNom('SIMULATION');
        $genreSimulation->setDescription('Jeux de simulation, de gestion');
        $manager->persist($genreSimulation);

        $genreSport = new Genre();
        $genreSport->setNom('SPORT');
        $genreSport->setDescription('Jeux de sport');
        $manager->persist($genreSport);

        $genreCourse = new Genre();
        $genreCourse->setNom('COURSE');
        $genreCourse->setDescription('Jeux de course par ex. automobile');
        $manager->persist($genreCourse);

        $genreReflexion = new Genre();
        $genreReflexion->setNom('REFLEXION');
        $genreReflexion->setDescription('Jeux de réflexion, puzzles, casse-tête');
        $manager->persist($genreReflexion);

        $editeurSony = new Editeur();
        $editeurSony->setNom('Sony Interactive Entertainment');
        $editeurSony->setPays('Japon');
        $editeurSony->setSiteWeb('https://www.sie.com');
        $manager->persist($editeurSony);

        $editeurNintendo = new Editeur();
        $editeurNintendo->setNom('Nintendo');
        $editeurNintendo->setPays('Japon');
        $editeurNintendo->setSiteWeb('https://www.nintendo.com');
        $manager->persist($editeurNintendo);

        $editeurMicrosoft = new Editeur();
        $editeurMicrosoft->setNom('Microsoft');
        $editeurMicrosoft->setPays('États-Unis');
        $editeurMicrosoft->setSiteWeb('https://www.xbox.com');
        $manager->persist($editeurMicrosoft);

        $editeurUbisoft = new Editeur();
        $editeurUbisoft->setNom('Ubisoft');
        $editeurUbisoft->setPays('France');
        $editeurUbisoft->setSiteWeb('https://www.ubisoft.com');
        $manager->persist($editeurUbisoft);

        $editeurEA = new Editeur();
        $editeurEA->setNom('Electronic Arts');
        $editeurEA->setPays('États-Unis');
        $editeurEA->setSiteWeb('https://www.ea.com');
        $manager->persist($editeurEA);

        $editeurActivision = new Editeur();
        $editeurActivision->setNom('Activision Blizzard');
        $editeurActivision->setPays('États-Unis');
        $editeurActivision->setSiteWeb('https://www.activisionblizzard.com');
        $manager->persist($editeurActivision);

        $editeurSquareEnix = new Editeur();
        $editeurSquareEnix->setNom('Square Enix');
        $editeurSquareEnix->setPays('Japon');
        $editeurSquareEnix->setSiteWeb('https://www.square-enix.com');
        $manager->persist($editeurSquareEnix);

        $editeurCapcom = new Editeur();
        $editeurCapcom->setNom('Capcom');
        $editeurCapcom->setPays('Japon');
        $editeurCapcom->setSiteWeb('https://www.capcom.com');
        $manager->persist($editeurCapcom);

        $jeu1 = new JeuVideo();
        $jeu1->setTitre('The Last of Us Part II');
        $jeu1->setEditeur($editeurSony);
        $jeu1->setGenre($genreActionAventure);
        $jeu1->setDeveloppeur('Naughty Dog');
        $jeu1->setDateSortie(new \DateTime('2020-06-19'));
        $jeu1->setPrix(59.99);
        $manager->persist($jeu1);

        $jeu2 = new JeuVideo();
        $jeu2->setTitre('Call of Duty: Modern Warfare III');
        $jeu2->setEditeur($editeurActivision);
        $jeu2->setGenre($genreAction);
        $jeu2->setDeveloppeur('Sledgehammer Games');
        $jeu2->setDateSortie(new \DateTime('2023-11-10'));
        $jeu2->setPrix(69.99);
        $manager->persist($jeu2);

        $jeu3 = new JeuVideo();
        $jeu3->setTitre('God of War Ragnarök');
        $jeu3->setEditeur($editeurSony);
        $jeu3->setGenre($genreActionAventure);
        $jeu3->setDeveloppeur('Santa Monica Studio');
        $jeu3->setDateSortie(new \DateTime('2022-11-09'));
        $jeu3->setPrix(69.99);
        $manager->persist($jeu3);

        $jeu4 = new JeuVideo();
        $jeu4->setTitre('Halo Infinite');
        $jeu4->setEditeur($editeurMicrosoft);
        $jeu4->setGenre($genreAction);
        $jeu4->setDeveloppeur('343 Industries');
        $jeu4->setDateSortie(new \DateTime('2021-12-08'));
        $jeu4->setPrix(59.99);
        $manager->persist($jeu4);

        $jeu5 = new JeuVideo();
        $jeu5->setTitre('Devil May Cry 5');
        $jeu5->setEditeur($editeurCapcom);
        $jeu5->setGenre($genreAction);
        $jeu5->setDeveloppeur('Capcom');
        $jeu5->setDateSortie(new \DateTime('2019-03-08'));
        $jeu5->setPrix(39.99);
        $manager->persist($jeu5);

        $jeu6 = new JeuVideo();
        $jeu6->setTitre('The Legend of Zelda: Tears of the Kingdom');
        $jeu6->setEditeur($editeurNintendo);
        $jeu6->setGenre($genreActionAventure);
        $jeu6->setDeveloppeur('Nintendo EPD');
        $jeu6->setDateSortie(new \DateTime('2023-05-12'));
        $jeu6->setPrix(69.99);
        $manager->persist($jeu6);

        $jeu7 = new JeuVideo();
        $jeu7->setTitre('Uncharted 4: A Thief\'s End');
        $jeu7->setEditeur($editeurSony);
        $jeu7->setGenre($genreActionAventure);
        $jeu7->setDeveloppeur('Naughty Dog');
        $jeu7->setDateSortie(new \DateTime('2016-05-10'));
        $jeu7->setPrix(29.99);
        $manager->persist($jeu7);

        $jeu8 = new JeuVideo();
        $jeu8->setTitre('Assassin\'s Creed Valhalla');
        $jeu8->setEditeur($editeurUbisoft);
        $jeu8->setGenre($genreActionAventure);
        $jeu8->setDeveloppeur('Ubisoft Montreal');
        $jeu8->setDateSortie(new \DateTime('2020-11-10'));
        $jeu8->setPrix(59.99);
        $manager->persist($jeu8);

        $jeu9 = new JeuVideo();
        $jeu9->setTitre('Final Fantasy XVI');
        $jeu9->setEditeur($editeurSquareEnix);
        $jeu9->setGenre($genreRpg);
        $jeu9->setDeveloppeur('Square Enix');
        $jeu9->setDateSortie(new \DateTime('2023-06-22'));
        $jeu9->setPrix(69.99);
        $manager->persist($jeu9);

        $jeu10 = new JeuVideo();
        $jeu10->setTitre('Starfield');
        $jeu10->setEditeur($editeurMicrosoft);
        $jeu10->setGenre($genreRpg);
        $jeu10->setDeveloppeur('Bethesda Game Studios');
        $jeu10->setDateSortie(new \DateTime('2023-09-06'));
        $jeu10->setPrix(69.99);
        $manager->persist($jeu10);

        $jeu11 = new JeuVideo();
        $jeu11->setTitre('Persona 5 Royal');
        $jeu11->setEditeur($editeurSony);
        $jeu11->setGenre($genreRpg);
        $jeu11->setDeveloppeur('Atlus');
        $jeu11->setDateSortie(new \DateTime('2019-10-31'));
        $jeu11->setPrix(59.99);
        $manager->persist($jeu11);

        $jeu12 = new JeuVideo();
        $jeu12->setTitre('Dragon Quest XI');
        $jeu12->setEditeur($editeurSquareEnix);
        $jeu12->setGenre($genreRpg);
        $jeu12->setDeveloppeur('Square Enix');
        $jeu12->setDateSortie(new \DateTime('2017-07-29'));
        $jeu12->setPrix(39.99);
        $manager->persist($jeu12);

        $jeu13 = new JeuVideo();
        $jeu13->setTitre('EA Sports FC 24');
        $jeu13->setEditeur($editeurEA);
        $jeu13->setGenre($genreSport);
        $jeu13->setDeveloppeur('EA Canada');
        $jeu13->setDateSortie(new \DateTime('2023-09-29'));
        $jeu13->setPrix(69.99);
        $manager->persist($jeu13);

        $jeu14 = new JeuVideo();
        $jeu14->setTitre('NBA 2K24');
        $jeu14->setEditeur($editeurEA);
        $jeu14->setGenre($genreSport);
        $jeu14->setDeveloppeur('Visual Concepts');
        $jeu14->setDateSortie(new \DateTime('2023-09-08'));
        $jeu14->setPrix(69.99);
        $manager->persist($jeu14);

        $jeu15 = new JeuVideo();
        $jeu15->setTitre('Mario Strikers: Battle League');
        $jeu15->setEditeur($editeurNintendo);
        $jeu15->setGenre($genreSport);
        $jeu15->setDeveloppeur('Next Level Games');
        $jeu15->setDateSortie(new \DateTime('2022-06-10'));
        $jeu15->setPrix(59.99);
        $manager->persist($jeu15);

        $jeu16 = new JeuVideo();
        $jeu16->setTitre('Gran Turismo 7');
        $jeu16->setEditeur($editeurSony);
        $jeu16->setGenre($genreCourse);
        $jeu16->setDeveloppeur('Polyphony Digital');
        $jeu16->setDateSortie(new \DateTime('2022-03-04'));
        $jeu16->setPrix(69.99);
        $manager->persist($jeu16);

        $jeu17 = new JeuVideo();
        $jeu17->setTitre('Mario Kart 8 Deluxe');
        $jeu17->setEditeur($editeurNintendo);
        $jeu17->setGenre($genreCourse);
        $jeu17->setDeveloppeur('Nintendo EAD');
        $jeu17->setDateSortie(new \DateTime('2017-04-28'));
        $jeu17->setPrix(59.99);
        $manager->persist($jeu17);

        $jeu18 = new JeuVideo();
        $jeu18->setTitre('Forza Horizon 5');
        $jeu18->setEditeur($editeurMicrosoft);
        $jeu18->setGenre($genreCourse);
        $jeu18->setDeveloppeur('Playground Games');
        $jeu18->setDateSortie(new \DateTime('2021-11-09'));
        $jeu18->setPrix(69.99);
        $manager->persist($jeu18);

        $jeu19 = new JeuVideo();
        $jeu19->setTitre('Age of Empires IV');
        $jeu19->setEditeur($editeurMicrosoft);
        $jeu19->setGenre($genreStrategie);
        $jeu19->setDeveloppeur('Relic Entertainment');
        $jeu19->setDateSortie(new \DateTime('2021-10-28'));
        $jeu19->setPrix(59.99);
        $manager->persist($jeu19);

        $jeu20 = new JeuVideo();
        $jeu20->setTitre('StarCraft II');
        $jeu20->setEditeur($editeurActivision);
        $jeu20->setGenre($genreStrategie);
        $jeu20->setDeveloppeur('Blizzard Entertainment');
        $jeu20->setDateSortie(new \DateTime('2010-07-27'));
        $jeu20->setPrix(39.99);
        $manager->persist($jeu20);

        $jeu21 = new JeuVideo();
        $jeu21->setTitre('Fire Emblem: Three Houses');
        $jeu21->setEditeur($editeurNintendo);
        $jeu21->setGenre($genreStrategie);
        $jeu21->setDeveloppeur('Intelligent Systems');
        $jeu21->setDateSortie(new \DateTime('2019-07-26'));
        $jeu21->setPrix(59.99);
        $manager->persist($jeu21);

        $jeu22 = new JeuVideo();
        $jeu22->setTitre('The Sims 4');
        $jeu22->setEditeur($editeurEA);
        $jeu22->setGenre($genreSimulation);
        $jeu22->setDeveloppeur('Maxis');
        $jeu22->setDateSortie(new \DateTime('2014-09-02'));
        $jeu22->setPrix(39.99);
        $manager->persist($jeu22);

        $jeu23 = new JeuVideo();
        $jeu23->setTitre('Animal Crossing: New Horizons');
        $jeu23->setEditeur($editeurNintendo);
        $jeu23->setGenre($genreSimulation);
        $jeu23->setDeveloppeur('Nintendo EPD');
        $jeu23->setDateSortie(new \DateTime('2020-03-20'));
        $jeu23->setPrix(59.99);
        $manager->persist($jeu23);

        $jeu24 = new JeuVideo();
        $jeu24->setTitre('Microsoft Flight Simulator');
        $jeu24->setEditeur($editeurMicrosoft);
        $jeu24->setGenre($genreSimulation);
        $jeu24->setDeveloppeur('Asobo Studio');
        $jeu24->setDateSortie(new \DateTime('2020-08-18'));
        $jeu24->setPrix(69.99);
        $manager->persist($jeu24);

        $jeu25 = new JeuVideo();
        $jeu25->setTitre('Portal 2');
        $jeu25->setEditeur($editeurEA);
        $jeu25->setGenre($genreReflexion);
        $jeu25->setDeveloppeur('Valve');
        $jeu25->setDateSortie(new \DateTime('2011-04-19'));
        $jeu25->setPrix(19.99);
        $manager->persist($jeu25);

        $jeu26 = new JeuVideo();
        $jeu26->setTitre('Tetris Effect');
        $jeu26->setEditeur($editeurSony);
        $jeu26->setGenre($genreReflexion);
        $jeu26->setDeveloppeur('Monstars Inc.');
        $jeu26->setDateSortie(new \DateTime('2018-11-09'));
        $jeu26->setPrix(39.99);
        $manager->persist($jeu26);

        $jeu27 = new JeuVideo();
        $jeu27->setTitre('Captain Toad: Treasure Tracker');
        $jeu27->setEditeur($editeurNintendo);
        $jeu27->setGenre($genreReflexion);
        $jeu27->setDeveloppeur('Nintendo EAD Tokyo');
        $jeu27->setDateSortie(new \DateTime('2014-11-13'));
        $jeu27->setPrix(39.99);
        $manager->persist($jeu27);

        $jeu28 = new JeuVideo();
        $jeu28->setTitre('Resident Evil 4 Remake');
        $jeu28->setEditeur($editeurCapcom);
        $jeu28->setGenre($genreActionAventure);
        $jeu28->setDeveloppeur('Capcom');
        $jeu28->setDateSortie(new \DateTime('2023-03-24'));
        $jeu28->setPrix(59.99);
        $manager->persist($jeu28);

        $jeu29 = new JeuVideo();
        $jeu29->setTitre('Ghost of Tsushima');
        $jeu29->setEditeur($editeurSony);
        $jeu29->setGenre($genreActionAventure);
        $jeu29->setDeveloppeur('Sucker Punch Productions');
        $jeu29->setDateSortie(new \DateTime('2020-07-17'));
        $jeu29->setPrix(59.99);
        $manager->persist($jeu29);

        $jeu30 = new JeuVideo();
        $jeu30->setTitre('Metroid Dread');
        $jeu30->setEditeur($editeurNintendo);
        $jeu30->setGenre($genreActionAventure);
        $jeu30->setDeveloppeur('MercurySteam');
        $jeu30->setDateSortie(new \DateTime('2021-10-08'));
        $jeu30->setPrix(59.99);
        $manager->persist($jeu30);

        $manager->flush();
    }
}
