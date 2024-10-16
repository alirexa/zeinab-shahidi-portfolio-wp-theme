import isotopeGrid from './isotope-grid'
import Navigation from './navigation'
import FrontPage from './front-page'
import ProjectSlider from './archive-project'

document.addEventListener('DOMContentLoaded', () => {
  const frontPage = new FrontPage()
  const navigation = new Navigation()
  const projectSlider = new ProjectSlider()
  isotopeGrid()
})
