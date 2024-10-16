// TODO: Should look over and see if it can be setted up in a class

class BarbaSetup {
  constructor(container) {
    this.container = null
  }
  init() {
    barba.init({
      debug: true,
      transitions: [
        {
          name: 'opacity-transition',
          once({ next }) {
            initPreloader()
            isotopeGrid(next.container)
            const navigation = new Navigation(next.container)
            // main()
            defaultAnimationOnce(next.container)
          },
          leave({ current }) {
            defaultAnimationLeave(current.container)
          },
          enter({ next }) {
            isotopeGrid(next.container)
            defaultAnimationEnter(next.container)
            window.scrollTo(0, 0)
            const navigation = new Navigation(next.container)
          },
        },
      ],
    })
  }
  defaultAnimationEnter(container) {
    const mainContentWrapper = container.querySelectorAll('#primary')

    const tl = gsap.timeline({
      defaults: {
        duration: 1.5,
        ease: 'power3.out',
      },
    })

    return tl.fromTo(
      mainContentWrapper,
      { autoAlpha: 0 },
      { autoAlpha: 1, duration: 2, onComplete: () => {} },
    )
  }
  defaultAnimationOnce(container) {
    let app = new initApp()
    const mainContentWrapper = container.querySelector('#primary')
    const headerLogo = container.querySelector('.site-header img')

    const tl = gsap.timeline({
      defaults: {
        duration: 1.5,
        ease: 'power3.out',
      },
    })
    return (
      tl
        // .fromTo(header,{y:-200},{y:0})
        .fromTo(
          mainContentWrapper,
          { autoAlpha: 0, translateY: 400 },
          {
            autoAlpha: 1,
            translateY: 0,
            duration: 2,
            delay: 2,
            onComplete: () => {},
          },
        )
        .from(headerLogo, { scale: 2 })
    )
  }
  defaultAnimationLeave(container) {
    /**
     * Defaul animation for when page content is disapearing
     */
    // console.log("leave");
    const mainContentWrapper = container.querySelectorAll('#primary')

    const tl = gsap.timeline({
      defaults: {
        duration: 0.5,
        ease: 'power3.out',
      },
    })
    return tl.to(mainContentWrapper, { autoAlpha: 0 })
  }
}
