// This is the main.js file. Import global CSS and scripts here.
// The Client API can be used here. Learn more: gridsome.org/docs/client-api

import DefaultLayout from '~/layouts/Default.vue'
import { library,  } from '@fortawesome/fontawesome-svg-core'
import { faStar, faUserCircle, faLaptopCode, faBookReader } from '@fortawesome/free-solid-svg-icons'
import { faFacebookSquare, faTwitterSquare, faGithub, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faStar)
library.add(faFacebookSquare)
library.add(faTwitterSquare)
library.add(faGithub)
library.add(faLinkedin)
library.add(faUserCircle)
library.add(faLaptopCode)
library.add(faBookReader)

export default function (Vue, { router, head, isClient }) {
  // Set default layout as a global component
  Vue.component('Layout', DefaultLayout)
  Vue.component('font-awesome-icon', FontAwesomeIcon)
}
