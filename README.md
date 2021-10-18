# bigfish-test

##Beüzemelés linuxon
szükség hogy telepítsük a gépünkre a Dockert

a project gyökérmappában futtasuk a "docker-compose up -d" parancsot

a könnyebb tesztelés érdekében a változok a .envben és a docker-compose.yml-ben előre beégetettek

ezután szükséges futtatni egy "docker exec -it bigfish-test_app_1 bash" parancsot majd a megnyíló cli-ben a "php artisan migrate"-et futtassuk

##Api útvonalak

POST:: '/users' => Felhasználó létrehozása
                  paraméterek => "name, email, dateOfBirth, phoneNumbers=>array"
GET:: '/users/{user}' => Visszaadja a felhasználót a hozzá tartozó telefonszámokkal id alapján
    
DELETE:: '/users/{user}/' => felhasználó törlése id alapján

POST:: '/users/{user}/phone-numbers' => Telefonszámok tárolása egy adott User-hez id alapján
                                        paraméterek => "phoneNumbers=>array"
                                        
DELETE:: '/users/{user}/' => telefonszám törlése id alapján

