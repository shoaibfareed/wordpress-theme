# Profolio WordPress Theme (Custom Development Project)

A custom WordPress theme built from scratch demonstrating advanced WordPress development skills including Custom Post Types, REST API integration, secure meta handling, and responsive UI.

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
- Built Wordpress theme from scratch
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
- Project Description

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

### 🔍 Custom Templates
- Home Page Template
- Blog Page Template
- Default front-page Template
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

### What i used to build

## Custom
- Custom Coding and logic building for the theme structure
- Registering CPT and Meta Inforamtion and saving Data
- Templates Creation and Listing and Detail Pages
- Rest Api creation and response design
- Language Setup

## Help from external Resource

I only Used the ChatGpt for some errors resolution
- Language File Structure .mo and .po as i was using portfolio-theme-fr_FR.mo and portfolio-theme-fr_FR.po
- There was issue with Filteration and then took the help to pre_get_posts for the filter in function.php


## 🐳 Local Development Setup (Docker)

### 1. Start containers

```bash
docker compose up -d
