# Profolio WordPress Theme (Custom Development Project)

A custom WordPress theme built from scratch (based on Underscores starter theme) demonstrating advanced WordPress development skills including Custom Post Types, REST API integration, secure meta handling, and responsive UI.

---

## 🚀 Tech Stack

- WordPress 6.x
- PHP 8.1+
- MySQL 8
- Docker (Local Development Environment)
- Vanilla JavaScript
- CSS Grid/Flexbox

---

## 📦 Project Features

### 🧱 Theme Development
- Built using Underscores (_s) starter theme
- Fully custom WordPress theme structure
- Proper template hierarchy implementation
- Enqueued styles and scripts using best practices

---

### 📁 Custom Post Type (Projects)
- Registered via code (no plugins)
- Supports:
  - Title
  - Editor
  - Featured Image
- Archive and Single templates created

---

### 🧾 Custom Meta Fields
Each Project includes:
- Start Date
- End Date
- Project URL

Implemented using native WordPress meta boxes with:
- Nonce protection
- Capability checks
- Input sanitization
- Secure data storage

---

### 📄 Custom Templates
- `archive-project.php` → Projects listing with filtering
- `single-project.php` → Detailed project view

---

### 🔍 Filtering System
- Date range filtering (Start/End date)
- Built using WP_Query + meta_query
- Supports pagination

---

### 📡 REST API Endpoint

Custom endpoint:

``` GET /wp-json/profolio/v1/projects ```


#### Features:
- Returns structured JSON
- Supports optional filtering
- Optimized WP_Query usage (`fields => ids`)
- Safe output escaping

---

### 📱 Responsive Design
- Mobile-first layout
- CSS Grid-based project listing
- Responsive navigation menu

---

### 🔐 Security Implementation

- Input sanitization:
  - `sanitize_text_field()`
  - `esc_url_raw()`
- Output escaping:
  - `esc_html()`
  - `esc_url()`
- Nonce verification for meta saving
- Capability checks (`current_user_can`)
- Safe REST API responses

---

## 🐳 Local Development Setup (Docker)

### 1. Start containers

```bash
docker compose up -d