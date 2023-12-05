module.exports = {
content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    ],
  variants: {
    zIndex: ['responsive', 'hover'],
    position: ['responsive', 'hover'],
    padding: ['responsive', 'last'],
    margin: ['responsive', 'last'],
    borderWidth: ['responsive', 'last']
  },
  theme: {
    extend: {
      colors: {
        color: {
          'charcoal': '#222222',
          'midnight-blue': '#001A72',
          'cool-gray': '#7D8492',
          'coral': '#EB5757',
          'dark-gray': '#4D4D4D',
          'slate-gray': '#828282',
          'ocean-blue': '#00C1C1',
          'dove-gray': '#E2E2E2',
          'pale-pink': '#FAFAFA',
          'pale-gray': '#F2F2F2',
          'light-gray': '#D9D9D9',
          'stone-gray': '#9C9C9C',
          'fiery-red': '#DC2D27',
          'warm-gray': '#858585',
          'cloud-white': '#EEEEEE'
        },
        theme: {
          1: '#1C3FAA',
          2: '#F1F5F8',
          3: '#2e51bb',
          4: '#3151BC',
          5: '#dee7ef',
          6: '#D32929',
          7: '#365A74',
          8: '#D2DFEA',
          9: '#91C714',
          10: '#3160D8',
          11: '#F78B00',
          12: '#FBC500',
          13: '#7F9EB9',
          14: '#E6F3FF',
          15: '#8DA9BE',
          16: '#607F96',
          17: '#FFEFD9',
          18: '#D8F8BC',
          19: '#E6F3FF',
          20: '#2449AF',
          21: '#284EB2',
          22: '#395EC1',
          23: '#D6E1FF',
          24: '#2e51bb',
          25: '#C6D4FD',
          26: '#E8EEFF',
          27: '#98AFF5',
          28: '#1A389F',
          29: '#142C91',
          30: '#8da3e6',
          31: '#ffd8d8',
          32: '#3b5998',
          33: '#4ab3f4',
          34: '#517fa4',
          35: '#0077b5',
          36: '#d18d96',
          37: '#c7d2ff',
          38: '#15329A',
          40: '#203FAD',
          41: '#BBC8FD'
        }
      },
      fontFamily: {
        'roboto': ['Roboto'],
        'svn-gotham': ['SVN-Gotham', 'sans'],
      },
      fontWeight: {
        'normal': 400,
        'lighter': 300,
        'bold': 700,
      },
      container: {
        center: true
      },
      maxWidth: {
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%'
      },
      screens: {
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
        'xxl': '1600px'
      }
    }
  },
  plugins: [],
}

