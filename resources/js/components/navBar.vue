<template>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd">
            <a href="/" class="nav-link" >Jaunumi</a>
            <a href="/nometnes" class="nav-link">Nometnes</a>
            <a href="/lietotaji" class="nav-link">Lietotaji</a>
            <a href="/atbalstitaji" class="nav-link">Atbalstītāji</a>
            <a href="#" class="nav-link">Galerija</a>
            <a href="#" class="nav-link">Kontakti</a>
             <form class="form-inline my-2 my-lg-0">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             </form>
    </nav>
</template>
<script>
import atbalstitaji from './atbalstitaji'

export default {
  components: {
    atbalstitaji
  },
}
</script>
