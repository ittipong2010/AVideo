<?php

namespace Symfony\Component\Routing\Tests\Fixtures\AttributeFixtures;

use Symfony\Component\Routing\Annotation\Route;

#[Route(path: ['en' => '/en', 'nl' => '/nl'])]
class LocalizedPrefixWithRouteWithoutLocale
{
    #[Route(path: '/suffix', name: 'action')]
    public function action()
    {
    }
}
