/* module.exports = {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
  },
} */

module.exports = {
  plugins: [
    tailwindcss('./tailwind.config.js'),
    require('autoprefixer'),
  ],
}
