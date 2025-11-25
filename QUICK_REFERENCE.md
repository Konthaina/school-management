# Quick Reference - Tailwind Components & Classes

## File Locations

```
Updated Files:
├── package.json                          (✅ Updated - Latest versions)
├── tailwind.config.js                    (✅ Updated - Modern theme)
├── resources/
│   ├── css/app.css                       (✅ Created - Global styles)
│   ├── js/bootstrap.js                   (✅ Updated - Removed Bootstrap)
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php             (✅ Updated - Modern layout)
│       │   ├── navigation.blade.php      (✅ Updated - New navbar)
│       │   └── sidebar.blade.php         (✅ Updated - Modern sidebar)
│       ├── components/
│       │   ├── card.blade.php            (✅ New)
│       │   ├── table.blade.php           (✅ New)
│       │   ├── table-row.blade.php       (✅ New)
│       │   ├── table-cell.blade.php      (✅ New)
│       │   ├── badge.blade.php           (✅ New)
│       │   ├── button.blade.php          (✅ New)
│       │   ├── input.blade.php           (✅ New)
│       │   ├── select.blade.php          (✅ New)
│       │   ├── container.blade.php       (✅ New)
│       │   ├── page-header.blade.php     (✅ New)
│       │   ├── input-label.blade.php     (✅ Updated)
│       │   └── input-error.blade.php     (✅ Updated)
│       ├── dashboard.blade.php           (✅ Updated)
│       ├── super_admin/
│       │   └── dashboard.blade.php       (✅ Updated)
│       └── admin/users/
│           ├── index.blade.php           (✅ Updated)
│           ├── create.blade.php          (✅ Updated)
│           └── show.blade.php            (✅ Updated)
```

## Component Quick Links

### Import Components
```blade
<!-- All components are automatically available in Blade templates -->
<x-button />
<x-card />
<x-table />
<x-badge />
<x-input />
<x-select />
```

## Utility Classes Cheat Sheet

### Colors
```
text-primary-600       text-success-600       text-warning-600       text-danger-600
bg-primary-100         bg-success-100         bg-warning-100         bg-danger-100
border-primary-300     border-success-300     border-warning-300     border-danger-300
```

### Spacing (Padding & Margin)
```
p-4          px-4         py-4         pt-4  pb-4  pl-4  pr-4
m-4          mx-4         my-4         mt-4  mb-4  ml-4  mr-4
gap-4        space-y-4    space-x-4
```

### Typography
```
text-xs      text-sm      text-base     text-lg      text-xl      text-2xl     text-3xl
font-light   font-normal  font-medium   font-semibold font-bold
```

### Sizing
```
w-full       w-1/2        w-1/3        w-1/4
h-auto       h-10         h-16         h-20
```

### Display & Layout
```
flex                 flex-col             flex-row           flex-wrap
justify-between      items-center         gap-4
block                inline               inline-block
grid                 grid-cols-1          grid-cols-2        grid-cols-3
```

### Shadows & Borders
```
shadow-sm            shadow-md             shadow-lg
border               border-2              border-slate-200
rounded-lg           rounded-full          rounded-none
```

### Responsive Breakpoints
```
sm:flex              md:grid-cols-2        lg:w-64            xl:text-xl          2xl:p-8
```

### Dark Mode
```
dark:bg-slate-800        dark:text-white        dark:border-slate-700
```

## Common Patterns

### Page Layout
```blade
<x-app-layout>
    <x-container class="py-8">
        <x-page-header title="Title" description="Subtitle" />
        <!-- Content -->
    </x-container>
</x-app-layout>
```

### Table with Actions
```blade
<x-table :headers="['Name', 'Email', 'Actions']">
    @foreach($items as $item)
        <x-table-row>
            <x-table-cell>{{ $item->name }}</x-table-cell>
            <x-table-cell>{{ $item->email }}</x-table-cell>
            <x-table-cell>
                <x-button type="secondary" size="xs">Edit</x-button>
            </x-table-cell>
        </x-table-row>
    @endforeach
</x-table>
```

### Form
```blade
<x-card class="max-w-2xl">
    <form action="{{ route('store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <x-input-label for="name">Name</x-input-label>
            <x-input id="name" name="name" required />
            @error('name')
                <x-input-error :messages="$message" />
            @enderror
        </div>
        <div class="flex gap-4">
            <x-button type="primary">Save</x-button>
            <x-button type="secondary">Cancel</x-button>
        </div>
    </form>
</x-card>
```

### Empty State
```blade
<div class="p-12 text-center">
    <i class="fas fa-inbox text-4xl text-slate-400 mb-4"></i>
    <p class="text-slate-600 font-medium">No items found</p>
</div>
```

## Button Variants

### By Type
- `type="primary"` - Main actions (blue)
- `type="secondary"` - Alternative (gray)
- `type="success"` - Positive actions (green)
- `type="danger"` - Delete/negative (red)
- `type="warning"` - Caution (amber)
- `type="outline"` - Subtle (bordered)

### By Size
- `size="xs"` - Extra small (padding: 1.5px 0.75rem)
- `size="sm"` - Small (padding: 1.5px 0.75rem)
- `size="md"` - Medium (padding: 0.5rem 1rem) [default]
- `size="lg"` - Large (padding: 0.75rem 1.5rem)
- `size="xl"` - Extra large (padding: 0.75rem 2rem)

## Badge Variants

```blade
<x-badge type="primary">Primary</x-badge>
<x-badge type="success">Success</x-badge>
<x-badge type="warning">Warning</x-badge>
<x-badge type="danger">Danger</x-badge>
<x-badge type="book">Book</x-badge>
<x-badge type="lesson">Lesson</x-badge>
<x-badge type="revision">Revision</x-badge>
```

## Form Inputs

### Text Input
```blade
<x-input name="username" placeholder="Enter username" />
<x-input type="email" name="email" placeholder="user@example.com" />
<x-input type="password" name="password" />
<x-input type="date" name="birth_date" />
```

### Select Dropdown
```blade
<x-select name="role" placeholder="Select role">
    <option value="admin">Admin</option>
    <option value="user">User</option>
</x-select>
```

## Icons (Font Awesome)

### Common Icons
```
<i class="fas fa-home"></i>              Home
<i class="fas fa-user"></i>              User
<i class="fas fa-users"></i>             Users
<i class="fas fa-file-pdf"></i>          PDF
<i class="fas fa-file-alt"></i>          Document
<i class="fas fa-edit"></i>              Edit
<i class="fas fa-trash"></i>             Delete
<i class="fas fa-eye"></i>               View/Show
<i class="fas fa-plus"></i>              Add/Create
<i class="fas fa-search"></i>            Search
<i class="fas fa-check"></i>             Check/Success
<i class="fas fa-times"></i>             Close/Cancel
<i class="fas fa-arrow-left"></i>        Back
<i class="fas fa-chevron-down"></i>      Dropdown
<i class="fas fa-comments"></i>          Comments
<i class="fas fa-cog"></i>               Settings
<i class="fas fa-clock"></i>             Time/History
<i class="fas fa-calendar"></i>          Date
<i class="fas fa-exclamation-circle"></i> Warning/Error
```

## Grid Layouts

### 2-Column Grid
```blade
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>Column 1</div>
    <div>Column 2</div>
</div>
```

### 3-Column Grid
```blade
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <x-card>Item 1</x-card>
    <x-card>Item 2</x-card>
    <x-card>Item 3</x-card>
</div>
```

## Flexbox Layouts

### Horizontal (Row)
```blade
<div class="flex gap-4 items-center">
    <div>Item 1</div>
    <div>Item 2</div>
</div>
```

### Vertical (Column)
```blade
<div class="flex flex-col gap-4">
    <div>Item 1</div>
    <div>Item 2</div>
</div>
```

### Space Between
```blade
<div class="flex justify-between items-center">
    <div>Left</div>
    <div>Right</div>
</div>
```

## Dark Mode Examples

```blade
<!-- Background changes in dark mode -->
<div class="bg-white dark:bg-slate-800">Content</div>

<!-- Text changes in dark mode -->
<p class="text-slate-900 dark:text-white">Text</p>

<!-- Border changes in dark mode -->
<div class="border border-slate-200 dark:border-slate-700">Bordered</div>

<!-- Hover state in dark mode -->
<button class="hover:bg-slate-100 dark:hover:bg-slate-700">Button</button>
```

## Responsive Examples

```blade
<!-- Hide on mobile, show on tablet and up -->
<div class="hidden md:flex">Desktop only</div>

<!-- Full width on mobile, half on tablet and up -->
<div class="w-full md:w-1/2">Responsive</div>

<!-- Stack on mobile, side-by-side on tablet -->
<div class="flex flex-col md:flex-row gap-4">
    <div>Item 1</div>
    <div>Item 2</div>
</div>

<!-- Different padding on different screens -->
<div class="p-4 md:p-6 lg:p-8">Content</div>
```

## Commonly Needed Utilities

### Centering Content
```blade
<!-- Flex center -->
<div class="flex items-center justify-center">Centered</div>

<!-- Text center -->
<div class="text-center">Centered text</div>
```

### Truncating Text
```blade
<div class="truncate">Long text that gets truncated...</div>
<div class="line-clamp-2">Two lines max...</div>
```

### Transitions
```blade
<div class="transition-all duration-200">Smooth transition</div>
<button class="hover:opacity-80 transition-opacity">Fade on hover</button>
```

### Opacity
```blade
<div class="opacity-50">50% transparent</div>
<button class="disabled:opacity-50">Disabled button</button>
```

## Resources
- Tailwind Docs: https://tailwindcss.com/docs
- Font Awesome: https://fontawesome.com/icons
- Alpine.js: https://alpinejs.dev/
