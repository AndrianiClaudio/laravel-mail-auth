<template>
  <div class="container py-4">
    <!-- TECHONOLOGIES CHECKBOXES -->
     <div class="row">
      <div class="col mb-3 justify-content-center">
        <fieldset class="">
          <legend class="text-center fs-5">Technologies</legend>
          <ul class="list-group-horizontal d-flex justify-content-center align-items-center flex-wrap">
            <li class="list-group-item " v-for="(tech, index) in technologies" :key="`technology-${index}`" >
                <input class="me-2" type="checkbox" name="tags[]" :value="tech" v-model="selected.technologies">
                <label :for="tech">{{tech}}</label>
            </li>
          </ul>
          <button class="d-block mx-auto btn btn-info" type="submit" @click.prevent="filterProjects">Ricerca</button>
        </fieldset>
      </div>
    </div>


    <!-- PRINT ALL PROJECTS -->
    <div class="cards" v-if="projects.length > 0">
      <div class="card" v-for="(prj,index) in projects" :key="`prj-${index}`">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <!--  PROJECT NAME -->
            <h4 class="card-text text-uppercase">{{prj.name}}</h4>
            <div v-if="prj.technologies" class="technologies">
              <ul class="list-group list-group-horizontal">
                <li v-for="(tech,index) in prj.technologies" :key="`tech-${index}`" class="list-group-item border-0">
                  <span class="badge rounded-pill" :class="tech.name === 'HTML' ? 'bg-success' : (tech.name === 'PHP' ? 'bg-info' : (tech.name === 'JS' ? 'bg-warning text-dark' : 'bg-secondary'))">{{tech.name}}</span>
                  </li>
              </ul>
            </div>
          </div>
          <!--  PROJECT SCREEN -->
          <img v-if="prj.screen" class="card-img-bottom" src="">
          <!-- PROJECT URL -->
          <a class="card-link" :href="prj.url">{{prj.url}}</a>
        </div>
      </div>
    </div>
    <div class="no-cards" v-else>
      <div class="container">
        <div class="row">
          <div class="col-mb-3">
            <h3 v-if="selected.technologies.lenght === 0">
              Non sono presenti progetti con queste tecnologie.
            </h3>
            <h3 v-else>Non sono presenti progetti. Prova a ricaricare la pagina.</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Projects',
  data() {
    return {
      projects: [],
      technologies: [],
      selected: {
        technologies: [],
      }
    }
  },
  methods: {
    getProjects(url) {
      axios.get(url)
      .then(res => {
        // console.log(res.data.projects);
        this.projects = res.data.projects;
      })
      .catch(err => console.error(err));
    },
    getTechnologies(url) {
      axios.get(url)
      .then(res =>{
        this.technologies = res.data.technologies;
        // console.log(this.technologies);
      })
      .catch(err => console.error(err));
    },
    filterProjects() {
      // this.getProjects('api/projects/technologies',{params:this.selected});


      axios.get('api/projects/technologies',{params:this.selected})
      .then(res => {
        console.log(res.data);
        this.projects = res.data.projects;
      });

    }
  },
  created() {
    // get technologies for checkboxes
    this.getTechnologies('api/technologies');
    // get all projects
    this.getProjects('api/projects');
  }
}
</script>

<style>

</style>