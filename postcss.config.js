module.exports = {
  plugins: [
    require('tailwindcss'),
    require('postcss-nesting'),
    require('autoprefixer'),
    require('cssnano')({
      preset: 'default',
    }),
  ]
}