# Barangay Bulletin - Purok Buenviaje
**Lab Activity 10 – Eloquent, Migrations & Seeding**  
*4-334 · Full-Stack Web Development · 1st Semester, July–November 2026*  
*Ateneo de Davao University*

---

## Student & Personalization Details

- **Student Last Name:** Buenviaje
- **Student First Name:** Brian
- **Site Title:** `Barangay Bulletin - Purok Buenviaje`
- **Official Author:** Kagawad Brian Buenviaje (`kagawad.buenviaje@bulletin.test`), created manually with `Author::create()`.
- **Pinned Announcement:** `Purok Buenviaje Clean-up Drive` (Pinned: `true`, Published: `2026-08-15`).
- **Posts Per Page:** `9` (Letters in last name "Buenviaje" = 9 letters).
- **Custom 5th Category:** `Clean-up Drive` (in addition to `Announcement`, `Health`, `Peace & Order`, and `Ayuda`).
- **Birthday Post Date:** `August 15, 2026` (`2026-08-15`).

---

## Features Implemented

1. **Migrations & Schema Design:**
   - `create_authors_table` with `id`, `name`, `position`, `email` (unique), and `timestamps`.
   - `create_posts_table` with foreign key `author_id` referencing authors with cascade on delete, `title`, `category`, `body`, `is_published`, `is_pinned`, `published_at`, and `timestamps`.
   - Reversible alter migration `add_views_to_posts_table` adding `views` column after `body` with down method dropping column `views`.
2. **Eloquent Models & Mass Assignment:**
   - `Author` model with `$fillable = ['name', 'position', 'email']`.
   - `Post` model with explicit `$fillable` attributes and boolean/datetime casting (`is_published`, `is_pinned`, `published_at`).
3. **Factories & Seeders:**
   - `AuthorFactory` with realistic names, barangay positions, and unique safe emails.
   - `PostFactory` supporting the 5 specific categories and a `draft()` state modifier.
   - `AuthorSeeder` seeding Kagawad Brian Buenviaje + 4 factory authors (Total 5 authors).
   - `PostSeeder` seeding 40 published posts, 10 drafts, and 1 pinned clean-up drive announcement for Kagawad Brian Buenviaje (Total 51 posts).
   - `DatabaseSeeder` coordinating author and post seeding.
4. **Query Builder Filters & Pagination:**
   - `/posts` displays only published posts, ordering pinned posts first and latest published date second.
   - Search filter `?q=` matching titles via SQL `LIKE %q%`.
   - Category filter `?category=` filtering strictly by selected category.
   - Preserves query parameters across pagination links using `->withQueryString()`.
   - Displays exact item count range: `Showing x–y of z posts`.
5. **Post View & Counter:**
   - `/posts/{id}` checks publication status, aborting with 404 for drafts or missing posts.
   - Increments post `views` counter on each visit using `$post->save()`.
6. **Tailwind CSS UI (Emerald Theme):**
   - Sleek and clean layout (`layouts/app.blade.php`) styled with Tailwind CSS emerald palette.
   - Responsive card grid with `sm:` and `md:` breakpoints.
   - Escaped Blade output (`{{ }}`) and `@forelse ... @empty` states.
7. **ActiveRecord Verification:**
   - Verified tinker `find() -> change attribute -> save()` session captured in `docs/tinker.png`.

---

## How to Run the Project Locally

Follow these steps to set up and run the application:

```bash
# 1. Clone the repository
git clone https://github.com/your-username/LabActivity10-Buenviaje.git
cd LabActivity10-Buenviaje

# 2. Install PHP dependencies
composer install

# 3. Environment configuration
cp .env.example .env
php artisan key:generate

# 4. Run database migrations and seed demo data
php artisan migrate:fresh --seed

# 5. Install and build frontend assets
npm install
npm run build

# 6. Run the local development server
php artisan serve
```

Access the bulletin board at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Running Automated Tests

Run the PHPUnit feature and unit test suite:

```bash
php artisan test
```

All tests will verify route redirection, published-only visibility, query builder filters, view counter increments, and 404 handling on drafts.
