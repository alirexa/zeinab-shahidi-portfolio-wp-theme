import isotopeGrid from './isotope-grid'
// import barba from '@barba/core'
// import { gsap } from 'gsap'
// import initPreloader from './preloader-init'
import Navigation from './navigation'
import FrontPage from './front-page'

document.addEventListener('DOMContentLoaded', () => {
  const frontPage = new FrontPage()
  const navigation = new Navigation()
  isotopeGrid()
})

// class initApp {
//   constructor() {
//     this.initLoader()
//   }

//   initLoader() {
//     let loadingScreen = document.querySelector('.loading-screen')
//     Pace.on('hide', () => {
//       const tl = new gsap.timeline({
//         defaults: {
//           duration: 0.6,
//           ease: 'power5.in',
//         },
//       })

//       tl.to(loadingScreen, {
//         y: '-100%',
//       })
//     })
//   }
// }
