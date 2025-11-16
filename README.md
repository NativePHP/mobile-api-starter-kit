# Laravel NativePHP Mobile Starter Kit

A complete mobile app starter kit built with Laravel, NativePHP, Livewire, and Tailwind CSS. Features authentication, news feed, and native mobile UI components.

📚 [NativePHP Documentation](https://nativephp.com/docs/mobile/2/getting-started/introduction)

## Features

- 🔐 Complete authentication system with Sanctum API tokens
- 📱 Native mobile UI components (top bar, side navigation)
- 📰 RSS news feed integration with Laravel News
- 🔒 Secure token storage using device Keychain/KeyStore
- 🎨 Beautiful Tailwind CSS styling with dark mode support
- ⚡ Livewire for reactive components
- 🌊 Smooth page transitions
- 📖 In-app browser for external links

## Installation

### Using Laravel Installer

```bash
laravel new my-app --using=nativephp/mobile-api-starter-kit
cd my-app
cp .env.example .env
php artisan native:install
php artisan native:run
```

### Using Herd as a Custom Starter Kit

1. Add this repository as a custom starter kit in Herd
2. Create a new site using the starter kit
3. Run the setup commands:

```bash
cp .env.example .env
php artisan native:install
php artisan native:run
```

## Requirements

- PHP 8.3+
- Laravel 11+
- Node.js & NPM
- Android Studio (for Android development)
- Xcode (for iOS development, macOS only)

## What's Included

- **Authentication Pages**: Login, Register, Profile
- **Home Dashboard**: Welcome page with user info
- **News Feed**: Laravel News RSS reader with images
- **API Integration**: Ready-to-use API client with Sanctum authentication
- **Native Components**: Top bar, side navigation, in-app browser
- **Secure Storage**: Token management with device security

## Development

### Setting Up Your API Server

The mobile app needs to connect to your Laravel API. For local development, you need to expose your local server so the mobile device/simulator can access it.

#### Option 1: Using Laravel Herd (Recommended for macOS)

```bash
# Share your local site
herd share

# Update .env with the provided URL
API_URL=https://ABC123.sharedwithexpose.com
```

#### Option 2: Using ngrok

```bash
# Start local laravel server
php artisan serve

# Start ngrok tunnel
ngrok http 8000

# Update .env with the provided URL
API_URL=https://ABC123.ngrok-free.app
```

### Running the Mobile App

```bash
# Run on iOS simulator (macOS only)
php artisan native:run ios

# Run on Android emulator/device
php artisan native:run android

# Watch for changes (hot reload)
php artisan native:watch ios
php artisan native:watch android
```

## License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
