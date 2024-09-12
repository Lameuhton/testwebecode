module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    './*.php',
    './inc/**/*.php',
    './templates/**/*.php',
    './safelist.txt',
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
  ],
  safelist: [
    'text-center'
    //{
    //  pattern: /text-(white|black)-(200|500|800)/
    //}
  ],
  theme: {
    extend: {
      screens: {
        xs: "320px",
        sm: "460px",
        md: "768px",
        medium: "1125px",
        base: "1250px",
        lg: "1440px",
        xlarge: "1680px",
        xl: "1920px",
        "2xl": "2300px",
      },
      fontFamily: {
        'title': ["Playfair Display", 'serif'],
        'text': ['Open Sans', 'sans-serif'],
      },

      fontSize:{
        'secondary_title': ['48px',{
          fontFamily: "Playfair Display",
          lineHeight: '63.98px',
          fontWeight: '400',
          fontStyle: 'normal',
        }],

        'primary_title': ['64px',{
          fontFamily: "Playfair Display",
          lineHeight: '85.31px',
          fontWeight: '400',
          fontStyle: 'normal',
        }],

          },

      colors: { 
        'primary-color': '#A97C3B',
        'secondary-color': '#7F1110',
      },

      margin: {
        'large' : '150px',
        'mobile': '80px',
     }  
    }
  },
  plugins: []
}