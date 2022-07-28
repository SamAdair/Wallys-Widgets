module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {

    extend: {
      fontFamily: {
        'logo': 'Archivo Black',
        'Raleway': 'Raleway',
        'Open': 'Open Sans',
      },
      letterSpacing: {
        max: '12px',
      },
      colors: {
        'JAKK': '#93dcfe',
      },
      rotate: {
        '25': '25deg',
      },
      backgroundImage: {
        'gloucester': "url('/img/Gloucester.jpg')",
        'security': "url('/img/security.jpg')",
        'facilities': "url('/img/facilities.jpg')",
        'security.key': "url('/img/security/key.jpg')",
        'security.car': "url('/img/security/car.jpg')",
        'security.concierge': "url('/img/security/concierge.jpg')",
        'security.car-blue': "url('/img/security/car-blue2.jpg')",
        'security.guard': "url('/img/security/guard.jpg')",
        'security.premesis': "url('/img/security/premesis.jpg')",
        'security.door': "url('/img/security/door.jpg')",
        'security.event': "url('/img/security/event.jpg')",
        'security.radio': "url('/img/security/radio.jpg')",
        'security.alarm': "url('/img/security/alarm.jpg')",
        'security.cctv': "url('/img/security/cctv.jpg')",
        'sia.backdrop': "url('/img/sia_backdrop.jpg')",
      },
    },
  },
  plugins: [],
}
