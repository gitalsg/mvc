![Picture](./public/img/mvc.jpg)

Kmom06 - badges
====================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gitalsg/mvc/?branch=master)

[![Code Coverage](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gitalsg/mvc/?branch=master)

[![Build Status](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gitalsg/mvc/build-status/master)

[![Code Intelligence Status](https://scrutinizer-ci.com/g/gitalsg/mvc/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Vad som finns i kursrepot
----------------------------
Det som finnes i detta repot är ett projekt för att lära sig använda Symfony och bygga upp en webbplats med hjälp av det. Det används olika verktyg för att kolla kodkvalitet och arbeta med att förbättra det för att uppnåg bra och stabil kod. Vertygen hjälpen en att se kodtäckning och värden som visar på sårbara delar som kan behövas förbättras för att uppnåg god kvalitet och säker kod. Man använder även vertyg för att fixa koden så att den följer vissa standard. Projektet består i sin helhet av olika webbsidor där det har tränats på att använda dessa hjälpsamma vertyg, bland annat PHPUnit, csfix, phpMetrics, för att uppnå hållbar kod bakom webbplatsen. Det finns applikationer där man exempelvis kan dra kort, spela, mm. Det finns en webbsida där man kan läsa om kodkvalitet samt ett en webbsida som leder till slutprojektet. I detta fall handlar slutprojektet om hållbarhet och visar lite mer i djupet hur kan jobba med hållbar utveckling.

Information Symfony
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
