# PROJEKT

## DOKUMENTATION AV ARBETSPROCESS BACKEND (LARAVEL; API)
0. Installera Laravel, PHP, Heroku, Composer, Artisan
1. Klona GIT-repo: git clone...

### SKAPA API
2. Skapa Laravelprojekt i repo: laravel new Gamesapi
3. Skapa server: php artisan serve
4. Skapa en databas i MySQL via PHPMyAdmin: gamesapi
5. Uppdatera .env-fil med databasinställningar
6. Skapa model med migration: php artisan make:model Gameslibrary --migration
7. Lägg till i databasmigrationsfiler: alla $tables med fält
8. Lägg till i model GamesLibrary: $tabel & $fillable
9. Migrera till databas: php artisan migrate
10. Skapa en controller: php artisan make:controller GamesController --api
11. Koda CRUD i kontroller mot model

### SKAPA REGISTRATION/LOGIN
12. Lägg till "->middleware('auth:sanctum')" i api.php - routes
13. Skapa ny controller: php artisan make:controller authcontroller
14. Lägg till Use-länkar i authcontroller
15. Koda i authcontroller: skapa REGISTRATION-funktion
16. Skapa route för REGISTRATION
17. Testa REGISTRATION-funktion (testa auth => bearer med token)
18. Skapa LOGIN-funktion
19. Skapa route för LOGIN¨
20. Testa LOGIN-funktion
21. Skapa LOGOUT-funktion
22. Testa LOGOUT-funktion (med token i bearer)

### TESTA
23. Se API-lyssnande: php artisan route:list
24. Testa API:et i ThunderClient: data ska presenteras i JSON-format

### PUBLICERING 
25. Skapa en Heroku-app: heroku create lagerapi
26. Skapa en Procfile: klistrna in "web: vendor/bin/heroku-php-apache2 public/"
27. Generera APP-nyckel: php artisan key:generate --show
28. Lägg till APP-nyckeln i Heroku i terminal: heroku config:set APP_KEY=[nyckel] --app=lagerapi
29. Push till Heroku-git: git push https://git.heroku.com/produktlagerapi.git
30. Lägg till JawsSQL för databas på Heroku
31. Lägg till databasinformation från SQL-databasen i Heroku-appen i inställningar:
APP_KEY, APP_DEBUG, DB_... CONNECTION, DATABASE, HOST, PASSWORD, PORT, USERNAME, JAWSSDB_URL
32. Kör konsol på Heroku-webbsida för att migrera databasen till den nya databasen: php artisan migrate.
33. Testa API:et på https://produktlagerapi.herokuapp.com/

## ANVÄND HEROKU-APP/-API
CRUD-funktionalitet: 
Lokal: http://127.0.0.1:8000/api/lager
Publik: https://produktlagerapi.herokuapp.com/api/lager
Registrera: https://produktlagerapi.herokuapp.com/api/register
Logga in: https://produktlagerapi.herokuapp.com/api/login
Logga ut: https://produktlagerapi.herokuapp.com/api/logout

### LÄGG TILL  
Behöver en token i bearer.
{
  "product_title": "",
  "product_description": "",
  "price": X,
  "amount_storage": X,
  "expiration_date": "",
  "image_file_path": "",
  "image_alt": ""
}

### INLOGG/REGISTRERA
Namn behövs inte.
{
  "name" : "",
  "email" : "",
  "password" : ""
}