// This is the main.js file. Import global CSS and scripts here.
// The Client API can be used here. Learn more: gridsome.org/docs/client-api

import DefaultLayout from '~/layouts/Default.vue'

import {library} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

import {faStar as faStarSolid, faThumbtack, faHeart, faMapMarkerAlt} from '@fortawesome/free-solid-svg-icons'

import {
  faFacebookF, faTwitter, faGithubAlt, faLinkedinIn, faInstagram, faPhp,
  faPython, faNode, faDrupal
} from '@fortawesome/free-brands-svg-icons'

import {
  faStar as faStarLight,
} from '@fortawesome/pro-light-svg-icons'

import {
  faMapMarked, faBookReader, faUserCircle, faChevronLeft, faChevronRight,
  faQuoteLeft, faQuoteRight, faMapPin, faTimes, faLaptopCode, faCodeBranch,
  faNotEqual, faUserRobot
} from '@fortawesome/pro-duotone-svg-icons'


const icons = [
  faStarSolid, faStarLight, faFacebookF, faTwitter, faGithubAlt, faLinkedinIn,
  faUserCircle, faLaptopCode, faBookReader, faMapMarked, faChevronLeft,
  faChevronRight, faInstagram, faQuoteLeft, faQuoteRight, faThumbtack, faHeart,
  faMapPin, faMapMarkerAlt, faTimes, faCodeBranch, faPhp, faPython, faNode,
  faDrupal, faNotEqual, faUserRobot
];

import {LMap, LTileLayer, LMarker} from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';

icons.map((item) => {
  library.add(item)
});

export default function (Vue, {router, head, isClient}) {

  head.link.push({
    rel: 'stylesheet',
    href: 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,500;1,700;1,900&display=swap'
  })

  head.link.push({
    rel: 'stylesheet',
    href: 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap'
  })

  head.link.push({
    rel: 'stylesheet',
    href: 'https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
  })

  head.link.push({
    rel: 'stylesheet',
    href: 'https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap'
  })

  // Set default layout as a global component
  Vue.component('Layout', DefaultLayout);
  Vue.component('font-awesome-icon', FontAwesomeIcon);
  Vue.component('l-map', LMap);
  Vue.component('l-tile-layer', LTileLayer);
  Vue.component('l-marker', LMarker);
}
