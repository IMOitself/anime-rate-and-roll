# Anime Rate & Roll :D
simplest way to roll and rate random animes from MAL

<br><br>
> [!NOTE]
>  i use [api.jikan.moe](https://jikan.moe/) in getting anime data :)

### Features
- **Random Anime Rolling**: discover new titles through a "Roll" mechanic!
- **5-Star Rating System**: simple star-based voting for your favorites :D
- **User Reviews**: share your thoughts on every anime you rate.
- **Top Rated Grid**: see what the community loves, sorted by top ratings.
- **Guest Access**: anyone can browse and roll even without logging in!
- **Admin Access**: special features for the commander.

<details><summary><h3>database tables & eloquent relationships </summary>

#### Tables
- `users`: stores user credentials and roles.
- `animes`: stores cached anime data from the Jikan API.
- `ratings`: stores scores and comments.

#### Eloquent Relationships
- **User** `hasMany` **Rating**: users can give many ratings :)
- **Anime** `hasMany` **Rating**: animes can have many user ratings.
- **Rating** `belongsTo` **User**: each rating belongs to a user.
- **Rating** `belongsTo` **Anime**: each rating is linked to an anime.
    
</details>

<details><summary><h3>implemented concepts (WAD 2) </summary>

1. **CRUD Operations**: full management of anime ratings and reviews.
2. **Authentication**: secure registration and login system.
3. **Middleware**: guest/auth access control and admin-only routes.
4. **Authorization**: policies and gates for proper ownership.
5. **Eloquent Relationships**: proper mappings between models.

</details>

<br>

## Admin Access 🛡️
**Commander Erwin Smith**
- **Email/Username**: `commander-erwin`
- **Password**: `shinzousasageyo`

<br>

## Installation
- must have php and composer
- configure your `.env` file (Database and App settings)

```bash
composer install
npm install
```
```bash
php artisan migrate --seed
```
```bash
php artisan serve
```
