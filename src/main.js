// This is the main.js file. Import global CSS and scripts here.
// The Client API can be used here. Learn more: gridsome.org/docs/client-api

import DefaultLayout from '~/layouts/Default.vue'
import { library,  } from '@fortawesome/fontawesome-svg-core'
import { faStar as faStarSolid } from '@fortawesome/free-solid-svg-icons'
import { faFacebookSquare, faTwitterSquare, faGithub, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faLaptopCode, faStar as faStarLight } from '@fortawesome/pro-light-svg-icons'
import { faBracketsCurly, faBookReader, faUserCircle } from '@fortawesome/pro-duotone-svg-icons'

library.add(faStarSolid)
library.add(faStarLight)
library.add(faFacebookSquare)
library.add(faTwitterSquare)
library.add(faGithub)
library.add(faLinkedin)
library.add(faUserCircle)
library.add(faLaptopCode)
library.add(faBookReader)
library.add(faBracketsCurly)

export default function (Vue, { router, head, isClient }) {
  // Set default layout as a global component
  Vue.component('Layout', DefaultLayout)
  Vue.component('font-awesome-icon', FontAwesomeIcon)
}
