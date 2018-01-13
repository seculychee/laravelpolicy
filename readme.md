<p align="center">Felhasználó jogosultság kezelés Laravel Policy-vel</p>

**Elkészített állományok:**

**Models:**<br>
app\Model<br>
app\User.php

**Policies:**<br>
app\Policies<br>

**Migration:**<br>
database\migrations\2014_10_12_000000_create_users_table

**Seed:**<br>
database\seeds\RoleSeeder.php<br>
database\seeds\UserSeeder.php<br>

**Route:**<br>
routes\web.php<br>

**View:**<br>
resources\views<br>

**Telepítés lépései:**

1. Composer letöltés:
https://getcomposer.org/

2. Ezután parancssorral a mappájában a következő parancsot kell futtatni:
`composer update`

3. ".env.example" fájl kiterjesztés módositása a következőre: ".env"

4. App key létrehozása parancssorból:
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
`php artisan db:seed`


7. Az index.php fájl a public mappában található, ahonnan az oldal indítható.



