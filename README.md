# Anime Rate & Roll :D
simplest way to roll and rate random animes from MAL

<br>

> [!NOTE]
>  i use [api.jikan.moe](https://jikan.moe/) in getting anime data :)

### Features
- random rolling of an anime for u to rate:D
- simple 5 star voting for ur favorites
- add comments on how much u like the anime
- see other's rated animes!
- be the first to rate an anime.
- anyone can browse rated animes **NO LOGIN REQUIRED**

<details><summary><h3>database structure </summary>

#### tables
- `users`: stores user credentials and roles.
- `animes`: stores cached anime data from the Jikan API.
- `ratings`: stores scores and comments.

#### eloquent relationships
- **User** `hasMany` **Rating**: users can give many ratings.
- **Anime** `hasMany` **Rating**: animes can have many user ratings.
- **Rating** `belongsTo` **User**: each rating belongs to a user.
- **Rating** `belongsTo` **Anime**: each rating is linked to an anime.
    
</details>

## admin account
```
commander@erwin.com
```
```
shinzousasageyo
```

**admin power:**
- can view a list of all registered users and their activity.
- have the authority to remove users from the system.

<br>

## Installation
- thats it.

```bash
composer setup
```
```bash
php artisan migrate --seed
```
```bash
composer run dev
```
