<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $post = new Post();

        $user->setName("Ktos");
        $manager->persist($user);
        $post->setTitle('Zycie');
        $post->setContent('Życie (gr. βίος, bios) w biologii ma dwie, związane ze sobą definicje:
        zespół procesów życiowych – swoistych, wysoko zorganizowanych funkcjonalnie (w cykle i sieci), przemian 
        fizycznych i reakcji chemicznych, zachodzących w otwartych termodynamicznie, wyodrębnionych z otoczenia 
        układach fizycznych (zawierających zawsze kwasy nukleinowe i białka, według stanu współczesnej wiedzy),
         zbudowanych morfologicznie (o hierarchicznej strukturze), składających się z jednej lub wielu komórek 
        (organizmach, osobnikach) oraz swoistych zjawisk biologicznych, zachodzących z udziałem tych organizmów 
         – istniejący na Ziemi, a być może też na innych planetach[1][2]
        właściwość pewnych układów fizycznych (→ organizmów), w których zachodzą procesy życiowe[3][4][5].');
                $post->setCreatedAt(new \DateTime());
        $post->getUser();

        $manager->persist($post);

        $manager->flush();
    }
}
