/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
    "./vendor/livewire/flux-pro/stubs/**/*.blade.php",
    "./vendor/livewire/flux/stubs/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
        spa: {
          primary: '#8B7355',
          secondary: '#A8956F',
          accent: '#E8D5B7',
          neutral: '#F5F5F0',
          success: '#22C55E',
          warning: '#F59E0B',
          error: '#EF4444'
        }
      },
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
      },
      animation: {
        'fade-in': 'fadeIn 0.3s ease-in-out',
        'slide-up': 'slideUp 0.3s ease-out',
        'bounce-gentle': 'bounceGentle 2s infinite',
        'pulse-gentle': 'pulseGentle 2s infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { transform: 'translateY(20px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        bounceGentle: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-5px)' },
        },
        pulseGentle: {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.8' },
        },
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '128': '32rem',
      },
      borderRadius: {
        'xl': '1rem',
        '2xl': '1.5rem',
        '3xl': '2rem',
      },
      boxShadow: {
        'spa': '0 4px 6px -1px rgba(139, 115, 85, 0.1), 0 2px 4px -1px rgba(139, 115, 85, 0.06)',
        'spa-lg': '0 10px 15px -3px rgba(139, 115, 85, 0.1), 0 4px 6px -2px rgba(139, 115, 85, 0.05)',
        'spa-xl': '0 20px 25px -5px rgba(139, 115, 85, 0.1), 0 10px 10px -5px rgba(139, 115, 85, 0.04)',
      },
    },
  },
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes: [
      {
        spa: {
          "primary": "#8B7355",
          "primary-content": "#ffffff",
          "secondary": "#A8956F",
          "secondary-content": "#ffffff",
          "accent": "#E8D5B7",
          "accent-content": "#1f2937",
          "neutral": "#F5F5F0",
          "neutral-content": "#1f2937",
          "base-100": "#ffffff",
          "base-200": "#f9fafb",
          "base-300": "#f3f4f6",
          "base-content": "#1f2937",
          "info": "#3b82f6",
          "info-content": "#ffffff",
          "success": "#22c55e",
          "success-content": "#ffffff",
          "warning": "#f59e0b",
          "warning-content": "#ffffff",
          "error": "#ef4444",
          "error-content": "#ffffff",
        },
      },
      "light",
      "dark",
    ],
    base: true,
    styled: true,
    utils: true,
    prefix: "",
    logs: true,
    themeRoot: ":root",
  },
}