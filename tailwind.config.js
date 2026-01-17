/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      colors: {
        primary: '#4F46E5',     // Indigo 600
        secondary: '#6366F1',   // Indigo 500
        accent: '#FBBF24',      // Amber 400
        success: '#16A34A',     // Green 600
        danger: '#DC2626',      // Red 600
        warning: '#F59E0B',     // Yellow 500
        info: '#3B82F6',        // Blue 500
      },
    },
  },
  plugins: [],
};
