# 📘 SmartSchool — School Management System (SaaS)

**SmartSchool** is a Laravel-powered, multi-tenant School Management System designed as a SaaS platform. It provides everything schools need to manage timetables, students, staff, attendance, grades, billing, communication, analytics, and more — all from a single unified system.

## 🚀 Features

### 🕒 Timetable / Time Scheduling

-   Automatic timetable generation
-   Conflict detection (teacher, room, subject)
-   Drag-and-drop editor
-   Bell schedules, rotating timetables, term support

### 🎓 Students & Admissions

-   Student profiles, enrollment workflows
-   Document uploads & verification
-   Import/export via CSV/Excel
-   Bulk operations

### 👨‍🏫 Teachers & Staff Management

-   Staff profiles & roles
-   Teacher availability & workload balancing
-   Substitution scheduling

### 📚 Attendance & Academic Management

-   Class and period attendance
-   Gradebook with custom grading scales
-   Exam management
-   Report cards & transcripts

### 🏫 Rooms & Resources

-   Room allocation with capacity rules
-   Equipment/resource tracking
-   Booking & availability calendars

### 💵 Billing & Payments (SaaS)

-   Invoice generation & receipts
-   Tuition plans, fees, discounts
-   Stripe / PayPal integration
-   Automatic plan renewal & subscription management

### 👨‍👩‍👧 Parent & Student Portal

-   View timetable, grades, attendance
-   Download documents & report cards
-   Messaging & announcements

### 📊 Analytics & Dashboard

-   Attendance trends
-   Teacher/room utilization
-   Revenue reports
-   System health & KPIs

### 🔐 Security & Access Control

-   Role-Based Access Control (RBAC)
-   Audit logs
-   Per-tenant data isolation
-   GDPR-friendly data export/deletion

## 🧱 Multi-Tenancy (SaaS)

SmartSchool supports a **multi-tenant architecture**:

-   **Database-per-tenant** or **single-db with tenant_id** (configurable)
-   Automatic tenant provisioning
-   Subdomain routing:  
    `schoolname.yourdomain.com`
-   Billing tied to tenants
-   Isolated data & logs per tenant

## 🛠 Tech Stack

| Layer         | Technology                    |
| ------------- | ----------------------------- |
| Backend       | Laravel 10+, PHP 8.2+         |
| Frontend      | Blade + Vue                   |
| Database      | MySQL                         |
| Cache / Queue | Redis + Laravel Horizon       |
| Storage       | AWS S3 / DO Spaces            |
| Payments      | Stripe / PayPal               |
| Deployment    | Docker, GitHub Actions, CI/CD |
| Monitoring    | Sentry / Grafana              |

## 📦 Getting Started (Development)

### 1. Clone the repository

```bash
git clone https://github.com/CommitPenguin/smart-school.git
cd smart-school
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment

```bash
cp .env.example .env
```

Update `.env` with database, mail, Redis, and Stripe keys.

### 4. Generate app key

```bash
php artisan key:generate
```

### 5. Run migrations & seeders

```bash
php artisan migrate --seed
```

### 6. Start the development server

Using Laravel Sail:

```bash
./vendor/bin/sail up -d
```

Or PHP server:

```bash
php artisan serve
```

### 7. Start frontend

```bash
npm run dev
```

## 🚢 Deployment

SmartSchool can be deployed on:

-   AWS ECS / EC2
-   DigitalOcean App Platform
-   Heroku alternatives (Fly.io, Render)
-   Kubernetes (K8s)
-   Docker Swarm

### Deployment best practices

-   Use environment variables for secrets
-   Use managed MySQL/Redis services
-   Configure CI/CD for automated testing and deployments
-   Enable backups and point-in-time recovery

## 🔒 Security

-   HTTPS everywhere
-   Strong password + optional 2FA
-   Role-based permissions
-   Activity logs & audit trails
-   Regular security updates & Laravel patching

## 🤝 Contributing

We welcome contributions!

1. Fork the repository
2. Create a feature branch
3. Commit changes following PSR-12
4. Submit a Pull Request

Please include tests where applicable.

## 📄 License

This project is licensed under the **MIT License** (or your preferred license).
