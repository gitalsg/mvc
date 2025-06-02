![Picture](./public/img/mvc.jpg)

Kmom06 - badges
----------------------------

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gitalsg/mvc/?branch=master)

[![Code Coverage](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gitalsg/mvc/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gitalsg/mvc/build-status/master)

[![Code Intelligence Status](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Information om kmom01
====================

Klona kursrepo
----------------------------
Ett sätt att klona repot för att påböja ett projekt med Symfony är följande;
Först behöver man stå i kursens mapp och sedan köra nedan kommando i Terminalen:
rsync -av example/symfony me/kmom01

Då har man tagit en kopia av exempel mappen för symfony där "bra-att-ha-kod" finns tillgänglig.

Komma igång med med uppgiften
----------------------------
För att påbörja ett nytt projekt och bygga upp en webbplats så installerar vi ett Symfony skeleton som kommer att hjälpa oss med projektet. 

Vi använder oss av composer för att slutföra installationen; composer require webapp.

Sedan kan vi starta upp serven och se om det fungerar. I Terminalen kör vi följande kommando: php -S localhost:8888 -t public.

Vi börjar skapa  våra controller, templatefiler samt templatemotor som är basen för vår webbplats. Olika routes blir sidorna och vi fixar stylen för att det ska bli enhetligt. 
