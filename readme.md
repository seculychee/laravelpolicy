<p align="center">Felhasználó jogosultság kezelés Laravel Policy-vel</p>

**Elkészített állományok:**

**Modelek:**
app/Model
app/User.php

**Policies:**
app/Policies

**Migration:**
database\migrations\2014_10_12_000000_create_users_table

**Seed:**
database\seeds\RoleSeeder.php
database\seeds\UserSeeder.php

**Route:**
routes\web.php

**View:**
resources\views

**Telepítés lépései:**

1. Composer letöltés:
https://getcomposer.org/

2. Ezután parancssorral a letöltött tesztfeladat
mappájában a következő parancsot kell futtatni:
`composer update`

3. ".env.example" fájl kiterjesztés módositása a következőre: ".env"

4. Applikáció kulcs létrehozása parancssorból:
`php artisan key:generate`

5. ".env" fájl adatbázis csatlakoztatása:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=homestead<br>
DB_USERNAME=homestead<br>
DB_PASSWORD=homestead

6. Adatbázis feltöltése parancssorból:<br>
`php artisan migrate`


7. Az index.php fájl a public mappában található, ahonnan az oldal indítható.



