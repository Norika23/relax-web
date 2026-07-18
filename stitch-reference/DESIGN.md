---
name: Serene Professionalism
colors:
  surface: '#f1fbff'
  surface-dim: '#d1dce0'
  surface-bright: '#f1fbff'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#eaf5fa'
  surface-container: '#e4f0f4'
  surface-container-high: '#dfeaef'
  surface-container-highest: '#d9e4e9'
  on-surface: '#131d21'
  on-surface-variant: '#42493d'
  inverse-surface: '#283236'
  inverse-on-surface: '#e7f3f7'
  outline: '#72796c'
  outline-variant: '#c2c9ba'
  surface-tint: '#3c692b'
  primary: '#3c692b'
  on-primary: '#ffffff'
  primary-container: '#7fb069'
  on-primary-container: '#174207'
  inverse-primary: '#a1d489'
  secondary: '#586062'
  on-secondary: '#ffffff'
  secondary-container: '#dae1e3'
  on-secondary-container: '#5d6466'
  tertiary: '#5e5f5b'
  on-tertiary: '#ffffff'
  tertiary-container: '#a3a39f'
  on-tertiary-container: '#383936'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#bdf1a3'
  primary-fixed-dim: '#a1d489'
  on-primary-fixed: '#052100'
  on-primary-fixed-variant: '#255015'
  secondary-fixed: '#dde4e6'
  secondary-fixed-dim: '#c1c8ca'
  on-secondary-fixed: '#161d1f'
  on-secondary-fixed-variant: '#41484a'
  tertiary-fixed: '#e3e3de'
  tertiary-fixed-dim: '#c7c7c2'
  on-tertiary-fixed: '#1b1c19'
  on-tertiary-fixed-variant: '#464744'
  background: '#f1fbff'
  on-background: '#131d21'
  surface-variant: '#d9e4e9'
typography:
  display-lg:
    fontFamily: Noto Sans JP
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.5'
    letterSpacing: 0.08em
  headline-lg:
    fontFamily: Noto Sans JP
    fontSize: 24px
    fontWeight: '700'
    lineHeight: '1.6'
    letterSpacing: 0.05em
  headline-md:
    fontFamily: Noto Sans JP
    fontSize: 20px
    fontWeight: '700'
    lineHeight: '1.6'
    letterSpacing: 0.05em
  body-lg:
    fontFamily: Noto Sans JP
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.8'
    letterSpacing: 0.03em
  body-md:
    fontFamily: Noto Sans JP
    fontSize: 14px
    fontWeight: '400'
    lineHeight: '1.8'
    letterSpacing: 0.03em
  label-md:
    fontFamily: Noto Sans JP
    fontSize: 12px
    fontWeight: '500'
    lineHeight: '1.4'
    letterSpacing: 0.1em
  headline-lg-mobile:
    fontFamily: Noto Sans JP
    fontSize: 22px
    fontWeight: '700'
    lineHeight: '1.5'
    letterSpacing: 0.04em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  container-margin: 24px
  section-gap: 80px
  element-gap: 16px
  stack-gap: 32px
  gutter: 16px
---

## Brand & Style

This design system is tailored for small relaxation and wellness salons seeking a professional yet approachable digital presence. The aesthetic is defined as **Minimalist & Sophisticated**, prioritizing clarity, "ma" (intentional negative space), and a sense of breathing room.

The emotional response should be one of immediate relief and trust. By avoiding the "busy" visual clutter often found in budget web services, the UI reflects the premium quality of the salons it represents. It leverages soft, organic tones and precise typography to convey expertise without being cold or clinical.

## Colors

The palette is rooted in nature and tranquility.
- **Primary (Sage Green):** Used strategically for call-to-actions, success states, and key brand highlights. It represents growth and relaxation.
- **Secondary (Deep Charcoal):** Reserved for primary headings and body text to ensure high legibility and a grounded, professional feel.
- **Background (Cream/Off-White):** A soft `#F9F8F3` serves as the primary canvas, reducing eye strain and providing a more "organic" feel than pure white.
- **Neutrals:** Muted grays are used for borders, secondary labels, and icon containers to maintain a low-contrast, gentle hierarchy.

## Typography

This design system uses **Noto Sans JP** exclusively to maintain a clean, contemporary Japanese aesthetic. 

- **Weight Distribution:** Headers use Bold (700) for authority, while body text uses Regular (400) to ensure the layout feels light.
- **Breathing Room:** We employ generous `line-height` (1.8 for body) and `letter-spacing` (0.05em - 0.1em) to ensure text never feels cramped.
- **Hierarchy:** High contrast between Heading and Body sizes creates a clear path for the eye to follow.

## Layout & Spacing

The layout philosophy follows a **Fluid Grid** with a "Generous Padding" rule. 

- **Vertical Rhythm:** Large gaps between sections (80px on mobile) are used to prevent information overload.
- **Safe Zones:** A 24px side margin is maintained on mobile to prevent content from touching the screen edges.
- **Component Spacing:** Inside cards or containers, use a 32px padding to emphasize the luxury of space.
- **Alignment:** Content is primarily center-aligned for headlines to evoke a balanced, stable feeling, while body text remains left-aligned for readability.

## Elevation & Depth

To maintain a "clean and airy" feel, this design system avoids heavy shadows. 

- **Tonal Layers:** Depth is primarily created through subtle color shifts between the cream background and slightly lighter white card surfaces.
- **Ambient Shadows:** Where depth is necessary (e.g., primary cards or sticky buttons), use ultra-soft shadows: `0px 4px 20px rgba(0, 0, 0, 0.04)`. The shadow should be felt rather than seen.
- **Subtle Outlines:** Use `1px` borders in a soft neutral (10% opacity charcoal) instead of shadows to define input fields and secondary containers.

## Shapes

The shape language is soft and approachable. 
- **Standard Radius:** 12px (0.75rem) for cards, input fields, and large buttons.
- **Large Radius:** 24px (1.5rem) for featured sections or pill-shaped tags.
- **Consistency:** Avoid sharp 90-degree corners to maintain the "Relax" brand promise. All interactive elements must have a consistent corner radius to feel part of the same ecosystem.

## Components

### Buttons
- **Primary:** Solid Sage Green background with white text. Rounded 12px. High padding (16px top/bottom).
- **Secondary:** Transparent background with Sage Green border (1.5px) and text.
- **Ghost:** Charcoal text with no background, used for "Back" or "Cancel" actions.

### Cards
- White background on Cream page background. 12px-16px corner radius. 
- Padding should be at least 32px to ensure content doesn't feel crowded.
- Minimalist headers within cards using `label-md` in uppercase or high-letter-spacing.

### Input Fields
- Soft white background with a subtle `#D1D5DB` border.
- Rounded 12px. 
- Labels should be placed above the field in `label-md` charcoal.

### Chips & Tags
- Used for categories or features. 
- Pill-shaped (fully rounded) with a very light Sage Green tint (`#F0F7ED`) and Sage Green text.

### Accordions (FAQ)
- Clean, horizontal lines with `1px` thickness. 
- Use a simple `+` or chevron icon that rotates on expansion. 
- Generous vertical padding between questions (24px).