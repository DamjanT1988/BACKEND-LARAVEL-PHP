# PROJEKT

## DOKUMENTATION AV ARBETSPROCESS BACKEND (LARAVEL; API)
0. Installera Laravel, PHP, Heroku, Composer, Artisan
1. Klona GIT-repo: git clone...

### SKAPA 
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

### TESTA
12. Se API-lyssnande: php artisan route:list
13. Testa API:et i ThunderClient: data ska presenteras i JSON-format

### PUBLICERING 
14. Skapa en Heroku-app: heroku create damjan-moment2
15. Generera APP-nyckel: php artisan key-generate --show
16. Lägg till APP-nyckeln i Heroku: heroku config:set APP_KEY=[nyckel] --app=damjan-moment2
17. Push till Heroku-git: git push https://git.heroku.com/damjan-moment2.git
18. Lägg till JawsSQL för databas på Heroku
19. Lägg till databasinformation från SQL-databasen i Heroku-appen i inställningar
20. Kör konsol på Heroku-webbsida för att migrera databasen till den nya databasen: php artisan migrate
21. Testa API:et på https://damjan-moment2.herokuapp.com/ 