Neformaliojo ugdymo administravimo sistema
===========================================
Apie sistemą
-------------------------
Neformaliojo ugdymo administravimo sistema yra sukurta norint palengvinti administracijos darbą, bei centralizuoti visus Neformaliojo ugdymo aspektus. Šios sistemos pagalba galima administruoti ,bei saugoti duomenis apie mokinius, bei mokytojus arba dėstytojus. Pagrindinė sistemos funkcija tai mokymo programų / užsiėmimų administravimas, t.y. Galima sukurti mokymo programas, i joms lengvai ir greitai priskirti mokinius ir mokytojus. O kalendoriaus pagalba nustatyti užsiėmimų laiką. Kalendoriaus duomenis yra labai lengvai integruoti i bet kuria sistemą, nes jis veikia per API. Sistema naudoja saugų slaptažodžiu šifravimo būdą – „bcrypt“ . O paprastas užsiregistravęs vartotojas negalės nieko matyti ,bei redaguoti, nes jis turi būti administratorius. 

Sistemos įdiegimas
-----------------------

### 1. Parsisiųskite projektą

```sh
git clone https://github.com/rajmondik1/md-sistema.git
```
arba 
https://github.com/rajmondik1/md-sistema


### 2. Projektui reikalingu failų įdiegimas
Projekto direktorijoje
```sh
php composer.phar install
```
### 3. Duomenų bazė
```sh
bin/console doctrine:generate:entities App
bin/console doctrine:schema:update --force
```
Pastaba! Visos komandos daromos projekto direktorijoje

###Viskas!