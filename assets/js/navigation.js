class Navigation {
  constructor() {
    this.elements = [
      document.querySelector('header.site-header'),
      document.querySelector('footer .secondary-navigation'),
    ]
    const filtersEl = document.querySelector('main.projects-archive .filters')
    if (filtersEl) {
      this.elements.push(filtersEl)
    }

    this.navVisibilityToggle()
  }
  navVisibilityToggle() {
    let timeout

    const hideHeader = () => {
      this.elements.forEach((element) => {
        if (element) {
          element.classList.add('hidden')
        }
      })
    }

    const resetTimeout = () => {
      clearTimeout(timeout)
      this.elements.forEach((element) => {
        if (element) {
          element.classList.remove('hidden')
        }
      })
      timeout = setTimeout(hideHeader, 5000)
    }

    document.addEventListener('mousemove', resetTimeout)
    document.addEventListener('scroll', resetTimeout)
    document.addEventListener('click', resetTimeout)

    resetTimeout()
  }
}

export default Navigation
