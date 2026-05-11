# Anime Rate & Roll 🎌

A specialized Laravel application that allows users to discover random animes through a "Roll" mechanic and share their personal ratings and reviews. Built for the WAD 2 Final Project.

## 🚀 Features

- **Random Anime Rolling**: Discover new titles via the Jikan API (MyAnimeList).
- **5-Star Rating System**: Intuitive star-based voting for your favorite (or least favorite) titles.
- **User Reviews**: Share detailed thoughts on every anime you rate.
- **Top Rated Collection**: A curated grid of animes sorted by community average score.
- **Guest Browsing**: Anyone can browse the top-rated animes and roll for discovery.
- **Admin Dashboard**: Specialized management features for system administrators.
- **Responsive Design**: Clean and modern UI built with Tailwind CSS.

## 🛠️ Implemented Concepts (WAD 2 Requirements)

1. **CRUD Operations**: Full management of Anime ratings and reviews.
2. **Authentication**: Secure user registration and login system.
3. **Middleware**: Guest/Auth access control and Admin-only route protection.
4. **Authorization**: Policies and Gates to ensure users only manage their own ratings.
5. **Eloquent Relationships**: Advanced mappings between Users, Animes, and Ratings.

## 📊 Database Schema & Relationships

### Tables
- `users`: Stores user credentials and roles.
- `animes`: Stores cached anime data from the Jikan API.
- `ratings`: Link table storing scores and comments.

### Eloquent Relationships
- **User** `hasMany` **Rating**: A user can provide many ratings.
- **Anime** `hasMany` **Rating**: An anime can have multiple user ratings.
- **Rating** `belongsTo` **User**: Each rating is owned by a specific user.
- **Rating** `belongsTo` **Anime**: Each rating is linked to a specific anime title.

## 🛡️ Admin Access

**Commander Erwin Smith**
- **Email/Username**: `commander-erwin`
- **Password**: `shinzousasageyo`

## 📦 Installation

1. Clone the repository
2. Run `composer install` and `npm install`
3. Configure your `.env` file (Database and App settings)
4. Run `php artisan migrate --seed`
5. Start the server: `php artisan serve`

---
*Built with Laravel 11 and ❤️ by Pair*
