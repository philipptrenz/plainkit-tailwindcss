module.exports = {
  mode: 'jit',
  theme: { },
  variants: {
    extend: { },
  },
  plugins: [ ],
  purge: {
    enabled: process.env.NODE_ENV === 'production',
    content: [
        './site/**/*.php',
        './site/tailwind/*.css',
    ],
  },
}
