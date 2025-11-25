# Profile Page Design Reference

## Header Component Structure

```
┌─────────────────────────────────────────────────────────────────────┐
│                    ANIMATED GRADIENT BACKGROUND                      │
│                  (Blue → Indigo → Purple gradient)                   │
│                                                                       │
│  ┌─────────────────────────────────────────────────────────────┐   │
│  │                                                             │   │
│  │  ┌──────────────┐                                           │   │
│  │  │              │   John Doe                               │   │
│  │  │   PROFILE    │   john.doe@example.com                   │   │
│  │  │   PICTURE    │                                           │   │
│  │  │   (w/ glow)  │   [Active] [User] [Verified]             │   │
│  │  │              │                                           │   │
│  │  │ ● (online)   │   ┌──────────────────────────────┐       │   │
│  │  └──────────────┘   │ ☎ +1 (555) 000-0000         │       │   │
│  │                     │ 📍 123 Main Street           │       │   │
│  │                     │ 🏢 University of Example     │       │   │
│  │                     │ 📅 Jan 2024                  │       │   │
│  │                     │ ⏱ Updated 2 hours ago        │       │   │
│  │                     │ 📊 80% Profile Complete      │       │   │
│  │                     └──────────────────────────────┘       │   │
│  │                                                             │   │
│  │  "Lorem ipsum dolor sit amet, consectetur adipiscing elit."   │   │
│  │                                                             │   │
│  └─────────────────────────────────────────────────────────────┘   │
│                                                                       │
└─────────────────────────────────────────────────────────────────────┘
                              ~~~~ SVG WAVE ~~~~
```

## Color Scheme by Role

### User Profile
```
Gradient: #3B82F6 (Blue) → #6366F1 (Indigo) → #9333EA (Purple)
Primary Accent: Indigo (#6366F1)
Background: Light Blue/Indigo
```

### Admin Profile
```
Gradient: #3B82F6 (Blue) → #6366F1 (Indigo)
Primary Accent: Blue (#3B82F6)
Background: Light Blue tones
```

### Super Admin Profile
```
Gradient: #A855F7 (Purple) → #EC4899 (Pink)
Primary Accent: Purple (#A855F7)
Background: Purple/Pink tones
```

## Badge Styles

### Active Status
```
┌─────────────────────┐
│ ● Active            │  Green (#22C55E)
│ (pulsing dot)       │  White text
└─────────────────────┘
```

### Role Badge
```
┌─────────────────────┐
│ 👤 User/Admin       │  Theme-colored background
│    Super Admin      │  White text
│    Lecturer         │  Icon + text
└─────────────────────┘
```

### Verified Badge
```
┌─────────────────────┐
│ ✓ Verified          │  Purple (#A855F7)
│ (if email verified) │  White text
└─────────────────────┘
```

## Information Cards Grid

### Layout
```
Mobile (1 column):
┌─────────────┐
│ Full Name   │
├─────────────┤
│ Email       │
├─────────────┤
│ Phone       │
├─────────────┤
│ Address     │
├─────────────┤
│ DOB         │
├─────────────┤
│ Institution │
└─────────────┘

Tablet/Desktop (2 columns):
┌──────────────┬──────────────┐
│ Full Name    │ Email        │
├──────────────┼──────────────┤
│ Phone        │ Address      │
├──────────────┼──────────────┤
│ DOB          │ Institution  │
└──────────────┴──────────────┘
```

### Card Styling
```
┌─────────────────────────┐
│ LABEL (small, uppercase) │
│ (tracking-wide)          │
├─────────────────────────┤
│ Value (semibold)         │  Gradient background
│ with icon                │  Hover: shadow effect
│                          │  Dark mode: gray tones
└─────────────────────────┘
```

## Animation Details

### Blob Animation
```
Frame 0%:    [Blob A] [Blob B] [Blob C]
Frame 33%:   [Blob A→] [Blob B←] [Blob C↓]
Frame 66%:   [Blob A↙] [Blob B↑] [Blob C→]
Frame 100%:  [Blob A] [Blob B] [Blob C]
Duration: 7 seconds, infinite loop
```

### Online Status Pulsing
```
0%:   Scale 1.0, Opacity 1.0
50%:  Scale 1.2, Opacity 0.8
100%: Scale 1.0, Opacity 1.0
Duration: 2 seconds, infinite loop
```

## Typography Hierarchy

```
User Name:
  - Font Size: 3xl (md: 4xl, lg: 5xl)
  - Font Weight: Bold (700)
  - Color: White
  - Drop Shadow: Yes

Email Address:
  - Font Size: Base → Large
  - Font Weight: Normal (400)
  - Color: Light Blue (#E0E7FF)
  - Drop Shadow: Yes

Section Headers:
  - Font Size: Large
  - Font Weight: Semibold (600)
  - Color: Gray 900 (Dark) / Gray 100 (Light)

Quick Info Labels:
  - Font Size: XS
  - Font Weight: Medium (500)
  - Color: Gray 600
  - Transform: Uppercase
  - Letter Spacing: Wide

Quick Info Values:
  - Font Size: Small
  - Font Weight: Semibold (600)
  - Color: Gray 900 (Dark) / White (Light)

Bio/Description:
  - Font Size: Small → Base
  - Font Weight: Normal (400)
  - Style: Italic
  - Color: Gray 700 (Dark) / Gray 300 (Light)
```

## Spacing & Layout

```
Container Padding:
  - Mobile: 1rem (px-4)
  - Tablet: 1.5rem (sm:px-6)
  - Desktop: 2rem (lg:px-8)

Vertical Spacing:
  - Header to Cards: 1.5rem (py-12)
  - Cards Gap: 1.5rem
  - Within Card: 1rem

Profile Picture Sizes:
  - Mobile: 160px (w-40 h-40)
  - Desktop: 192px (sm:w-48 sm:h-48)

Card Sizes:
  - Mobile: Full width
  - Desktop: 50% width (2 columns)
```

## Dark Mode Adjustments

```
Backgrounds:
  - Light: White (#FFFFFF)
  - Dark: Gray 800 (#1F2937)

Text Colors:
  - Light: Gray 900 (#111827)
  - Dark: White (#FFFFFF)

Cards:
  - Light: Blue 50 → Indigo 50 gradient
  - Dark: Gray 700 → Gray 600 gradient

Borders:
  - Light: Blue 200
  - Dark: Gray 600

Icons:
  - Light: Indigo 600
  - Dark: Indigo 400
```

## Responsive Behavior

### Mobile (<640px)
- Single column layout
- Smaller profile picture (40x40 w, 40x40 h)
- Larger touch targets for cards
- Reduced padding

### Tablet (640px - 1024px)
- Two column grid for cards
- Medium profile picture (48x48 w, 48x48 h)
- Balanced spacing

### Desktop (>1024px)
- Full two column layout
- Large profile picture (192x192)
- Full spacing and typography
- Optimal reading width

## Hover & Interaction States

### Profile Picture Hover
```
Effect: Glow enhancement
  - Box shadow increases
  - Backdrop blur effect
  - Opacity increase
Duration: 300ms smooth transition
```

### Card Hover
```
Effect: Shadow & scale
  - Shadow: none → md
  - Cursor: pointer
Duration: Instant/smooth transition
```

### Button Hover
```
Effect: Color & shadow
  - Background: darker shade
  - Box shadow: increases
Duration: Fast (150ms)
```

## Accessibility Features

- ✓ Semantic HTML structure
- ✓ ARIA labels on interactive elements
- ✓ Color contrast meets WCAG AA standards
- ✓ Focus states visible on keyboard navigation
- ✓ Alt text on images
- ✓ Icon + text on all buttons
- ✓ Proper heading hierarchy
- ✓ Dark mode for vision comfort

## Browser Support

- ✓ Chrome/Edge 90+
- ✓ Firefox 88+
- ✓ Safari 14+
- ✓ Mobile browsers (iOS Safari, Chrome Mobile)
- ✓ IE 11 (basic styling, no animations)

## Performance Optimization

- CSS animations use GPU-accelerated properties (transform, opacity)
- No JavaScript required for header animations
- Images use responsive sizing
- Lazy loading supported
- Dark mode doesn't reduce performance
- SVG wave optimized for rendering
