# LFS App

A Laravel + Inertia + Svelte application for the Lichtfarbenspiel website. The project serves a portfolio-style website with static pages, gallery/image handling, and a modern frontend built with Vite and Tailwind.

## Stack

- PHP 8.3
- Laravel 13
- Inertia.js
- Svelte 5
- Vite
- MySQL
- Tailwind CSS

## Features

- Landing page
- Portfolio and about pages
- Imprint and privacy pages
- Gallery/image route handling via Laravel storage controller
- Modern frontend tooling with Vite and Svelte
- Laravel-based auth and session setup ready for extension

## Project structure

- `app/` — Laravel application code and controllers
- `config/` — application configuration
- `database/` — migrations, factories, seeders
- `public/` — public web assets and entrypoint
- `resources/` — Svelte components, CSS, and frontend assets
- `routes/` — HTTP routes
- `tests/` — PHPUnit tests
- `vite.config.ts` — frontend build config
- `composer.json` — PHP dependencies and scripts
- `package.json` — frontend dependencies and scripts

## Requirements

- PHP 8.3+
- Composer
- Node.js 20+
- npm