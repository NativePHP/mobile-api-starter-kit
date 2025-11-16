<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.3.26
- laravel/fortify (FORTIFY) - v1
- laravel/framework (LARAVEL) - v12
- laravel/prompts (PROMPTS) - v0
- livewire/flux (FLUXUI_FREE) - v2
- livewire/livewire (LIVEWIRE) - v3
- livewire/volt (VOLT) - v1
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- pestphp/pest (PEST) - v4
- phpunit/phpunit (PHPUNIT) - v12
- tailwindcss (TAILWINDCSS) - v4

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure - don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.


=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double check the available parameters.

## URLs
- Whenever you share a project URL with the user you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain / IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation specific for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The 'search-docs' tool is perfect for all Laravel related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel-ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries - package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit"
3. Quoted Phrases (Exact Position) - query="infinite scroll" - Words must be adjacent and in that order
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit"
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms


=== php rules ===

## PHP

- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over comments. Never use comments within the code itself unless there is something _very_ complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.


=== laravel/core rules ===

## Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using the `list-artisan-commands` tool.
- If you're creating a generic PHP class, use `artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Database
- Always use proper Eloquent relationship methods with return type hints. Prefer relationship methods over raw queries or manual joins.
- Use Eloquent models and relationships before suggesting raw database queries
- Avoid `DB::`; prefer `Model::query()`. Generate code that leverages Laravel's ORM capabilities rather than bypassing them.
- Generate code that prevents N+1 query problems by using eager loading.
- Use Laravel's query builder for very complex database operations.

### Model Creation
- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `list-artisan-commands` to check the available options to `php artisan make:model`.

### APIs & Eloquent Resources
- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

### Controllers & Validation
- Always create Form Request classes for validation rather than inline validation in controllers. Include both validation rules and custom error messages.
- Check sibling Form Requests to see if the application uses array or string based validation rules.

### Queues
- Use queued jobs for time-consuming operations with the `ShouldQueue` interface.

### Authentication & Authorization
- Use Laravel's built-in authentication and authorization features (gates, policies, Sanctum, etc.).

### URL Generation
- When generating links to other pages, prefer named routes and the `route()` function.

### Configuration
- Use environment variables only in configuration files - never use the `env()` function directly outside of config files. Always use `config('app.name')`, not `env('APP_NAME')`.

### Testing
- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] <name>` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

### Vite Error
- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.


=== laravel/v12 rules ===

## Laravel 12

- Use the `search-docs` tool to get version specific documentation.
- Since Laravel 11, Laravel has a new streamlined file structure which this project uses.

### Laravel 12 Structure
- No middleware files in `app/Http/Middleware/`.
- `bootstrap/app.php` is the file to register middleware, exceptions, and routing files.
- `bootstrap/providers.php` contains application specific service providers.
- **No app\Console\Kernel.php** - use `bootstrap/app.php` or `routes/console.php` for console configuration.
- **Commands auto-register** - files in `app/Console/Commands/` are automatically available and do not require manual registration.

### Database
- When modifying a column, the migration must include all of the attributes that were previously defined on the column. Otherwise, they will be dropped and lost.
- Laravel 11 allows limiting eagerly loaded records natively, without external packages: `$query->latest()->limit(10);`.

### Models
- Casts can and likely should be set in a `casts()` method on a model rather than the `$casts` property. Follow existing conventions from other models.


=== fluxui-free/core rules ===

## Flux UI Free

- This project is using the free edition of Flux UI. It has full access to the free components and variants, but does not have access to the Pro components.
- Flux UI is a component library for Livewire. Flux is a robust, hand-crafted, UI component library for your Livewire applications. It's built using Tailwind CSS and provides a set of components that are easy to use and customize.
- You should use Flux UI components when available.
- Fallback to standard Blade components if Flux is unavailable.
- If available, use Laravel Boost's `search-docs` tool to get the exact documentation and code snippets available for this project.
- Flux UI components look like this:

<code-snippet name="Flux UI Component Usage Example" lang="blade">
    <flux:button variant="primary"/>
</code-snippet>


### Available Components
This is correct as of Boost installation, but there may be additional components within the codebase.

<available-flux-components>
avatar, badge, brand, breadcrumbs, button, callout, checkbox, dropdown, field, heading, icon, input, modal, navbar, profile, radio, select, separator, switch, text, textarea, tooltip
</available-flux-components>


=== livewire/core rules ===

## Livewire Core
- Use the `search-docs` tool to find exact version specific documentation for how to write Livewire & Livewire tests.
- Use the `php artisan make:livewire [Posts\\CreatePost]` artisan command to create new components
- State should live on the server, with the UI reflecting it.
- All Livewire requests hit the Laravel backend, they're like regular HTTP requests. Always validate form data, and run authorization checks in Livewire actions.

## Livewire Best Practices
- Livewire components require a single root element.
- Use `wire:loading` and `wire:dirty` for delightful loading states.
- Add `wire:key` in loops:

    ```blade
    @foreach ($items as $item)
        <div wire:key="item-{{ $item->id }}">
            {{ $item->name }}
        </div>
    @endforeach
    ```

- Prefer lifecycle hooks like `mount()`, `updatedFoo()` for initialization and reactive side effects:

<code-snippet name="Lifecycle hook examples" lang="php">
    public function mount(User $user) { $this->user = $user; }
    public function updatedSearch() { $this->resetPage(); }
</code-snippet>


## Testing Livewire

<code-snippet name="Example Livewire component test" lang="php">
    Livewire::test(Counter::class)
        ->assertSet('count', 0)
        ->call('increment')
        ->assertSet('count', 1)
        ->assertSee(1)
        ->assertStatus(200);
</code-snippet>


    <code-snippet name="Testing a Livewire component exists within a page" lang="php">
        $this->get('/posts/create')
        ->assertSeeLivewire(CreatePost::class);
    </code-snippet>


=== livewire/v3 rules ===

## Livewire 3

### Key Changes From Livewire 2
- These things changed in Livewire 2, but may not have been updated in this application. Verify this application's setup to ensure you conform with application conventions.
    - Use `wire:model.live` for real-time updates, `wire:model` is now deferred by default.
    - Components now use the `App\Livewire` namespace (not `App\Http\Livewire`).
    - Use `$this->dispatch()` to dispatch events (not `emit` or `dispatchBrowserEvent`).
    - Use the `components.layouts.app` view as the typical layout path (not `layouts.app`).

### New Directives
- `wire:show`, `wire:transition`, `wire:cloak`, `wire:offline`, `wire:target` are available for use. Use the documentation to find usage examples.

### Alpine
- Alpine is now included with Livewire, don't manually include Alpine.js.
- Plugins included with Alpine: persist, intersect, collapse, and focus.

### Lifecycle Hooks
- You can listen for `livewire:init` to hook into Livewire initialization, and `fail.status === 419` for the page expiring:

<code-snippet name="livewire:load example" lang="js">
document.addEventListener('livewire:init', function () {
    Livewire.hook('request', ({ fail }) => {
        if (fail && fail.status === 419) {
            alert('Your session expired');
        }
    });

    Livewire.hook('message.failed', (message, component) => {
        console.error(message);
    });
});
</code-snippet>


=== volt/core rules ===

## Livewire Volt

- This project uses Livewire Volt for interactivity within its pages. New pages requiring interactivity must also use Livewire Volt. There is documentation available for it.
- Make new Volt components using `php artisan make:volt [name] [--test] [--pest]`
- Volt is a **class-based** and **functional** API for Livewire that supports single-file components, allowing a component's PHP logic and Blade templates to co-exist in the same file
- Livewire Volt allows PHP logic and Blade templates in one file. Components use the `@volt` directive.
- You must check existing Volt components to determine if they're functional or class based. If you can't detect that, ask the user which they prefer before writing a Volt component.

### Volt Functional Component Example

<code-snippet name="Volt Functional Component Example" lang="php">
@volt
<?php
use function Livewire\Volt\{state, computed};

state(['count' => 0]);

$increment = fn () => $this->count++;
$decrement = fn () => $this->count--;

$double = computed(fn () => $this->count * 2);
?>

<div>
    <h1>Count: {{ $count }}</h1>
    <h2>Double: {{ $this->double }}</h2>
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
</div>
@endvolt
</code-snippet>


### Volt Class Based Component Example
To get started, define an anonymous class that extends Livewire\Volt\Component. Within the class, you may utilize all of the features of Livewire using traditional Livewire syntax:


<code-snippet name="Volt Class-based Volt Component Example" lang="php">
use Livewire\Volt\Component;

new class extends Component {
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
} ?>

<div>
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>
</code-snippet>


### Testing Volt & Volt Components
- Use the existing directory for tests if it already exists. Otherwise, fallback to `tests/Feature/Volt`.

<code-snippet name="Livewire Test Example" lang="php">
use Livewire\Volt\Volt;

test('counter increments', function () {
    Volt::test('counter')
        ->assertSee('Count: 0')
        ->call('increment')
        ->assertSee('Count: 1');
});
</code-snippet>


<code-snippet name="Volt Component Test Using Pest" lang="php">
declare(strict_types=1);

use App\Models\{User, Product};
use Livewire\Volt\Volt;

test('product form creates product', function () {
    $user = User::factory()->create();

    Volt::test('pages.products.create')
        ->actingAs($user)
        ->set('form.name', 'Test Product')
        ->set('form.description', 'Test Description')
        ->set('form.price', 99.99)
        ->call('create')
        ->assertHasNoErrors();

    expect(Product::where('name', 'Test Product')->exists())->toBeTrue();
});
</code-snippet>


### Common Patterns


<code-snippet name="CRUD With Volt" lang="php">
<?php

use App\Models\Product;
use function Livewire\Volt\{state, computed};

state(['editing' => null, 'search' => '']);

$products = computed(fn() => Product::when($this->search,
    fn($q) => $q->where('name', 'like', "%{$this->search}%")
)->get());

$edit = fn(Product $product) => $this->editing = $product->id;
$delete = fn(Product $product) => $product->delete();

?>

<!-- HTML / UI Here -->
</code-snippet>

<code-snippet name="Real-Time Search With Volt" lang="php">
    <flux:input
        wire:model.live.debounce.300ms="search"
        placeholder="Search..."
    />
</code-snippet>

<code-snippet name="Loading States With Volt" lang="php">
    <flux:button wire:click="save" wire:loading.attr="disabled">
        <span wire:loading.remove>Save</span>
        <span wire:loading>Saving...</span>
    </flux:button>
</code-snippet>


=== pint/core rules ===

## Laravel Pint Code Formatter

- You must run `vendor/bin/pint --dirty` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test`, simply run `vendor/bin/pint` to fix any formatting issues.


=== pest/core rules ===

## Pest

### Testing
- If you need to verify a feature is working, write or update a Unit / Feature test.

### Pest Tests
- All tests must be written using Pest. Use `php artisan make:test --pest <name>`.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files - these are core to the application.
- Tests should test all of the happy paths, failure paths, and weird paths.
- Tests live in the `tests/Feature` and `tests/Unit` directories.
- Pest tests look and behave like this:
<code-snippet name="Basic Pest Test Example" lang="php">
it('is true', function () {
    expect(true)->toBeTrue();
});
</code-snippet>

### Running Tests
- Run the minimal number of tests using an appropriate filter before finalizing code edits.
- To run all tests: `php artisan test`.
- To run all tests in a file: `php artisan test tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --filter=testName` (recommended after making a change to a related file).
- When the tests relating to your changes are passing, ask the user if they would like to run the entire test suite to ensure everything is still passing.

### Pest Assertions
- When asserting status codes on a response, use the specific method like `assertForbidden` and `assertNotFound` instead of using `assertStatus(403)` or similar, e.g.:
<code-snippet name="Pest Example Asserting postJson Response" lang="php">
it('returns all', function () {
    $response = $this->postJson('/api/docs', []);

    $response->assertSuccessful();
});
</code-snippet>

### Mocking
- Mocking can be very helpful when appropriate.
- When mocking, you can use the `Pest\Laravel\mock` Pest function, but always import it via `use function Pest\Laravel\mock;` before using it. Alternatively, you can use `$this->mock()` if existing tests do.
- You can also create partial mocks using the same import or self method.

### Datasets
- Use datasets in Pest to simplify tests which have a lot of duplicated data. This is often the case when testing validation rules, so consider going with this solution when writing tests for validation rules.

<code-snippet name="Pest Dataset Example" lang="php">
it('has emails', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with([
    'james' => 'james@laravel.com',
    'taylor' => 'taylor@laravel.com',
]);
</code-snippet>


=== pest/v4 rules ===

## Pest 4

- Pest v4 is a huge upgrade to Pest and offers: browser testing, smoke testing, visual regression testing, test sharding, and faster type coverage.
- Browser testing is incredibly powerful and useful for this project.
- Browser tests should live in `tests/Browser/`.
- Use the `search-docs` tool for detailed guidance on utilizing these features.

### Browser Testing
- You can use Laravel features like `Event::fake()`, `assertAuthenticated()`, and model factories within Pest v4 browser tests, as well as `RefreshDatabase` (when needed) to ensure a clean state for each test.
- Interact with the page (click, type, scroll, select, submit, drag-and-drop, touch gestures, etc.) when appropriate to complete the test.
- If requested, test on multiple browsers (Chrome, Firefox, Safari).
- If requested, test on different devices and viewports (like iPhone 14 Pro, tablets, or custom breakpoints).
- Switch color schemes (light/dark mode) when appropriate.
- Take screenshots or pause tests for debugging when appropriate.

### Example Tests

<code-snippet name="Pest Browser Test Example" lang="php">
it('may reset the password', function () {
    Notification::fake();

    $this->actingAs(User::factory()->create());

    $page = visit('/sign-in'); // Visit on a real browser...

    $page->assertSee('Sign In')
        ->assertNoJavascriptErrors() // or ->assertNoConsoleLogs()
        ->click('Forgot Password?')
        ->fill('email', 'nuno@laravel.com')
        ->click('Send Reset Link')
        ->assertSee('We have emailed your password reset link!')

    Notification::assertSent(ResetPassword::class);
});
</code-snippet>

<code-snippet name="Pest Smoke Testing Example" lang="php">
$pages = visit(['/', '/about', '/contact']);

$pages->assertNoJavascriptErrors()->assertNoConsoleLogs();
</code-snippet>


=== tailwindcss/core rules ===

## Tailwind Core

- Use Tailwind CSS classes to style HTML, check and use existing tailwind conventions within the project before writing your own.
- Offer to extract repeated patterns into components that match the project's conventions (i.e. Blade, JSX, Vue, etc..)
- Think through class placement, order, priority, and defaults - remove redundant classes, add classes to parent or child carefully to limit repetition, group elements logically
- You can use the `search-docs` tool to get exact examples from the official documentation when needed.

### Spacing
- When listing items, use gap utilities for spacing, don't use margins.

    <code-snippet name="Valid Flex Gap Spacing Example" lang="html">
        <div class="flex gap-8">
            <div>Superior</div>
            <div>Michigan</div>
            <div>Erie</div>
        </div>
    </code-snippet>


### Dark Mode
- If existing pages and components support dark mode, new pages and components must support dark mode in a similar way, typically using `dark:`.


=== tailwindcss/v4 rules ===

## Tailwind 4

- Always use Tailwind CSS v4 - do not use the deprecated utilities.
- `corePlugins` is not supported in Tailwind v4.
- In Tailwind v4, configuration is CSS-first using the `@theme` directive — no separate `tailwind.config.js` file is needed.
<code-snippet name="Extending Theme in CSS" lang="css">
@theme {
  --color-brand: oklch(0.72 0.11 178);
}
</code-snippet>

- In Tailwind v4, you import Tailwind using a regular CSS `@import` statement, not using the `@tailwind` directives used in v3:

<code-snippet name="Tailwind v4 Import Tailwind Diff" lang="diff">
   - @tailwind base;
   - @tailwind components;
   - @tailwind utilities;
   + @import "tailwindcss";
</code-snippet>


### Replaced Utilities
- Tailwind v4 removed deprecated utilities. Do not use the deprecated option - use the replacement.
- Opacity values are still numeric.

| Deprecated |	Replacement |
|------------+--------------|
| bg-opacity-* | bg-black/* |
| text-opacity-* | text-black/* |
| border-opacity-* | border-black/* |
| divide-opacity-* | divide-black/* |
| ring-opacity-* | ring-black/* |
| placeholder-opacity-* | placeholder-black/* |
| flex-shrink-* | shrink-* |
| flex-grow-* | grow-* |
| overflow-ellipsis | text-ellipsis |
| decoration-slice | box-decoration-slice |
| decoration-clone | box-decoration-clone |


=== tests rules ===

## Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test` with a specific filename or filter.


=== laravel/fortify rules ===

## Laravel Fortify

Fortify is a headless authentication backend that provides authentication routes and controllers for Laravel applications.

**Before implementing any authentication features, use the `search-docs` tool to get the latest docs for that specific feature.**

### Configuration & Setup
- Check `config/fortify.php` to see what's enabled. Use `search-docs` for detailed information on specific features.
- Enable features by adding them to the `'features' => []` array: `Features::registration()`, `Features::resetPasswords()`, etc.
- To see the all Fortify registered routes, use the `list-routes` tool with the `only_vendor: true` and `action: "Fortify"` parameters.
- Fortify includes view routes by default (login, register). Set `'views' => false` in the configuration file to disable them if you're handling views yourself.

### Customization
- Views can be customized in `FortifyServiceProvider`'s `boot()` method using `Fortify::loginView()`, `Fortify::registerView()`, etc.
- Customize authentication logic with `Fortify::authenticateUsing()` for custom user retrieval / validation.
- Actions in `app/Actions/Fortify/` handle business logic (user creation, password reset, etc.). They're fully customizable, so you can modify them to change feature behavior.

## Available Features
- `Features::registration()` for user registration.
- `Features::emailVerification()` to verify new user emails.
- `Features::twoFactorAuthentication()` for 2FA with QR codes and recovery codes.
  - Add options: `['confirmPassword' => true, 'confirm' => true]` to require password confirmation and OTP confirmation before enabling 2FA.
- `Features::updateProfileInformation()` to let users update their profile.
- `Features::updatePasswords()` to let users change their passwords.
- `Features::resetPasswords()` for password reset via email.


=== nativephp/mobile rules ===

## NativePHP Mobile

This package enables Laravel developers to build native iOS and Android applications using PHP, Livewire, and native UI components.

### Core Concepts

- **EDGE (Element Definition and Generation Engine)**: Render native UI components from Blade templates instead of WebViews
- **Bridge Functions**: Call native device features from PHP using Facades
- **Event System**: Native events (camera, location, etc.) dispatch to Livewire components via JavaScript injection
- **PHP Binaries**: Downloaded during installation, containing all function definitions for iOS/Android

### Configuration

Set your app identifier and version in .env (required):


<code-snippet name="Configure App Settings" lang="bash">
NATIVEPHP_APP_ID=com.yourcompany.yourapp
NATIVEPHP_APP_VERSION=DEBUG
</code-snippet>


**Important:** `NATIVEPHP_APP_VERSION` should be set to `DEBUG` during development. For production builds, change it to a version number like `1.0.0`.

The config file is published at config/nativephp.php with settings for app name, version, permissions, and more.

### Installation

After installing the package via Composer, run the install command:


<code-snippet name="Install NativePHP Mobile" lang="bash">
# Install for both platforms (macOS only)
php artisan native:install

# Install for specific platform
php artisan native:install android
php artisan native:install ios

# Options
php artisan native:install --force          # Overwrite existing files
php artisan native:install --with-icu       # Include ICU support for Android (~30MB)
php artisan native:install --skip-php       # Skip PHP binary download
</code-snippet>


**IMPORTANT Troubleshooting Checklist:**

When users report errors with `native:run`, `native:watch`, or other commands, verify the following in order:

1. **Check if `nativephp` directory exists** - If missing, they need to run `php artisan native:install` first
2. **Verify NATIVEPHP_APP_ID is set** - Must be in `.env` file (e.g., `NATIVEPHP_APP_ID=com.example.myapp`)
3. **Verify NATIVEPHP_APP_VERSION is set** - Must be in `.env` file (should be `NATIVEPHP_APP_VERSION=DEBUG` for development, or a version number like `1.0.0` for production)

These are the most common issues when helping users troubleshoot.

### Development Commands


<code-snippet name="Run and Build Commands" lang="bash">
# Run the app on a device/simulator
php artisan native:run                      # Interactive platform selection
php artisan native:run android              # Run on Android
php artisan native:run ios                  # Run on iOS
php artisan native:run --build=debug        # Debug build (default)
php artisan native:run --build=release      # Release build
php artisan native:run --watch              # Enable hot reloading

# Open native IDE
php artisan native:open                     # Interactive IDE selection
php artisan native:open android             # Open Android Studio
php artisan native:open ios                 # Open Xcode

# Watch for file changes (hot reload)
php artisan native:watch ios                # Watch iOS simulator
php artisan native:watch android            # Watch Android device

# Tail Laravel logs from device
php artisan native:tail                     # Tail Android logs
</code-snippet>


#### Advanced Android Debugging

For deeper debugging on Android, you can access logs directly using ADB:


<code-snippet name="Access Laravel Logs via ADB" lang="bash">
# Access the app's file system (replace with your package name)
adb shell
run-as com.yourcompany.yourapp

# Navigate to Laravel logs
cd app_storage/persisted_data/storage/logs
cat laravel.log
</code-snippet>

<code-snippet name="Capture System Logs with Logcat" lang="bash">
# Save logcat output to file in current directory
adb logcat > logcat.txt

# Filter for specific package
adb logcat | grep com.yourcompany.yourapp

# Clear logs and start fresh
adb logcat -c
adb logcat > logcat.txt
</code-snippet>


**Note:** Laravel logs are located at `app_storage/persisted_data/storage/logs/laravel.log` within the app's sandboxed filesystem.

### Production Packaging


<code-snippet name="Package for Distribution" lang="bash">
# Android - Create signed APK/AAB
php artisan native:package android \
  --build-type=bundle \
  --keystore=/path/to/keystore.jks \
  --keystore-password=yourpass \
  --key-alias=youralias \
  --key-password=keypass

# Android - Upload to Play Store
php artisan native:package android \
  --build-type=bundle \
  --upload-to-play-store \
  --play-store-track=internal \
  --google-service-key=/path/to/service-account.json

# iOS - Archive and export
php artisan native:package ios \
  --export-method=app-store \
  --team-id=YOURTEAMID

# iOS - Upload to App Store
php artisan native:package ios \
  --upload-to-app-store \
  --api-key-path=/path/to/AuthKey.p8 \
  --api-key-id=KEYID \
  --api-issuer-id=ISSUERID
</code-snippet>


### Native UI Components (EDGE)

Use native components in Blade templates with the native: prefix (e.g., native:bottom-nav). Components automatically render as native iOS/Android UI elements.

**CRITICAL Requirements:**

1. **Add `nativephp-safe-area` to body classes** - ALWAYS add this class to handle device notches, status bars, and navigation areas properly:
   ```blade
   <body class="nativephp-safe-area">
   ```
   This ensures content doesn't render under the status bar, notch, or navigation elements on iOS and Android.

2. **Child components need IDs** - Navigation items (like `bottom-nav-item`, `side-nav-item`, `top-bar-action`) must have unique `id` attributes for proper lifecycle management.

**Navigation Components:**
- native:bottom-nav / native:bottom-nav-item - Bottom navigation bar
- native:side-nav / native:side-nav-item / native:side-nav-header - Side drawer navigation
- native:top-bar / native:top-bar-action - Top app bar with actions
- native:fab - Floating action button


<code-snippet name="Bottom Navigation Example" lang="blade">
<native:bottom-nav>
    <native:bottom-nav-item id="nav-home" label="Home" icon="home" url="/home" />
    <native:bottom-nav-item id="nav-profile" label="Profile" icon="person" url="/profile" />
</native:bottom-nav>
</code-snippet>

<code-snippet name="Side Navigation Example" lang="blade">
<native:side-nav>
    <native:side-nav-header icon="close" />
    <native:side-nav-item id="nav-dashboard" label="Dashboard" icon="home" url="/dashboard" />
    <native:side-nav-item id="nav-settings" label="Settings" icon="settings" url="/settings" />
    <native:side-nav-item id="nav-profile" label="Profile" icon="person" url="/profile" />
</native:side-nav>
</code-snippet>

<code-snippet name="Top Bar Example" lang="blade">
<native:top-bar title="My App">
    <native:top-bar-action id="search-action" icon="search" url="/search" />
    <native:top-bar-action id="menu-action" icon="menu" event="openMenu" />
</native:top-bar>
</code-snippet>

<code-snippet name="Floating Action Button Example" lang="blade">
<native:fab icon="add" url="/create" />
</code-snippet>


**CRITICAL Rules for EDGE Components:**

1. **Required properties for each component:**
   - `bottom-nav-item`: Must have `id`, `label`, `icon`, and `url`
   - `side-nav-item`: Must have `id`, `label`, `icon`, and `url`
   - `side-nav-header`: All properties optional, but typically include `icon="close"` for close button
   - `top-bar`: Must have `title`
   - `top-bar-action`: Must have `id` and `icon`, plus either `url` or `event`
   - `fab`: Must have `icon`, plus either `url` or `event`

2. **Side nav requires header** - When using `native:side-nav`, you MUST include `` as the first item to provide a close button

3. **Container components don't need IDs** - Container components like `bottom-nav`, `side-nav`, and `top-bar` do not require `id` attributes; only their child items do

### Device Features (Facades)

#### Camera
Capture photos, record videos, or pick from gallery.


<code-snippet name="Take Photo" lang="php">
use Native\Mobile\Facades\Camera;

// Take a photo (returns path synchronously)
$photoPath = Camera::getPhoto();

// Pick images/videos from gallery (dispatches PhotoTaken event)
Camera::pickImages(media_type: 'image', multiple: true, max_items: 5);

// Record video with 30 second limit (dispatches VideoRecorded event)
Camera::recordVideo(['maxDuration' => 30]);
</code-snippet>


#### Audio Recording
Record, pause, resume, and manage audio.


<code-snippet name="Record Audio" lang="php">
use Native\Mobile\Facades\Audio;

// Start recording (dispatches AudioRecorded event when done)
Audio::record()->start();

// Control recording
Audio::pause();
Audio::resume();
Audio::stop();

// Check status
$status = Audio::getStatus(); // 'idle', 'recording', 'paused'
</code-snippet>


#### QR Code Scanner
Scan QR codes with customizable UI.


<code-snippet name="Scan QR Code" lang="php">
use Native\Mobile\Facades\Scanner;

Scanner::scan()
    ->title('Scan QR Code')
    ->hint('Point camera at QR code')
    ->start();
</code-snippet>


#### Dialogs and Alerts
Show native dialogs, toasts, and alerts.


<code-snippet name="Show Alert Dialog" lang="php">
use Native\Mobile\Facades\Dialog;

Dialog::alert('Confirm Action', 'Are you sure?', [
    ['text' => 'Cancel', 'style' => 'cancel'],
    ['text' => 'Delete', 'style' => 'destructive']
])->show();

Dialog::toast('Changes saved successfully');
</code-snippet>


#### File Operations
Move and copy files on the device.


<code-snippet name="File Operations" lang="php">
use Native\Mobile\Facades\File;

File::move($fromPath, $toPath);
File::copy($fromPath, $toPath);
</code-snippet>


#### Sharing
Share URLs or files via native share sheet.


<code-snippet name="Share Content" lang="php">
use Native\Mobile\Facades\Share;

Share::url('Check this out', 'Amazing article', 'https://example.com');
Share::file('My Document', 'Here is the file', $filePath);
</code-snippet>


#### Geolocation
Access device location with permission handling.


<code-snippet name="Get Location" lang="php">
use Native\Mobile\Facades\Geolocation;

Geolocation::getCurrentPosition(fineAccuracy: true);
Geolocation::checkPermissions();
Geolocation::requestPermissions();
</code-snippet>


#### Other Facades
- **Browser**: Open URLs externally, in-app, or for OAuth (`Browser::open($url)`, `Browser::auth($url)`)
- **Biometrics**: Authenticate with Face ID/Touch ID (`Biometrics::prompt()`)
- **SecureStorage**: Store sensitive data in Keychain/KeyStore (`SecureStorage::set($key, $value)`)
- **Haptics**: Trigger vibration (`Haptics::vibrate()`)
- **PushNotifications**: Register for push notifications (`PushNotifications::enroll()`)
- **Network**: Check network status (`Network::status()`)
- **System**: Platform detection and utilities (`System::isIos()`, `System::flashlight()`)
- **Device**: Get device info (`Device::getId()`, `Device::getBatteryInfo()`)

### Event Handling

Native events dispatch to Livewire components via JavaScript injection (NOT Laravel's event system).

**Event Pattern:**

1. Event classes are simple POJOs (no `ShouldBroadcast`, no broadcasting)
2. Livewire components listen with `#[On('native:EventClass')]`
3. Native code dispatches via JavaScript on the main thread


<code-snippet name="Listen for Camera Events" lang="php">
use Livewire\Component;
use Livewire\Attributes\On;

class PhotoManager extends Component
{
    #[On('native:Native\Mobile\Events\Camera\PhotoTaken')]
    public function handlePhoto($path, $mimeType = null)
    {
        // Process the photo
        $this->photos[] = $path;
    }

    #[On('native:Native\Mobile\Events\Camera\VideoRecorded')]
    public function handleVideo($path, $mimeType = null, $thumbnail = null)
    {
        // Process the video
    }
}
</code-snippet>


**Common Events:**
- `Native\Mobile\Events\Camera\PhotoTaken` - Photo captured or selected
- `Native\Mobile\Events\Camera\VideoRecorded` - Video recorded or selected
- `Native\Mobile\Events\Audio\AudioRecorded` - Audio recording completed
- `Native\Mobile\Events\QrCode\QrCodeScanned` - QR code scanned
- `Native\Mobile\Events\Geolocation\PositionReceived` - Location received
- `Native\Mobile\Events\PushNotification\TokenReceived` - Push token registered

### API Integration and Authentication

NativePHP Mobile apps run PHP locally on the device with SQLite. For shared data, authentication, or multi-user features, use a separate API server.

**IMPORTANT: When helping users build a new app, ask them:**
1. Will your app require user authentication?
2. Do users need to share data with each other or sync across devices?
3. Will you need server-side processing or business logic?

If yes to any of these, guide them to set up an API server with `php artisan install:api` and use the authentication patterns below.

#### Setting Up API Server

Install Laravel API in the same repository or separate server:


<code-snippet name="Install API Support" lang="bash">
php artisan install:api
</code-snippet>


This installs Laravel Sanctum for API token authentication.

#### Local Development Setup

For local development, the mobile app running on a device/simulator needs to access your API server. Use ngrok or Laravel Herd's share feature:


<code-snippet name="Share Local API Server" lang="bash">
# Using Laravel Herd (macOS)
herd share

# Or using ngrok
ngrok http 80
</code-snippet>


Add the public URL to your .env:


<code-snippet name="Configure API URL" lang="bash">
# Local development with Herd/ngrok
API_URL=https://your-app.herd.sh
# or
API_URL=https://abc123.ngrok.io

# Production
API_URL=https://api.yourapp.com
</code-snippet>


Configure in config/services.php:


<code-snippet name="Services Configuration" lang="php">
return [
    // ... other services

    'api' => [
        'url' => env('API_URL', 'https://api.yourapp.com'),
    ],
];
</code-snippet>


#### Authentication Pattern

Store API tokens securely and use them for authenticated requests:


<code-snippet name="Login and Store Token" lang="php">
use Illuminate\Support\Facades\Http;
use Native\Mobile\Facades\SecureStorage;

// Login to API and get token
$response = Http::post('https://api.yourapp.com/login', [
    'email' => $email,
    'password' => $password,
]);

if ($response->successful()) {
    $token = $response->json('token');

    // Store token securely in device Keychain/KeyStore
    SecureStorage::set('api_token', $token);

    // Store user data
    SecureStorage::set('user_id', $response->json('user.id'));
}
</code-snippet>


#### Making Authenticated API Requests


<code-snippet name="Authenticated API Request" lang="php">
use Illuminate\Support\Facades\Http;
use Native\Mobile\Facades\SecureStorage;

// Retrieve stored token
$token = SecureStorage::get('api_token');

// Make authenticated request
$response = Http::withToken($token)
    ->get('https://api.yourapp.com/user/profile');

if ($response->successful()) {
    $profile = $response->json();
}

// Handle token expiration
if ($response->status() === 401) {
    SecureStorage::delete('api_token');
    // Redirect to login
}
</code-snippet>


#### Registration Pattern


<code-snippet name="Register User via API" lang="php">
use Illuminate\Support\Facades\Http;
use Native\Mobile\Facades\SecureStorage;

$response = Http::post('https://api.yourapp.com/register', [
    'name' => $name,
    'email' => $email,
    'password' => $password,
]);

if ($response->successful()) {
    $token = $response->json('token');
    SecureStorage::set('api_token', $token);
    SecureStorage::set('user_id', $response->json('user.id'));
}
</code-snippet>


#### When to Use API vs Local Storage

**Use API server when:**
- Multiple users need to share data
- Authentication/authorization is required
- Data needs to sync across devices
- You need server-side processing or business logic
- Real-time features or notifications are needed

**Use local SQLite when:**
- Single-user app with local data only
- Offline-first functionality
- No cross-device syncing needed
- Privacy-sensitive data that shouldn't leave the device

**Hybrid approach:**
- Use API for user accounts, shared data, and sync
- Use local SQLite for offline caching and app state
- Sync between local and API as needed


<code-snippet name="Helper for API Requests" lang="php">
use Illuminate\Support\Facades\Http;
use Native\Mobile\Facades\SecureStorage;

class ApiClient
{
    protected static function baseUrl(): string
    {
        return config('services.api.url', 'https://api.yourapp.com');
    }

    protected static function client()
    {
        $token = SecureStorage::get('api_token');

        return Http::baseUrl(static::baseUrl())
            ->when($token, fn($http) => $http->withToken($token))
            ->timeout(30);
    }

    public static function get(string $endpoint, array $query = [])
    {
        return static::client()->get($endpoint, $query);
    }

    public static function post(string $endpoint, array $data = [])
    {
        return static::client()->post($endpoint, $data);
    }

    public static function isAuthenticated(): bool
    {
        return !empty(SecureStorage::get('api_token'));
    }

    public static function logout(): void
    {
        static::post('/logout'); // Call API logout
        SecureStorage::delete('api_token');
        SecureStorage::delete('user_id');
    }
}

// Usage
$response = ApiClient::get('/posts');
$response = ApiClient::post('/posts', ['title' => 'New Post']);
</code-snippet>


### Best Practices

1. **Use EDGE components for UI** - Leverage native components instead of WebViews for better performance
2. **Handle events in Livewire** - Listen for native events with `#[On('native:...')]` attributes
3. **Check permissions** - Always check/request permissions before accessing device features
4. **Platform detection** - Use `System::isIos()` or `System::isAndroid()` for platform-specific code
5. **Event classes are simple** - Don't add `ShouldBroadcast` or broadcasting logic to native events
6. **Use API for shared data** - For multi-user features or authentication, use a separate API server with Sanctum
7. **Secure token storage** - Always use `SecureStorage` for API tokens, never store in plain text or regular storage
8. **Handle token expiration** - Check for 401 responses and prompt re-authentication when tokens expire
</laravel-boost-guidelines>
