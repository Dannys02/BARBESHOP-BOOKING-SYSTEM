# Heritage Grooming: Barbershop Booking & Queue Management System

[![English](https://img.shields.io/badge/Language-English-amber?style=for-the-badge)](./README.md)
[![Bahasa Indonesia](https://img.shields.io/badge/Bahasa-Indonesia-0f172a?style=for-the-badge)](./README.id.md)

> **Baca dokumentasi dalam Bahasa Indonesia:** [README.id.md](./README.id.md)

A web-based barbershop seat reservation and queue management application built with **Laravel 12** and **Tailwind CSS**. It replaces manual walk-in queues and unorganized chat bookings with a structured, conflict-free scheduling system integrated with one-click WhatsApp confirmations.

---

## Problem Statement & Solution

Many barbershops still rely on walk-in queues or manual WhatsApp chats to record appointments. This approach frequently leads to three operational bottlenecks:
1. **Unpredictable Customer Wait Times:** Customers arrive without knowing whether their preferred barber is available or fully booked.
2. **Double-Booking Conflicts:** Two customers often request the same barber and time slot via chat before an admin can manually cross-check the schedule.
3. **Spam & Duplicate Reservations:** Unverified bookings can lock up prime operating hours and disrupt daily shop operations.

**Heritage Grooming** solves these issues through a centralized booking workflow:
- Customers can browse service catalogs, transparent pricing, estimated durations, and barber profiles before reserving a seat.
- The system enforces **strict conflict prevention**: it blocks overlapping bookings for the same barber, date, and hour, prevents selecting past hours on same-day bookings, and restricts each phone number to one active reservation at a time.
- Customers can track their booking status (`Pending`, `Confirmed`, `Completed`, `Cancelled`) anytime using their WhatsApp number without creating an account.
- Admins manage the entire queue from a dedicated sidebar dashboard and send pre-filled WhatsApp confirmation or cancellation messages with a single click.

---

## Key Features

### 1. Customer Portal (Account-Free Experience)
- **Service & Barber Catalog:** Displays services with pricing, duration in minutes, haircut portfolio gallery, and barber profiles.
- **Conflict-Free Seat Reservation:** Interactive booking form with real-time validation against double-booking, past-hour selection on the current day, and duplicate active reservations per phone number.
- **Self-Service Status Tracker:** Customers can check their latest appointment status at `/cek-status` simply by entering their WhatsApp number.
- **Public Endpoint Security:** Protected by Google reCAPTCHA v2 and route rate limiting (`throttle`) to prevent bot spam and phone number enumeration.

### 2. Admin Operations Dashboard
- **Overview & Activity Log:** Tracks total barbers, active services, reservation counts, and a chronological audit log of admin actions.
- **Queue Management & WhatsApp Integration:** Update appointment statuses (`Pending` -> `Konfirmasi` -> `Selesai` / `Batal`) and generate instant WhatsApp chat links pre-populated with customer appointment details.
- **Master Data Management (CRUD):**
  - **Barbers:** Create, view, update, and delete barber profiles with photo uploads.
  - **Services:** Manage service names, prices, and durations.
  - **Portfolio Gallery:** Upload and manage haircut showcase photos (capped at 5 featured photos to keep landing page performance fast).
- **Account & Access Security:** Admin profile and password management, disabled public user registration, and a custom obscured admin login URL (`/panel-rahasia-barbershop/login/masuk`).

---

## Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Backend Framework** | Laravel 12 (PHP 8.2+) |
| **Frontend & Templating** | Blade Templates, Tailwind CSS, Vite |
| **Database** | MySQL / SQLite |
| **Security & Protection** | Laravel Breeze Auth, Google reCAPTCHA (`anhskohbo/no-captcha`), Route Rate Limiting |

---

## Local Setup & Installation

### Prerequisites
Make sure you have the following installed on your machine:
- **PHP** >= 8.2
- **Composer**
- **Node.js & NPM**
- **MySQL** (or SQLite)

### Step-by-Step Installation

1. **Clone the repository and navigate into the project directory**
   ```bash
   git clone <your-repository-url>
   cd BARBESHOP-BOOKING-SYSTEM
   ```

2. **Install PHP and JavaScript dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Copy the environment configuration file and generate the application key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database & Google reCAPTCHA in `.env`**
   Update your database credentials in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=barbeshop_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   For local testing of Google reCAPTCHA v2, add Google's official test keys to your `.env` file:
   ```env
   NOCAPTCHA_SITEKEY=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
   NOCAPTCHA_SECRET=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe
   ```

5. **Run database migrations and seed initial sample data**
   ```bash
   php artisan migrate --seed
   ```

6. **Create the storage symlink and build frontend assets**
   ```bash
   php artisan storage:link
   npm run build
   ```

7. **Start the local development server**
   ```bash
   php artisan serve
   ```

---

## How to Test the Application (Demo Flow)

Once the server is running at `http://127.0.0.1:8000`, you can test both the customer and admin workflows:

### A. Testing as a Customer
1. Open the **Landing Page**: `http://127.0.0.1:8000`
2. Click **Reservasi** in the top navigation bar or visit `http://127.0.0.1:8000/booking/create`.
3. Fill in your name, WhatsApp number (e.g., `081234567890`), preferred barber, service, date, and arrival time, then submit the form.
4. Visit the **Status Tracker**: `http://127.0.0.1:8000/cek-status` and enter `081234567890` to inspect your reservation status.

### B. Testing as an Admin
1. Open the **Admin Login URL**:
   ```text
   http://127.0.0.1:8000/panel-rahasia-barbershop/login/masuk
   ```
2. Sign in using the default seeded credentials:
   - **Email:** `admin@barbershop.com`
   - **Password:** `password`
3. Navigate to **Jadwal Reservasi** (`/admin/booking`), update a customer's booking status to **Konfirmasi**, and click the WhatsApp button to test the automated confirmation message generator.

---

## Author

Developed by **Dannys Martha Favrillia** as a Software Engineering (RPL) project and full-stack Laravel web development portfolio.
