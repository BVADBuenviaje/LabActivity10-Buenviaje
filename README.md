# Barangay Bulletin - Purok Buenviaje

Lab Activity 10 – Eloquent, Migrations & Seeding  
Course: 4-334 Full-Stack Web Development  
Student: Brian Buenviaje  

---

## Personalization Details

- **Per-Page Number:** `9` — derived from the 9 letters in the last name "Buenviaje".
- **Custom Category:** `Clean-up Drive` (along with Announcement, Health, Peace & Order, and Ayuda).
- **Birthday Post Date:** `August 15, 2026` (`2026-08-15`) — for the pinned announcement *"Purok Buenviaje Clean-up Drive"* written by Kagawad Brian Buenviaje.

---

## How to Run the Project

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build
php artisan serve
```

Access the bulletin in your browser at `http://127.0.0.1:8000`.

---

## Running Tests

```bash
php artisan test
```
