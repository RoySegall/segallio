// This is the main.js file. Import global CSS and scripts here.
// The Client API can be used here. Learn more: gridsome.org/docs/client-api

import DefaultLayout from '~/layouts/Default.vue'

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faStar as faStarSolid } from '@fortawesome/free-solid-svg-icons'
import { faFacebookF, faTwitter, faGithubAlt, faLinkedinIn, faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faLaptopCode, faStar as faStarLight } from '@fortawesome/pro-light-svg-icons'
import { faMapMarked, faBookReader, faUserCircle, faChevronLeft, faChevronRight, faQuoteLeft, faQuoteRight } from '@fortawesome/pro-duotone-svg-icons'


const icons = [
  faStarSolid, faStarLight, faFacebookF, faTwitter, faGithubAlt, faLinkedinIn, faUserCircle, faLaptopCode,
  faBookReader, faMapMarked, faChevronLeft, faChevronRight, faInstagram, faQuoteLeft, faQuoteRight
];

icons.map((item) => {
  library.add(item)
});

export default function (Vue, { router, head, isClient }) {

  head.link.push({
    rel: 'stylesheet',
    href: 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,500;1,700;1,900&display=swap'
  })

  // Set default layout as a global component
  Vue.component('Layout', DefaultLayout)
  Vue.component('font-awesome-icon', FontAwesomeIcon)
}
